<?php

namespace ContainerQk9OUPX;

class TargetGroupConditionRepositoryGhost3d299c7 extends \Sulu\Bundle\AudienceTargetingBundle\Entity\TargetGroupConditionRepository implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".'*'."\0".'_class' => [parent::class, '_class', null, 8],
        "\0".'*'."\0".'_em' => [parent::class, '_em', null, 8],
        "\0".'*'."\0".'_entityName' => [parent::class, '_entityName', null, 8],
        '_class' => [parent::class, '_class', null, 8],
        '_em' => [parent::class, '_em', null, 8],
        '_entityName' => [parent::class, '_entityName', null, 8],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('TargetGroupConditionRepositoryGhost3d299c7', false)) {
    \class_alias(__NAMESPACE__.'\\TargetGroupConditionRepositoryGhost3d299c7', 'TargetGroupConditionRepositoryGhost3d299c7', false);
}
