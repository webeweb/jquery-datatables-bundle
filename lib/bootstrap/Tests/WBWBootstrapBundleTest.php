<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests;

use WBW\Bundle\BootstrapBundle\WBWBootstrapBundle;

/**
 * Bootstrap bundle test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests
 */
class WBWBootstrapBundleTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("danger", WBWBootstrapBundle::BOOTSTRAP_TYPE_DANGER);
        $this->assertEquals("dark", WBWBootstrapBundle::BOOTSTRAP_TYPE_DARK);
        $this->assertEquals("default", WBWBootstrapBundle::BOOTSTRAP_TYPE_DEFAULT);
        $this->assertEquals("info", WBWBootstrapBundle::BOOTSTRAP_TYPE_INFO);
        $this->assertEquals("light", WBWBootstrapBundle::BOOTSTRAP_TYPE_LIGHT);
        $this->assertEquals("primary", WBWBootstrapBundle::BOOTSTRAP_TYPE_PRIMARY);
        $this->assertEquals("secondary", WBWBootstrapBundle::BOOTSTRAP_TYPE_SECONDARY);
        $this->assertEquals("success", WBWBootstrapBundle::BOOTSTRAP_TYPE_SUCCESS);
        $this->assertEquals("warning", WBWBootstrapBundle::BOOTSTRAP_TYPE_WARNING);

        $this->assertEquals("3.4.1", WBWBootstrapBundle::BOOTSTRAP_VERSION_3);
        $this->assertEquals("4.6.2", WBWBootstrapBundle::BOOTSTRAP_VERSION_4);
        $this->assertEquals("5.3.2", WBWBootstrapBundle::BOOTSTRAP_VERSION_5);
    }
}
