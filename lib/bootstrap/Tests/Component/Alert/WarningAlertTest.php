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

use WBW\Bundle\BootstrapBundle\Component\Alert\WarningAlert;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Assets\AlertInterface as BaseAlertInterface;

/**
 * Warning alert test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Alert
 */
class WarningAlertTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new WarningAlert();

        $this->assertEquals(BaseAlertInterface::ALERT_TYPE_WARNING, $obj->getType());
    }
}