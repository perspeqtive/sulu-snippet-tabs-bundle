<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Content;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProviderInterface;
use Sulu\Bundle\AdminBundle\Exception\MetadataNotFoundException;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FieldMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FormMetadata;
use Sulu\Bundle\AdminBundle\Metadata\MetadataProviderInterface;
use Sulu\Content\Application\ContentDataMapper\DataMapper\TemplateDataMapper;

readonly class TabFormFieldProvider
{
    public function __construct(
        private TabConfigCollectionProviderInterface $tabConfigCollectionProvider,
        private MetadataProviderInterface $formMetadataProvider,
    ) {
    }

    /**
     * @return array<string, FieldMetadata> keyed by the property name
     */
    public function getFields(string $snippetType, string $locale): array
    {
        $fields = [];

        foreach ($this->tabConfigCollectionProvider->getTabConfigCollection() as $tabConfig) {
            if ($tabConfig->snippetType !== $snippetType) {
                continue;
            }

            try {
                $formMetadata = $this->formMetadataProvider->getMetadata($tabConfig->formKey, $locale, []);
                if (!$formMetadata instanceof FormMetadata) {
                    continue;
                }

                $fields = $this->getFieldsFromMetaData($formMetadata, $fields);
            } catch (MetadataNotFoundException) {
            }
        }

        return $fields;
    }

    private function getFieldsFromMetaData(FormMetadata $formMetadata, array $fields): array
    {
        foreach ($formMetadata->getFlatFieldMetadata() as $field) {
            if ($field->hasTag(TemplateDataMapper::SKIP_TAG)) {
                continue;
            }

            $fields[$field->getName()] = $field;
        }

        return $fields;
    }
}
