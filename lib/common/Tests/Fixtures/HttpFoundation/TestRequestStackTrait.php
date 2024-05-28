<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation;

use WBW\Bundle\CommonBundle\HttpFoundation\RequestStackTrait;

/**
 * Test request stack trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation
 */
class TestRequestStackTrait {

    use RequestStackTrait {
        setRequestStack as public;
    }
}
