<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation;

use WBW\Bundle\CommonBundle\HttpFoundation\ResponseTrait;

/**
 * Test response trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation
 */
class TestResponseTrait {

    use ResponseTrait {
        setResponse as public;
    }
}
