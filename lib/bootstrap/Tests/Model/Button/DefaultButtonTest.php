<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Model\Button;

use WBW\Bundle\BootstrapBundle\Model\Button\DefaultButton;
use WBW\Bundle\BootstrapBundle\Model\ButtonInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Default button test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Model\Button
 */
class DefaultButtonTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DefaultButton();

        $this->assertEquals(ButtonInterface::BUTTON_TYPE_DEFAULT, $obj->getType());
    }
}
