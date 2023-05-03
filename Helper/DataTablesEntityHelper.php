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

use InvalidArgumentException;
use JsonSerializable;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Entity\DataTablesEntityInterface;

/**
 * DataTables entity helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesEntityHelper {

    /**
     * Indexe the entities.
     *
     * @param array $entities The entities.
     * @return array Returns the indexed entities.
     * @throws InvalidArgumentException Throws an invalid argument exception if an entity is incompatible.
     */
    public static function indexEntities(array $entities): array {

        $map = [];

        foreach ($entities as $current) {

            static::isCompatible($current, true);

            /** @var DataTablesEntityInterface $current */
            $key = $current->getId();
            if (true === array_key_exists($key, $map)) {
                continue;
            }

            $map[$key] = $current;
        }

        return $map;
    }

    /**
     * Determine if an entity is compatible.
     *
     * @param object $entity The entity.
     * @param bool $throwException Throw exception ?
     * @return bool Returns true in case of success, false otherwise.
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is incompatible.
     */
    public static function isCompatible($entity, bool $throwException = false): bool {

        if (true === ($entity instanceof DataTablesEntityInterface)) {
            return true;
        }

        if (true === is_object($entity) && true === method_exists($entity, "getId")) {
            return true;
        }

        if (true === $throwException) {
            throw new InvalidArgumentException("The entity must implements DataTablesEntityInterface or declare a getId() method");
        }

        return false;
    }

    /**
     * Serialize an entity.
     *
     * @param object|null $entity The entity.
     * @return string Returns the serialized entity.
     */
    public static function jsonSerialize($entity): string {

        $data = true === ($entity instanceof JsonSerializable) ? $entity->jsonSerialize() : $entity;
        if (null === $data) {
            $data = [];
        }

        return DataTablesEntityHelper::newSerializer()->serialize($data, "json");
    }

    /**
     * Create a serializer.
     *
     * @return SerializerInterface Returns the serializer.
     */
    public static function newSerializer(): SerializerInterface {
        return new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }
}
