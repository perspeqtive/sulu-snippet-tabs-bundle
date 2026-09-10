<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Content;

use PERSPEQTIVE\SuluSnippetTabsBundle\Content\DataMapper;
use PERSPEQTIVE\SuluSnippetTabsBundle\Content\TabFormFieldProvider;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollection;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProviderInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FieldMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FormMetadata;
use Sulu\Bundle\AdminBundle\Metadata\MetadataProviderInterface;
use Sulu\Content\Domain\Model\DimensionContentInterface;
use Sulu\Snippet\Domain\Model\SnippetDimensionContentInterface;

class DataMapperTest extends TestCase
{
    private const FORM_KEY = 'shop_config';
    private const SNIPPET_TYPE = 'shop';

    public function testMapIgnoresNonSnippetDimensionContents(): void
    {
        $dataMapper = $this->createDataMapper([]);

        $unlocalized = $this->createMock(DimensionContentInterface::class);
        $localized = $this->createMock(DimensionContentInterface::class);

        $dataMapper->map($unlocalized, $localized, ['opening' => 'value']);

        $this->expectNotToPerformAssertions();
    }

    public function testMapIgnoresMixedDimensionContents(): void
    {
        $dataMapper = $this->createDataMapper([$this->createField('opening', true)]);

        $unlocalized = $this->createMock(DimensionContentInterface::class);
        $localized = $this->createSnippetDimensionContent();
        $localized->expects(self::never())->method('setTemplateData');

        $dataMapper->map($unlocalized, $localized, ['opening' => 'value']);
    }

    public function testMapWritesMultilingualFieldsToLocalizedContent(): void
    {
        $dataMapper = $this->createDataMapper([
            $this->createField('opening', true),
            $this->createField('closing', true),
        ]);

        $localized = $this->createSnippetDimensionContent(['existing' => 'kept']);
        $unlocalized = $this->createSnippetDimensionContent(['unlocalized' => 'kept']);

        $localized->expects(self::once())
            ->method('setTemplateData')
            ->with(['existing' => 'kept', 'opening' => '08:00', 'closing' => '18:00']);
        $unlocalized->expects(self::once())
            ->method('setTemplateData')
            ->with(['unlocalized' => 'kept']);

        $dataMapper->map($unlocalized, $localized, ['opening' => '08:00', 'closing' => '18:00']);
    }

    public function testMapWritesNonMultilingualFieldsToUnlocalizedContent(): void
    {
        $dataMapper = $this->createDataMapper([
            $this->createField('opening', true),
            $this->createField('phone', false),
        ]);

        $localized = $this->createSnippetDimensionContent();
        $unlocalized = $this->createSnippetDimensionContent();

        $localized->expects(self::once())->method('setTemplateData')->with(['opening' => '08:00']);
        $unlocalized->expects(self::once())->method('setTemplateData')->with(['phone' => '123']);

        $dataMapper->map($unlocalized, $localized, ['opening' => '08:00', 'phone' => '123']);
    }

    public function testMapIgnoresDataWithoutMatchingField(): void
    {
        $dataMapper = $this->createDataMapper([$this->createField('opening', true)]);

        $localized = $this->createSnippetDimensionContent();
        $unlocalized = $this->createSnippetDimensionContent();

        $localized->expects(self::once())->method('setTemplateData')->with(['opening' => '08:00']);
        $unlocalized->expects(self::once())->method('setTemplateData')->with([]);

        $dataMapper->map($unlocalized, $localized, ['opening' => '08:00', 'unknown' => 'ignored']);
    }

    public function testMapIgnoresFieldsWithoutData(): void
    {
        $dataMapper = $this->createDataMapper([
            $this->createField('opening', true),
            $this->createField('closing', true),
        ]);

        $localized = $this->createSnippetDimensionContent(['closing' => 'unchanged']);
        $unlocalized = $this->createSnippetDimensionContent();

        $localized->expects(self::once())
            ->method('setTemplateData')
            ->with(['closing' => 'unchanged', 'opening' => '08:00']);

        $dataMapper->map($unlocalized, $localized, ['opening' => '08:00']);
    }

