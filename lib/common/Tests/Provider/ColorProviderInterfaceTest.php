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

namespace WBW\Bundle\CommonBundle\Tests\Provider;

use WBW\Bundle\CommonBundle\Provider\ColorProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Color provider interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class ColorProviderInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct().
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.provider.color", ColorProviderInterface::COLOR_PROVIDER_TAG_NAME);
    }
}