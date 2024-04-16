<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Alert;

use WBW\Bundle\WidgetBundle\Alert\AlertInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Alert\TestAlertTrait;

/**
 * Alert trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Alert
 */
class AlertTraitTest extends AbstractTestCase {

    /**
     * Test setAlert()
     *
     * @return void
     */
    public function testSetAlert(): void {

        // Set an Alert mock.
        $alert = $this->getMockBuilder(AlertInterface::class)->getMock();

        $obj = new TestAlertTrait();

        $obj->setAlert($alert);
        $this->assertSame($alert, $obj->getAlert());
    }
}
