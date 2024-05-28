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

namespace WBW\Bundle\DataTablesBundle\Model;

/**
 * DataTables entity trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Model
 */
trait DataTablesEntityTrait {

    /**
     * Entity.
     *
     * @var DataTablesEntityInterface|null
     */
    protected $entity;

    /**
     * Get the entity.
     *
     * @return DataTablesEntityInterface|null Returns the entity.
     */
    public function getEntity(): ?DataTablesEntityInterface {
        return $this->entity;
    }

    /**
     * Set the entity.
     *
     * @param DataTablesEntityInterface|null $entity The entity.
     * @return self Returns this instance.
     */
    protected function setEntity(?DataTablesEntityInterface $entity): self {
        $this->entity = $entity;
        return $this;
    }
}
