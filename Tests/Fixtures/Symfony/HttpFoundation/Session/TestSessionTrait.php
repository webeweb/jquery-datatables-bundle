<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\HttpFoundation\Session;

use WBW\Bundle\CoreBundle\HttpFoundation\Session\SessionTrait;

/**
 * Test session trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\HttpFoundation\Session
 */
class TestSessionTrait {

    use SessionTrait {
        setSession as public;
    }
}
