<?php

namespace ContainerQk9OUPX;

class StructureFormMetadataLoaderGhostA78e795 extends \Sulu\Bundle\AdminBundle\Metadata\FormMetadata\StructureFormMetadataLoader implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'cacheDir' => [parent::class, 'cacheDir', null, 16],
        "\0".parent::class."\0".'debug' => [parent::class, 'debug', null, 16],
        "\0".parent::class."\0".'defaultTypes' => [parent::class, 'defaultTypes', null, 16],
        "\0".parent::class."\0".'fieldMetadataValidator' => [parent::class, 'fieldMetadataValidator', null, 16],
        "\0".parent::class."\0".'formMetadataMapper' => [parent::class, 'formMetadataMapper', null, 16],
        "\0".parent::class."\0".'locales' => [parent::class, 'locales', null, 16],
        "\0".parent::class."\0".'structureMetadataFactory' => [parent::class, 'structureMetadataFactory', null, 16],
        "\0".parent::class."\0".'webspaceManager' => [parent::class, 'webspaceManager', null, 16],
        'cacheDir' => [parent::class, 'cacheDir', null, 16],
        'debug' => [parent::class, 'debug', null, 16],
        'defaultTypes' => [parent::class, 'defaultTypes', null, 16],
        'fieldMetadataValidator' => [parent::class, 'fieldMetadataValidator', null, 16],
        'formMetadataMapper' => [parent::class, 'formMetadataMapper', null, 16],
        'locales' => [parent::class, 'locales', null, 16],
        'structureMetadataFactory' => [parent::class, 'structureMetadataFactory', null, 16],
        'webspaceManager' => [parent::class, 'webspaceManager', null, 16],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('StructureFormMetadataLoaderGhostA78e795', false)) {
    \class_alias(__NAMESPACE__.'\\StructureFormMetadataLoaderGhostA78e795', 'StructureFormMetadataLoaderGhostA78e795', false);
}
