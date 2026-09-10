<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Mocks;

use Sulu\Component\Security\Authorization\SecurityCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use function in_array;

class MockSecurityChecker implements SecurityCheckerInterface
{
    /**
     * @var list<array{subject: mixed, permission: string}>
     */
    public array $calls = [];

    /**
     * @param list<string>|null $allowedSubjects subjects the permission is granted for, null grants every permission
     */
    public function __construct(public ?array $allowedSubjects = null)
    {
    }

    public function checkPermission($subject, $permission)
    {
        if ($this->hasPermission($subject, $permission) === false) {
            throw new AccessDeniedException();
        }

        return true;
    }

    public function hasPermission($subject, $permission): bool
    {
        $this->calls[] = ['subject' => $subject, 'permission' => $permission];

        return $this->allowedSubjects === null || in_array($subject, $this->allowedSubjects, true);
    }
}
