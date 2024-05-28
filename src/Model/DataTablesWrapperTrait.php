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

namespace WBW\Bundle\DataTablesBundle\Model;

/**
 * DataTables wrapper trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Model
 */
trait DataTablesWrapperTrait {

    /**
     * Wrapper.
     *
     * @var DataTablesWrapperInterface|null
     */
    private $wrapper;

    /**
     * Get the wrapper.
     *
     * @return DataTablesWrapperInterface|null Returns the wrapper.
     */
    public function getWrapper(): ?DataTablesWrapperInterface {
        return $this->wrapper;
    }

    /**
     * Set the wrapper.
     *
     * @param DataTablesWrapperInterface|null $wrapper The wrapper.
     * @return self Returns this instance.
     */
    protected function setWrapper(?DataTablesWrapperInterface $wrapper): self {
        $this->wrapper = $wrapper;
        return $this;
    }
}
