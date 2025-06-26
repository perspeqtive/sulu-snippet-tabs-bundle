<?php

namespace ContainerQk9OUPX;

class RepositorySchemaGhostB7af69e extends \Jackalope\Transport\DoctrineDBAL\RepositorySchema implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".'*'."\0".'_name' => [parent::class, '_name', null, 8],
        "\0".'*'."\0".'_namespace' => [parent::class, '_namespace', null, 8],
        "\0".'*'."\0".'_quoted' => [parent::class, '_quoted', null, 8],
        "\0".'*'."\0".'_schemaConfig' => [parent::class, '_schemaConfig', null, 8],
        "\0".'*'."\0".'_sequences' => [parent::class, '_sequences', null, 8],
        "\0".'*'."\0".'_tables' => [parent::class, '_tables', null, 8],
        "\0".'Doctrine\\DBAL\\Schema\\Schema'."\0".'namespaces' => ['Doctrine\\DBAL\\Schema\\Schema', 'namespaces', null, 16],
        "\0".parent::class."\0".'connection' => [parent::class, 'connection', null, 16],
        "\0".parent::class."\0".'maxIndexLength' => [parent::class, 'maxIndexLength', null, 16],
        "\0".parent::class."\0".'options' => [parent::class, 'options', null, 16],
        '_name' => [parent::class, '_name', null, 8],
        '_namespace' => [parent::class, '_namespace', null, 8],
        '_quoted' => [parent::class, '_quoted', null, 8],
        '_schemaConfig' => [parent::class, '_schemaConfig', null, 8],
        '_sequences' => [parent::class, '_sequences', null, 8],
        '_tables' => [parent::class, '_tables', null, 8],
        'connection' => [parent::class, 'connection', null, 16],
        'maxIndexLength' => [parent::class, 'maxIndexLength', null, 16],
        'namespaces' => ['Doctrine\\DBAL\\Schema\\Schema', 'namespaces', null, 16],
        'options' => [parent::class, 'options', null, 16],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('RepositorySchemaGhostB7af69e', false)) {
    \class_alias(__NAMESPACE__.'\\RepositorySchemaGhostB7af69e', 'RepositorySchemaGhostB7af69e', false);
}
