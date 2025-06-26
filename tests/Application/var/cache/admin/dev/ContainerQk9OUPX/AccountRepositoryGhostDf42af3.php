<?php

namespace ContainerQk9OUPX;

class AccountRepositoryGhostDf42af3 extends \Sulu\Bundle\ContactBundle\Entity\AccountRepository implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".'*'."\0".'_class' => [parent::class, '_class', null, 8],
        "\0".'*'."\0".'_em' => [parent::class, '_em', null, 8],
        "\0".'*'."\0".'_entityName' => [parent::class, '_entityName', null, 8],
        "\0".'*'."\0".'listener' => [parent::class, 'listener', null, 8],
        "\0".'*'."\0".'repoUtils' => [parent::class, 'repoUtils', null, 8],
        "\0".parent::class."\0".'accessControlQueryEnhancer' => [parent::class, 'accessControlQueryEnhancer', null, 16],
        '_class' => [parent::class, '_class', null, 8],
        '_em' => [parent::class, '_em', null, 8],
        '_entityName' => [parent::class, '_entityName', null, 8],
        'accessControlQueryEnhancer' => [parent::class, 'accessControlQueryEnhancer', null, 16],
        'listener' => [parent::class, 'listener', null, 8],
        'repoUtils' => [parent::class, 'repoUtils', null, 8],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('AccountRepositoryGhostDf42af3', false)) {
    \class_alias(__NAMESPACE__.'\\AccountRepositoryGhostDf42af3', 'AccountRepositoryGhostDf42af3', false);
}
