<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Button;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Component\Button\DangerButton;
use WBW\Bundle\BootstrapBundle\Component\ButtonInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Component\ButtonInterface as BaseButtonInterface;

/**
 * Danger button test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Button
 */
class DangerButtonTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DangerButton();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ButtonInterface::class, $obj);

        $this->assertEquals(BaseButtonInterface::BUTTON_TYPE_DANGER, $obj->getType());
    }
}
