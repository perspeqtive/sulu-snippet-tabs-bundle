<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Content;

use PERSPEQTIVE\SuluSnippetTabsBundle\Content\Resolver;
use PERSPEQTIVE\SuluSnippetTabsBundle\Content\TabFormFieldProvider;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollection;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProviderInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FieldMetadata;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\FormMetadata;
use Sulu\Bundle\AdminBundle\Metadata\MetadataProviderInterface;
use Sulu\Content\Application\ContentResolver\Value\ContentView;
use Sulu\Content\Application\MetadataResolver\MetadataResolver;
use Sulu\Content\Domain\Model\DimensionContentInterface;
use Sulu\Snippet\Domain\Model\SnippetDimensionContentInterface;

class ResolverTest extends TestCase
{
    private const FORM_KEY = 'shop_config';
    private const SNIPPET_TYPE = 'shop';

    private MetadataResolver&MockObject $metadataResolver;

    protected function setUp(): void
    {
        $this->metadataResolver = $this->createMock(MetadataResolver::class);
    }

    public function testResolveReturnsNullForNonSnippetDimensionContent(): void
    {
        $resolver = $this->createResolver([$this->createField('opening')]);

        $this->metadataResolver->expects(self::never())->method('resolveItems');

        self::assertNull($resolver->resolve($this->createMock(DimensionContentInterface::class)));
    }

    public function testResolveReturnsNullWithoutLocale(): void
    {
        $resolver = $this->createResolver([$this->createField('opening')]);

        $this->metadataResolver->expects(self::never())->method('resolveItems');

        self::assertNull($resolver->resolve($this->createSnippetDimensionContent([], null)));
    }

    public function testResolveReturnsNullWithoutTemplateKey(): void
    {
        $resolver = $this->createResolver([$this->createField('opening')]);

        $this->metadataResolver->expects(self::never())->method('resolveItems');

        self::assertNull($resolver->resolve($this->createSnippetDimensionContent([], 'de', null)));
    }

    public function testResolveReturnsNullWithoutFields(): void
    {
        $resolver = $this->createResolver([]);

        $this->metadataResolver->expects(self::never())->method('resolveItems');

        self::assertNull($resolver->resolve($this->createSnippetDimensionContent()));
    }

    public function testResolveReturnsNullForSnippetTypeWithoutTabs(): void
    {
        $resolver = $this->createResolver([$this->createField('opening')], 'other_type');

        $this->metadataResolver->expects(self::never())->method('resolveItems');

        self::assertNull($resolver->resolve($this->createSnippetDimensionContent()));
    }

    public function testResolveReturnsResolvedContentView(): void
    {
        $field = $this->createField('opening');
        $resolver = $this->createResolver([$field]);

        $resolvedContent = ['opening' => ContentView::create('08:00', [])];

        $this->metadataResolver->expects(self::once())
            ->method('resolveItems')
            ->with(['opening' => $field], ['opening' => '08:00'], 'de')
            ->willReturn($resolvedContent);

        $contentView = $resolver->resolve($this->createSnippetDimensionContent(['opening' => '08:00']));

        self::assertInstanceOf(ContentView::class, $contentView);
        self::assertSame($resolvedContent, $contentView->getContent());
        self::assertSame([], $contentView->getView());
    }

    public function testResolveIgnoresGivenProperties(): void
    {
        $field = $this->createField('opening');
        $resolver = $this->createResolver([$field]);

        $this->metadataResolver->expects(self::once())
            ->method('resolveItems')
            ->with(['opening' => $field], [], 'de')
            ->willReturn([]);

        self::assertInstanceOf(
            ContentView::class,
            $resolver->resolve($this->createSnippetDimensionContent(), ['closing' => 'closing']),
        );
    }

    /**
     * @param list<FieldMetadata> $fields
     */
    private function createResolver(array $fields, string $snippetType = self::SNIPPET_TYPE): Resolver
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

        return new Resolver(
            new TabFormFieldProvider($tabConfigCollectionProvider, $formMetadataProvider),
            $this->metadataResolver,
        );
    }

    private function createField(string $name): FieldMetadata
    {
        return new FieldMetadata($name);
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
