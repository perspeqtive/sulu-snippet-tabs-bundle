<?php

namespace ContainerQk9OUPX;

class CategoryRepositoryGhostC679b09 extends \Sulu\Bundle\CategoryBundle\Entity\CategoryRepository implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".'*'."\0".'_class' => [parent::class, '_class', null, 8],
        "\0".'*'."\0".'_em' => [parent::class, '_em', null, 8],
        "\0".'*'."\0".'_entityName' => [parent::class, '_entityName', null, 8],
        "\0".'*'."\0".'listener' => [parent::class, 'listener', null, 8],
        "\0".'*'."\0".'repoUtils' => [parent::class, 'repoUtils', null, 8],
        '_class' => [parent::class, '_class', null, 8],
        '_em' => [parent::class, '_em', null, 8],
        '_entityName' => [parent::class, '_entityName', null, 8],
        'listener' => [parent::class, 'listener', null, 8],
        'repoUtils' => [parent::class, 'repoUtils', null, 8],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('CategoryRepositoryGhostC679b09', false)) {
    \class_alias(__NAMESPACE__.'\\CategoryRepositoryGhostC679b09', 'CategoryRepositoryGhostC679b09', false);
}
