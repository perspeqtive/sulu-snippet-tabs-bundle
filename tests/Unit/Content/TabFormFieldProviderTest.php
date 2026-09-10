<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Content;

use PERSPEQTIVE\SuluSnippetTabsBundle\Content\TabFormFieldProvider;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollection;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProviderInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\AdminBundle\Exception\MetadataNotFoundException;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FieldMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FormMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\ItemMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\SectionMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\TagMetadata;
use Sulu\Bundle\AdminBundle\Metadata\ListMetadata\ListMetadata;
use Sulu\Bundle\AdminBundle\Metadata\MetadataProviderInterface;
use Sulu\Content\Application\ContentDataMapper\DataMapper\TemplateDataMapper;

use function array_keys;

class TabFormFieldProviderTest extends TestCase
{
    private TabConfigCollection $tabConfigCollection;
    private MetadataProviderInterface&MockObject $formMetadataProvider;
    private TabFormFieldProvider $tabFormFieldProvider;

    protected function setUp(): void
    {
        $this->tabConfigCollection = new TabConfigCollection();

        $tabConfigCollectionProvider = $this->createStub(TabConfigCollectionProviderInterface::class);
        $tabConfigCollectionProvider->method('getTabConfigCollection')->willReturn($this->tabConfigCollection);

        $this->formMetadataProvider = $this->createMock(MetadataProviderInterface::class);

        $this->tabFormFieldProvider = new TabFormFieldProvider(
            $tabConfigCollectionProvider,
            $this->formMetadataProvider,
        );
    }

    public function testGetFieldsWithoutTabConfigs(): void
    {
        $this->formMetadataProvider->expects(self::never())->method('getMetadata');

        self::assertSame([], $this->tabFormFieldProvider->getFields('shop', 'de'));
    }

    public function testGetFieldsIgnoresOtherSnippetTypes(): void
    {
        $this->tabConfigCollection->add(new TabConfig('Title', 'other', 10, 'other_form'));
        $this->formMetadataProvider->expects(self::never())->method('getMetadata');

        self::assertSame([], $this->tabFormFieldProvider->getFields('shop', 'de'));
    }

    public function testGetFieldsReturnsFieldsOfMatchingTabsKeyedByName(): void
    {
        $this->tabConfigCollection->add(new TabConfig('Title', 'shop', 10, 'shop_config'));

        $opening = new FieldMetadata('opening');
        $closing = new FieldMetadata('closing');

        $this->formMetadataProvider->expects(self::once())
            ->method('getMetadata')
            ->with('shop_config', 'de', [])
            ->willReturn($this->createFormMetadata('shop_config', [$opening, $closing]));

        $fields = $this->tabFormFieldProvider->getFields('shop', 'de');

        self::assertSame(['opening' => $opening, 'closing' => $closing], $fields);
    }

    public function testGetFieldsMergesFieldsOfAllMatchingTabs(): void
    {
        $this->tabConfigCollection->add(new TabConfig('Config', 'shop', 10, 'shop_config'));
        $this->tabConfigCollection->add(new TabConfig('Hours', 'shop', 20, 'shop_hours'));
        $this->tabConfigCollection->add(new TabConfig('Other', 'other', 30, 'other_form'));

        $this->formMetadataProvider->expects(self::exactly(2))
            ->method('getMetadata')
            ->willReturnCallback(fn (string $key): FormMetadata => $this->createFormMetadata($key, [
                new FieldMetadata($key . '_field'),
            ]));

        $fields = $this->tabFormFieldProvider->getFields('shop', 'de');

        self::assertSame(['shop_config_field', 'shop_hours_field'], array_keys($fields));
    }

