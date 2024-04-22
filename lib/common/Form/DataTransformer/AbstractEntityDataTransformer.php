<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use WBW\Bundle\CommonBundle\Doctrine\ORM\EntityManagerTrait;

/**
 * Abstract entity data transformer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Form\DataTransformer
 * @abstract
 */
abstract class AbstractEntityDataTransformer implements DataTransformerInterface {

    use EntityManagerTrait;

    /**
     * Constructor.
     *
     * @param EntityManagerInterface $em The entity manager.
     */
    public function __construct(EntityManagerInterface $em) {
        $this->setEntityManager($em);
    }

    /**
     * Get the entity class.
     *
     * @return string Returns the entity class.
     */
    abstract protected function getEntityClass(): string;

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($value) {

        if ($value <= 0) {
            return null;
        }

        return $this->getEntityManager()
            ->getRepository($this->getEntityClass())
            ->find($value);
    }

    /**
     * {@inheritDoc}
     */
    public function transform($value) {

        if (null === $value || false === method_exists($value, "getId")) {
            return -1;
        }

        return $value->getId();
    }
}
