<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\Layout\HookDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout\TestHookDropdownLayoutProviderTrait;

/**
 * Hook dropdown layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class HookDropdownLayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setHookDropdownLayoutProvider()
     *
     * @return void
     */
    public function testSetHookDropdownLayoutProvider(): void {

        // Set an Hook dropdown layout provider mock.
        $hookDropdownLayoutProvider = $this->getMockBuilder(HookDropdownLayoutProviderInterface::class)->getMock();

        $obj = new TestHookDropdownLayoutProviderTrait();

        $obj->setHookDropdownLayoutProvider($hookDropdownLayoutProvider);
        $this->assertSame($hookDropdownLayoutProvider, $obj->getHookDropdownLayoutProvider());
    }
}
