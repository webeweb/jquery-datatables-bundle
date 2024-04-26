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

/**
 * Hook dropdown layout provider interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class HookDropdownLayoutProviderInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.provider.layout.hook_dropdown", HookDropdownLayoutProviderInterface::SERVICE_NAME);
    }
}
