<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Provider;

/**
 * DataTables router trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 */
trait DataTablesRouterTrait {

    /**
     * Router.
     *
     * @var DataTablesRouterInterface|null
     */
    protected $router;

    /**
     * Get the router.
     *
     * @return DataTablesRouterInterface|null Returns the router.
     */
    public function getRouter(): ?DataTablesRouterInterface {
        return $this->router;
    }

    /**
     * Set the router.
     *
     * @param DataTablesRouterInterface|null $router The router.
     * @return self Returns this instance.
     */
    protected function setRouter(?DataTablesRouterInterface $router): self {
        $this->router = $router;
        return $this;
    }
}
