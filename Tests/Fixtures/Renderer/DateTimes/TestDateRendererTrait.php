<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\DateTimes;

use WBW\Bundle\JQuery\DataTablesBundle\Renderer\DateTimes\DateRendererTrait;

/**
 * Test date renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\DateTimes
 */
class TestDateRendererTrait {

    use DateRendererTrait {
        renderDate as public;
    }
}
