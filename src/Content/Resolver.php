<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Content;

use Sulu\Content\Application\ContentResolver\Resolver\ResolverInterface;
use Sulu\Content\Application\ContentResolver\Value\ContentView;
use Sulu\Content\Application\MetadataResolver\MetadataResolver;
use Sulu\Content\Domain\Model\DimensionContentInterface;
use Sulu\Snippet\Domain\Model\SnippetDimensionContentInterface;

readonly class Resolver implements ResolverInterface
{
    public function __construct(
        private TabFormFieldProvider $tabFormFieldProvider,
        private MetadataResolver $metadataResolver,
    ) {
    }

    public function resolve(DimensionContentInterface $dimensionContent, ?array $properties = null): ?ContentView
    {
        if (!$dimensionContent instanceof SnippetDimensionContentInterface) {
            return null;
        }

        $locale = $dimensionContent->getLocale();
        if ($locale === null) {
            return null;
        }

        $snippetType = $dimensionContent->getTemplateKey();
        if ($snippetType === null) {
            return null;
        }

        $fields = $this->tabFormFieldProvider->getFields($snippetType, $locale);
        if ($fields === []) {
            return null;
        }

        return ContentView::create(
            $this->metadataResolver->resolveItems($fields, $dimensionContent->getTemplateData(), $locale),
            [],
        );
    }
}
