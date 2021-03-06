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

use JsonSerializable;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use WBW\Bundle\JQuery\DataTablesBundle\Entity\DataTablesEntityInterface;

/**
 * DataTables entity helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesEntityHelper {

    /**
     * Determines if an entity is compatible.
     *
     * @param object $entity The entity.
     * @return bool Returns true in case of success, false otherwise.
     */
    public static function isCompatible($entity): bool {

        if (true === ($entity instanceof DataTablesEntityInterface)) {
            return true;
        }

        if (true === is_object($entity) && true === method_exists($entity, "getId")) {
            return true;
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
     * Creates a serializer.
     *
     * @return Serializer Returns the serializer.
     */
    public static function newSerializer(): Serializer {
        return new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }
}
