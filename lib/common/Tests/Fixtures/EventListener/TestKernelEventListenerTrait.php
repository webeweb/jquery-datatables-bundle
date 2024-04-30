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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\EventListener;

use WBW\Bundle\CommonBundle\EventListener\KernelEventListenerTrait;

/**
 * Test kernel event listener trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\EventListener
 */
class TestKernelEventListenerTrait {

    use KernelEventListenerTrait {
        setKernelEventListener as public;
    }
}
