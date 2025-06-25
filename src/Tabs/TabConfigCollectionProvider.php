<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tabs;

readonly class TabConfigCollectionProvider implements TabConfigCollectionProviderInterface
{
    /**
     * @param array<string, array{
     *     snippet_type: string,
     *     tabs: array<string, array{
     *         title: string,
     *         form_key: string,
     *         order: int
     *     }>
     * }> $tabConfigs
     */
    public function __construct(private array $tabConfigs)
    {
    }

    public function getTabConfigCollection(): TabConfigCollection
    {
        $collection = new TabConfigCollection();
        foreach ($this->tabConfigs as $snippetTypeConfig) {
            foreach ($snippetTypeConfig['tabs'] as $tabConfig) {
                $collection->add(
                    new TabConfig(
                        $tabConfig['title'],
                        $snippetTypeConfig['snippet_type'],
                        $tabConfig['order'],
                        $tabConfig['form_key'],
                    ),
                );
            }
        }

        return $collection;
    }
}
