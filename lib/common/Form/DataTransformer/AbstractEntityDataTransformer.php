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
abstract class AbstractEntityDataTransformer extends AbstractDataTransformer implements DataTransformerInterface {

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
     * Decode a value.
     *
     * @param mixed|null $value The value.
     * @return mixed|null Returns the decoded value
     */
    protected function decode($value) {

        if ($value <= 0) {
            return null;
        }

        return $this->getEntityManager()
            ->getRepository($this->getEntityClass())
            ->find($value);
    }

    /**
     * Encode a value.
     *
     * @param mixed|null $value The value.
     * @return mixed|null Returns the encoded value.
     */
    protected function encode($value) {

        if (null === $value || false === method_exists($value, "getId")) {
            return -1;
        }

        return $value->getId();
    }

    /**
     * Get the entity class.
     *
     * @return string Returns the entity class.
     */
    abstract protected function getEntityClass(): string;

}
