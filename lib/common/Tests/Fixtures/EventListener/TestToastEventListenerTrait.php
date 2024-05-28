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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\EventListener;

use WBW\Bundle\CommonBundle\EventListener\ToastEventListenerTrait;

/**
 * Test toast event listener trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\EventListener
 */
class TestToastEventListenerTrait {

    use ToastEventListenerTrait {
        setToastEventListener as public;
    }
}
