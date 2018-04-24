<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Twig\Extension;

use Twig_Extension;

/**
 * Abstract DataTables Twig extension.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Twig\Extension
 * @abstract
 */
abstract class AbstractDataTablesTwigExtension extends Twig_Extension {

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    protected function dataTablesTable(DataTablesWrapper $dtWrapper) {
        
    }

    protected function datatablesTFoot(DataTablesWrapper $dtWrapper) {

    }

    protected function datatablesTHead(DataTablesWrapper $dtWrapper) {

    }

}
