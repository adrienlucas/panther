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
/*
 * This file is part of the Panthère project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Panther\ProcessManager;

use Facebook\WebDriver\WebDriver;

/**
 * A browser manager (for instance using ChromeDriver or GeckoDriver).
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
interface BrowserManagerInterface
{
    public const CHROME_BROWSER = 'chrome';
    public const FIREFOX_BROWSER = 'firefox';
    /**
     * @throws \RuntimeException
     */
    public function start(): WebDriver;

    public function quit(): void;
}
