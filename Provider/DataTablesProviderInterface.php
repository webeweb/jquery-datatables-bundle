<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Provider;

/**
 * DataTables provider interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package namespace WBW\Bundle\JQuery\DatatablesBundle\Provider;
 */
interface DataTablesProviderInterface {

    /**
     * Tag name.
     *
     * @var string
     */
    const TAG_NAME = "webeweb.jquerydatatables.provider";

    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName();
}
