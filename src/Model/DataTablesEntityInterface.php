<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Model;

/**
 * DataTables entity interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Entity
 */
interface DataTablesEntityInterface {

    /**
     * Get the id.
     *
     * @return int|null Returns the id.
     */
    public function getId(): ?int;
}