    public function testGetFieldsPrefersFieldOfLastTabOnDuplicateNames(): void
    {
        $this->tabConfigCollection->add(new TabConfig('Config', 'shop', 10, 'shop_config'));
        $this->tabConfigCollection->add(new TabConfig('Hours', 'shop', 20, 'shop_hours'));

        $firstField = new FieldMetadata('duplicate');
        $lastField = new FieldMetadata('duplicate');

        $this->formMetadataProvider->method('getMetadata')
            ->willReturnCallback(fn (string $key): FormMetadata => $this->createFormMetadata(
                $key,
                ['shop_config' === $key ? $firstField : $lastField],
            ));

        $fields = $this->tabFormFieldProvider->getFields('shop', 'de');

        self::assertSame(['duplicate' => $lastField], $fields);
    }

    public function testGetFieldsIncludesFieldsOfSections(): void
    {
        $this->tabConfigCollection->add(new TabConfig('Config', 'shop', 10, 'shop_config'));

        $sectionField = new FieldMetadata('in_section');
        $section = new SectionMetadata('section');
        $section->addItem($sectionField);

        $this->formMetadataProvider->method('getMetadata')
            ->willReturn($this->createFormMetadata('shop_config', [$section]));

        self::assertSame(['in_section' => $sectionField], $this->tabFormFieldProvider->getFields('shop', 'de'));
    }

    public function testGetFieldsSkipsFieldsWithSkipTag(): void
    {
        $this->tabConfigCollection->add(new TabConfig('Config', 'shop', 10, 'shop_config'));

        $skippedField = new FieldMetadata('skipped');
        $skippedField->addTag($this->createTag(TemplateDataMapper::SKIP_TAG));
        $taggedField = new FieldMetadata('tagged');
        $taggedField->addTag($this->createTag('sulu.search.field'));

        $this->formMetadataProvider->method('getMetadata')
            ->willReturn($this->createFormMetadata('shop_config', [$skippedField, $taggedField]));

        self::assertSame(['tagged' => $taggedField], $this->tabFormFieldProvider->getFields('shop', 'de'));
    }

    public function testGetFieldsSkipsUnknownFormKeys(): void
    {
        $this->tabConfigCollection->add(new TabConfig('Missing', 'shop', 10, 'missing_form'));
        $this->tabConfigCollection->add(new TabConfig('Config', 'shop', 20, 'shop_config'));

        $field = new FieldMetadata('opening');

        $this->formMetadataProvider->method('getMetadata')
            ->willReturnCallback(function (string $key) use ($field): FormMetadata {
                if ('missing_form' === $key) {
                    throw new MetadataNotFoundException('form', $key);
                }

                return $this->createFormMetadata($key, [$field]);
            });

        self::assertSame(['opening' => $field], $this->tabFormFieldProvider->getFields('shop', 'de'));
    }

    public function testGetFieldsSkipsMetadataThatIsNoFormMetadata(): void
    {
        $this->tabConfigCollection->add(new TabConfig('Config', 'shop', 10, 'shop_config'));

        $this->formMetadataProvider->method('getMetadata')->willReturn(new ListMetadata());

        self::assertSame([], $this->tabFormFieldProvider->getFields('shop', 'de'));
    }

    public function testGetFieldsPassesLocaleToMetadataProvider(): void
    {
        $this->tabConfigCollection->add(new TabConfig('Config', 'shop', 10, 'shop_config'));

        $this->formMetadataProvider->expects(self::once())
            ->method('getMetadata')
            ->with('shop_config', 'en', [])
            ->willReturn($this->createFormMetadata('shop_config', []));

        $this->tabFormFieldProvider->getFields('shop', 'en');
    }

    /**
     * @param list<ItemMetadata> $items
     */
    private function createFormMetadata(string $key, array $items): FormMetadata
    {
        $formMetadata = new FormMetadata();
        $formMetadata->setKey($key);
        foreach ($items as $item) {
            $formMetadata->addItem($item);
        }

        return $formMetadata;
    }

    private function createTag(string $name): TagMetadata
    {
        $tag = new TagMetadata();
        $tag->setName($name);

        return $tag;
    }
}
