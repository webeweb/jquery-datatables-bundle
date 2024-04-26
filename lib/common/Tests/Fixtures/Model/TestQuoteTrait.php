<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Model;

use WBW\Bundle\CommonBundle\Model\QuoteTrait;

/**
 * Test quote trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Model
 */
class TestQuoteTrait {

    use QuoteTrait {
        setQuote as public;
    }
}
