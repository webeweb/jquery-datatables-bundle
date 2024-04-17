<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component;

use WBW\Bundle\BootstrapBundle\Component\ButtonInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component\TestButtonTrait;

/**
 * Button trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component
 */
class ButtonTraitTest extends AbstractTestCase {

    /**
     * Test setButton()
     *
     * @return void
     */
    public function testSetButton(): void {

        // Set a Button mock.
        $button = $this->getMockBuilder(ButtonInterface::class)->getMock();

        $obj = new TestButtonTrait();

        $obj->setButton($button);
        $this->assertSame($button, $obj->getButton());
    }
}
