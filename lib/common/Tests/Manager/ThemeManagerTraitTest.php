<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use Psr\Log\LoggerInterface;
use Twig\Environment;
use WBW\Bundle\CommonBundle\Manager\ThemeManager;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestThemeManagerTrait;

/**
 * Theme manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class ThemeManagerTraitTest extends AbstractTestCase {

    /**
     * Test setThemeManager()
     *
     * @return void
     */
    public function testSetThemeManager(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Theme manager mock.
        $themeManager = new ThemeManager($logger, $twigEnvironment);

        $obj = new TestThemeManagerTrait();

        $obj->setThemeManager($themeManager);
        $this->assertSame($themeManager, $obj->getThemeManager());
    }
}
