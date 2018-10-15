<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

/**
 * DataTables wrapper trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
trait DataTablesWrapperTrait {

    /**
     * Wrapper.
     *
     * @var DataTablesWrapperInterface
     */
    private $wrapper;

    /**
     * Get the the wrapper.
     *
     * @return DataTablesWrapperInterface Returns the wrapper.
     */
    public function getWrapper() {
        return $this->wrapper;
    }

    /**
     * Set the wrapper.
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     */
    protected function setWrapper(DataTablesWrapperInterface $wrapper) {
        $this->wrapper = $wrapper;
        return $this;
    }

}
