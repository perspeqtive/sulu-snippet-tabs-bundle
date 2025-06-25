<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tabs;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

/**
 * @implements IteratorAggregate<TabConfig>
 */
class TabConfigCollection implements IteratorAggregate
{
    /**
     * @var TabConfig[]
     */
    private array $tabs = [];

    public function add(TabConfig $tab): void
    {
        $this->tabs[] = $tab;
    }

    /**
     * @return Traversable<TabConfig>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->tabs);
    }
}
