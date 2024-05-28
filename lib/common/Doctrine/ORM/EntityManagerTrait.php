<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Doctrine\ORM;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Entity manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Doctrine\ORM
 */
trait EntityManagerTrait {

    /**
     * Entity manager.
     *
     * @var EntityManagerInterface|null
     */
    private $entityManager;

    /**
     * Get the entity manager.
     *
     * @return EntityManagerInterface|null Returns the entity manager.
     */
    public function getEntityManager(): ?EntityManagerInterface {
        return $this->entityManager;
    }

    /**
     * Set the entity manager.
     *
     * @param EntityManagerInterface|null $entityManager The entity manager.
     * @return self Returns this instance.
     */
    protected function setEntityManager(?EntityManagerInterface $entityManager): self {
        $this->entityManager = $entityManager;
        return $this;
    }
}
