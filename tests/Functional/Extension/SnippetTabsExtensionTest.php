<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Functional\Extension;

use Sulu\Bundle\TestBundle\Testing\SuluTestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

use function json_encode;

class SnippetTabsExtensionTest extends SuluTestCase
{
    private KernelBrowser $client;

    protected function setUp(): void
    {
        $this->markTestIncomplete();
        $this->client = $this->createAuthenticatedClient();
        $this->purgeDatabase();
        $this->initPhpcr();
        $this->documentManager = $this->getContainer()->get('sulu_document_manager.document_manager');
        // $this->loadFixtures();
    }

    public function testPost(): void
    {
        $post = [
            [
                'locale' => 'de',
                'template' => 'car',
                'title' => 'Some Hotel Yeah',
                'description' => 'Some Hotel Yeah',
                'ext' => [
                    'car_extension' => [
                        'position-logo' => 'top-left',
                    ],
                ],
            ],
        ];
        $this->client->request('POST', '/api/snippets/car', ['locale' => 'de'], [], ['CONTENT_TYPE' => 'application/json'], json_encode($post));
    }
}
