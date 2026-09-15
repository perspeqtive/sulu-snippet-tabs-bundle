<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Content;

use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FieldMetadata;
use Sulu\Content\Application\ContentDataMapper\DataMapper\DataMapperInterface;
use Sulu\Content\Domain\Model\DimensionContentInterface;
use Sulu\Snippet\Domain\Model\SnippetDimensionContentInterface;

use function array_key_exists;

readonly class DataMapper implements DataMapperInterface
{
    public function __construct(private TabFormFieldProvider $tabFormFieldProvider)
    {
    }

    /**
     * @param array<string, mixed> $data
     */
    public function map(
        DimensionContentInterface $unlocalizedDimensionContent,
        DimensionContentInterface $localizedDimensionContent,
        array $data,
    ): void {
        if (!$localizedDimensionContent instanceof SnippetDimensionContentInterface
            || !$unlocalizedDimensionContent instanceof SnippetDimensionContentInterface
        ) {
            return;
        }

        $fields = $this->getFormFields($localizedDimensionContent);

        $this->processFormFields($localizedDimensionContent, $unlocalizedDimensionContent, $fields, $data);
    }

    /**
     * @return array<string, FieldMetadata>
     */
    private function getFormFields(SnippetDimensionContentInterface $localizedDimensionContent): array
    {
        $locale = $localizedDimensionContent->getLocale();
        if ($locale === null) {
            return [];
        }

        $snippetType = $localizedDimensionContent->getTemplateKey();
        if (null === $snippetType) {
            return [];
        }

        return $this->tabFormFieldProvider->getFields($snippetType, $locale);
    }

    /**
     * @param array<string, FieldMetadata> $fields
     * @param array<string, mixed> $data
     */
    private function processFormFields(
        SnippetDimensionContentInterface $localizedDimensionContent,
        SnippetDimensionContentInterface $unlocalizedDimensionContent,
        array $fields,
        array $data,
    ): void {
        $localizedData = $localizedDimensionContent->getTemplateData();
        $unlocalizedData = $unlocalizedDimensionContent->getTemplateData();

        foreach ($fields as $name => $field) {
            if (!array_key_exists($name, $data)) {
                continue;
            }

            if ($field->isMultilingual()) {
                $localizedData[$name] = $data[$name];
                continue;
            }

            $unlocalizedData[$name] = $data[$name];
        }

        $localizedDimensionContent->setTemplateData($localizedData);
        $unlocalizedDimensionContent->setTemplateData($unlocalizedData);
    }
}
