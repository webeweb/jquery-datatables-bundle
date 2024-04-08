<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection;

use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Common extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection
 */
class WBWCommonExtensionTest extends AbstractTestCase {

    /**
     * Test loadYamlConfig()
     *
     * @return void
     */
    public function testLoadYamlConfig(): void {

        // Set a path mock.
        $path = realpath(__DIR__ . "/../Fixtures/Resources/config");

        $res = WBWCommonExtension::loadYamlConfig($path, "config");
        $this->assertNotEquals([], $res);
    }

    /**
     * Test loadYamlConfig()
     *
     * @return void
     */
    public function testLoadYamlConfigWithoutFilename(): void {

        // Set a path mock.
        $path = realpath(__DIR__ . "/../Fixtures/Resources/config");

        $res = WBWCommonExtension::loadYamlConfig($path, "error");
        $this->assertEquals([], $res);
    }
}
