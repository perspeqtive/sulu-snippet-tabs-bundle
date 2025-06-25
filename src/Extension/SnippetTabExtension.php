<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Extension;

use Exception;
use PHPCR\NodeInterface;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FieldMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FormMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FormMetadataLoaderInterface;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\ItemMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\SectionMetadata;
use Sulu\Component\Content\Extension\AbstractExtension;
use Sulu\Component\Content\Extension\ExportExtensionInterface;

use function array_merge;
use function basename;
use function is_array;
use function is_bool;
use function is_string;
use function json_decode;
use function json_encode;

class SnippetTabExtension extends AbstractExtension implements ExportExtensionInterface
{
    /**
     * @var string[]
     */
    protected $properties = [];

    /**
     * @param string[] $forms
     */
    public function __construct(
        private readonly FormMetadataLoaderInterface $formMetaDataLoader,
        string $name,
        private readonly array $forms = [],
    ) {
        $this->name = $name;
        $this->additionalPrefix = $name;
    }

    /**
     * @param array<string|array|bool|int|float|null> $data
     */
    public function save(NodeInterface $node, $data, $webspaceKey, $languageCode): void
    {
        if ($this->isResponsible($node) === false) {
            return;
        }
        $properties = $this->getProperties($languageCode);
        $this->setLanguageCode($languageCode, 'i18n', '');

        foreach ($properties as $name) {
            if (isset($data[$name]) && is_array($data[$name])) {
                $data[$name] = json_encode($data[$name]);
            }
            $this->saveProperty($node, $data, $name);
        }
    }

    public function load(NodeInterface $node, $webspaceKey, $languageCode): array
    {
        if ($this->isResponsible($node) === false) {
            return [];
        }

        $data = [];
        foreach ($this->getProperties($languageCode) as $name) {
            $value = $this->loadProperty($node, $name);
            $data[$name] = $this->sanitizeLoadedValue($value);
        }

        return $data;
    }

    public function setLanguageCode($languageCode, $languageNamespace, $namespace): void
    {
        $this->getProperties($languageCode);
        parent::setLanguageCode($languageCode, $languageNamespace, $namespace);
    }

    public function export($properties, $format = null): array
    {
        $data = [];
        foreach ($properties as $key => $property) {
            $value = $property;
            if (is_bool($value)) {
                $value = (int) $value;
            }

            $data[$key] = [
                'name' => $key,
                'value' => $value,
                'type' => '',
                'options' => [],
            ];
        }

        return $data;
    }

    public function import(NodeInterface $node, $data, $webspaceKey, $languageCode, $format): void
    {
        $this->save($node, $data, $webspaceKey, $languageCode);
    }

    public function getImportPropertyNames(): array
    {
        return $this->getProperties(null);
    }

    private function sanitizeLoadedValue(mixed $value): mixed
    {
        if (is_string($value) === false) {
            return $value;
        }
        try {
            $result = json_decode($value, true);
            if (is_array($result) === true) {
                return $result;
            }
        } catch (Exception) {
        }

        return $value;
    }

    private function isResponsible(NodeInterface $node): bool
    {
        if ($node->getParent()->getPath() !== '/cmf/snippets/' . $this->name) {
            return false;
        }

        if(is_array($node->getProperty('jcr:mixinTypes')->getValue()) === false) {
            return false;
        }

        return in_array('sulu:snippet', $node->getProperty('jcr:mixinTypes')->getValue()) === true;
    }

    /**
     * @return string[]
     */
    private function getProperties(?string $locale): array
    {
        if (empty($this->properties)) {
            $this->properties = $this->prepareProperties($locale);
        }

        return $this->properties;
    }

    /**
     * @param array<SectionMetadata|FieldMetadata|ItemMetadata> $structure
     *
     * @return string[]
     */
    private function extractProperties(array $structure): array
    {
        if ($structure === []) {
            return [];
        }
        $properties = [];

        foreach ($structure as $item) {
            if ($item instanceof SectionMetadata === true) {
                $properties[] = $this->extractProperties($item->getItems());
                continue;
            }
            $properties[] = [$this->extractPropertyName($item->getName())];
        }

        return array_merge(...$properties);
    }

    private function extractPropertyName(string $name): string
    {
        return basename($name);
    }

    /**
     * @return string[]
     */
    private function prepareProperties(?string $locale): array
    {
        $properties = [];
        foreach ($this->forms as $form) {
            /** @var ?FormMetadata $structure */
            $structure = $this->formMetaDataLoader->getMetadata($form, $locale ?? 'de', []);
            $properties[] = $this->extractProperties($structure?->getItems() ?? []);
        }

        return array_merge(...$properties);
    }
}