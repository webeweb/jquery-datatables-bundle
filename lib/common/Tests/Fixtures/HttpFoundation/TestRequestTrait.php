<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation;

use WBW\Bundle\CommonBundle\HttpFoundation\RequestTrait;

/**
 * Test request trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation
 */
class TestRequestTrait {

    use RequestTrait {
        setRequest as public;
    }
}
