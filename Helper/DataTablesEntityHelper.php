<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Helper;

use WBW\Bundle\JQuery\DataTablesBundle\Entity\DataTablesEntityInterface;

/**
 * DataTables entity helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesEntityHelper {

    /**
     * Determines if an entity is compatible.
     *
     * @param DataTablesEntityInterface|object $entity The entity.
     * @return bool Returns true in case of success, false otherwise.
     */
    public static function isCompatible($entity) {

        if (true === ($entity instanceof DataTablesEntityInterface)) {
            return true;
        }

        if (true === is_object($entity) && true === method_exists($entity, "getId")) {
            return true;
        }

        return false;
    }
}
