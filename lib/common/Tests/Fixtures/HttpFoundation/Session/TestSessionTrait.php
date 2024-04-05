<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation\Session;

use WBW\Bundle\CommonBundle\HttpFoundation\Session\SessionTrait;

/**
 * Test session trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation\Session
 */
class TestSessionTrait {

    use SessionTrait {
        setSession as public;
    }
}
