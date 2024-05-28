<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Traits\Arrays;

/**
 * Array entities trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Traits\Arrays
 */
trait ArrayEntitiesTrait {

    /**
     * Entities.
     *
     * @var object[]
     */
    protected $entities;

    /**
     * Get the entities.
     *
     * @return object[] Returns the entities.
     */
    public function getEntities(): array {
        return $this->entities;
    }

    /**
     * Set the entities.
     *
     * @param object[] $entities The entities.
     * @return self Returns this instance.
     */
    protected function setEntities(array $entities): self {
        $this->entities = $entities;
        return $this;
    }
}
