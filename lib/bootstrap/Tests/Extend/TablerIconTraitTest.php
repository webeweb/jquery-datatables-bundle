<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Extend;

use WBW\Bundle\BootstrapBundle\Extend\TablerIconInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Extend\TestTablerIconTrait;

/**
 * Tabler icon trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Extend
 */
class TablerIconTraitTest extends AbstractTestCase {

    /**
     * Test setTablerIcon()
     *
     * @return void
     */
    public function testSetTablerIcon(): void {

        // Set a Tabler icon mock.
        $tablerIcon = $this->getMockBuilder(TablerIconInterface::class)->getMock();

        $obj = new TestTablerIconTrait();

        $obj->setTablerIcon($tablerIcon);
        $this->assertSame($tablerIcon, $obj->getTablerIcon());
    }
}
