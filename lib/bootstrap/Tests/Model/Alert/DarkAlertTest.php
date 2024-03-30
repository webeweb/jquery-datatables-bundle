<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Model\Alert;

use WBW\Bundle\BootstrapBundle\Model\Alert\DarkAlert;
use WBW\Bundle\BootstrapBundle\Model\AlertInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Dark alert test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Model\Alert
 */
class DarkAlertTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DarkAlert();

        $this->assertEquals(AlertInterface::ALERT_TYPE_DARK, $obj->getType());
    }
}
