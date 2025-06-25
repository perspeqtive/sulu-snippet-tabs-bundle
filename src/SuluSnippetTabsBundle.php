<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle;

use PERSPEQTIVE\SuluSnippetTabsBundle\DependencyInjection\RegisterTabsCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SuluSnippetTabsBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $container->addCompilerPass(new RegisterTabsCompilerPass());
    }
}