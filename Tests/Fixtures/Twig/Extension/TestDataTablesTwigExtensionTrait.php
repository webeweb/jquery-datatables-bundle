<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Twig\Extension;

use WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension\DataTablesTwigExtensionTrait;

/**
 * Test DataTables Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Twig\Extension
 */
class TestDataTablesTwigExtensionTrait {

    use DataTablesTwigExtensionTrait {
        setDataTablesTwigExtension as public;
    }
}
