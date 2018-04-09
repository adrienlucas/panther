<?php

/*
 * This file is part of the Panther project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Symfony\Component\Panther\Tests;

use Goutte\Client as GoutteClient;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Panther\Client as PantherClient;
use Symfony\Component\Panther\PantherTestCase;
use Symfony\Component\Panther\ProcessManager\BrowserManagerInterface;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
abstract class TestCase extends PantherTestCase
{
    protected static $webServerDir = __DIR__.'/fixtures';

    public function clientFactoryProvider(): array
    {
        // Tests must pass with both Panther and Goutte
        return [
            [[static::class, 'createGoutteClient'], GoutteClient::class, 'goutte'],
            [[static::class, 'createPantherClient'], PantherClient::class, 'chrome'],
            [function () { return self::createPanthereClient(self::FIREFOX); }, PanthereClient::class, 'firefox'],
        ];
    }

    protected function request(callable $clientFactory, string $path): Crawler
    {
        return $clientFactory()->request('GET', $path);
    }
}
