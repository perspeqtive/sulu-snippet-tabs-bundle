<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tabs;

readonly class TabConfig
{
    public function __construct(
        public string $title,
        public string $snippetType,
        public int $order,
        public string $formKey
    ) {}

    public function getUrl(): string
    {
        $url = mb_strtolower($this->formKey);
        $url = str_replace('_', '-', $url);
        return '/' . $url;
    }

}