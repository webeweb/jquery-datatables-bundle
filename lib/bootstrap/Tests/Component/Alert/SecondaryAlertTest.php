<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Alert;

use WBW\Bundle\BootstrapBundle\Component\Alert\SecondaryAlert;
use WBW\Bundle\BootstrapBundle\Component\AlertInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Secondary alert test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Alert
 */
class SecondaryAlertTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new SecondaryAlert();

        $this->assertEquals(AlertInterface::ALERT_TYPE_SECONDARY, $obj->getType());
    }
}