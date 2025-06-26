<?php

namespace ContainerQk9OUPX;

class ContactRepositoryGhost4b39931 extends \Sulu\Bundle\ContactBundle\Entity\ContactRepository implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".'*'."\0".'_class' => [parent::class, '_class', null, 8],
        "\0".'*'."\0".'_em' => [parent::class, '_em', null, 8],
        "\0".'*'."\0".'_entityName' => [parent::class, '_entityName', null, 8],
        "\0".parent::class."\0".'accessControlQueryEnhancer' => [parent::class, 'accessControlQueryEnhancer', null, 16],
        '_class' => [parent::class, '_class', null, 8],
        '_em' => [parent::class, '_em', null, 8],
        '_entityName' => [parent::class, '_entityName', null, 8],
        'accessControlQueryEnhancer' => [parent::class, 'accessControlQueryEnhancer', null, 16],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('ContactRepositoryGhost4b39931', false)) {
    \class_alias(__NAMESPACE__.'\\ContactRepositoryGhost4b39931', 'ContactRepositoryGhost4b39931', false);
}