    public function testMapOverwritesExistingValues(): void
    {
        $dataMapper = $this->createDataMapper([$this->createField('opening', true)]);

        $localized = $this->createSnippetDimensionContent(['opening' => 'old']);
        $unlocalized = $this->createSnippetDimensionContent();

        $localized->expects(self::once())->method('setTemplateData')->with(['opening' => 'new']);

        $dataMapper->map($unlocalized, $localized, ['opening' => 'new']);
    }

    public function testMapWithoutLocaleKeepsTemplateData(): void
    {
        $dataMapper = $this->createDataMapper([$this->createField('opening', true)]);

        $localized = $this->createSnippetDimensionContent(['opening' => 'old'], null);
        $unlocalized = $this->createSnippetDimensionContent();

        $localized->expects(self::once())->method('setTemplateData')->with(['opening' => 'old']);
        $unlocalized->expects(self::once())->method('setTemplateData')->with([]);

        $dataMapper->map($unlocalized, $localized, ['opening' => 'new']);
    }

    public function testMapWithoutTemplateKeyKeepsTemplateData(): void
    {
        $dataMapper = $this->createDataMapper([$this->createField('opening', true)]);

        $localized = $this->createSnippetDimensionContent(['opening' => 'old'], 'de', null);
        $unlocalized = $this->createSnippetDimensionContent();

        $localized->expects(self::once())->method('setTemplateData')->with(['opening' => 'old']);

        $dataMapper->map($unlocalized, $localized, ['opening' => 'new']);
    }

    public function testMapWithoutConfiguredTabsKeepsTemplateData(): void
    {
        $dataMapper = $this->createDataMapper([], 'other_type');

        $localized = $this->createSnippetDimensionContent(['opening' => 'old']);
        $unlocalized = $this->createSnippetDimensionContent();

        $localized->expects(self::once())->method('setTemplateData')->with(['opening' => 'old']);

        $dataMapper->map($unlocalized, $localized, ['opening' => 'new']);
    }

    /**
     * @param list<FieldMetadata> $fields
     */
    private function createDataMapper(array $fields, string $snippetType = self::SNIPPET_TYPE): DataMapper
    {
        $tabConfigCollection = new TabConfigCollection();
        $tabConfigCollection->add(new TabConfig('Config', $snippetType, 10, self::FORM_KEY));

        $tabConfigCollectionProvider = $this->createStub(TabConfigCollectionProviderInterface::class);
        $tabConfigCollectionProvider->method('getTabConfigCollection')->willReturn($tabConfigCollection);

        $formMetadata = new FormMetadata();
        $formMetadata->setKey(self::FORM_KEY);
        foreach ($fields as $field) {
            $formMetadata->addItem($field);
        }

        $formMetadataProvider = $this->createStub(MetadataProviderInterface::class);
        $formMetadataProvider->method('getMetadata')->willReturn($formMetadata);

        return new DataMapper(new TabFormFieldProvider($tabConfigCollectionProvider, $formMetadataProvider));
    }

    private function createField(string $name, bool $multilingual): FieldMetadata
    {
        $field = new FieldMetadata($name);
        $field->setMultilingual($multilingual);

        return $field;
    }

    /**
     * @param array<string, mixed> $templateData
     */
    private function createSnippetDimensionContent(
        array $templateData = [],
        ?string $locale = 'de',
        ?string $templateKey = self::SNIPPET_TYPE,
    ): SnippetDimensionContentInterface&MockObject {
        $dimensionContent = $this->createMock(SnippetDimensionContentInterface::class);
        $dimensionContent->method('getLocale')->willReturn($locale);
        $dimensionContent->method('getTemplateKey')->willReturn($templateKey);
        $dimensionContent->method('getTemplateData')->willReturn($templateData);

        return $dimensionContent;
    }
}
