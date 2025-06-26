<?php

namespace ContainerQk9OUPX;

class SessionGhost3c70013 extends \Sulu\Bundle\DocumentManagerBundle\Session\Session implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'inner' => [parent::class, 'inner', null, 16],
        'inner' => [parent::class, 'inner', null, 16],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('SessionGhost3c70013', false)) {
    \class_alias(__NAMESPACE__.'\\SessionGhost3c70013', 'SessionGhost3c70013', false);
}
