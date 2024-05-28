<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Form\DataTransformer;

use DateTime;

/**
 * Abstract timestamp data transformer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Form\DataTransformer
 * @abstract
 */
abstract class AbstractTimestampDataTransformer extends AbstractDateTimeDataTransformer {

    /**
     * {@inheritDoc}
     */
    protected function decode($value) {

        /** @var DateTime|null $date */
        $date = parent::decode($value);
        if (null === $date) {
            return null;
        }

        return $date->getTimestamp();
    }

    /**
     * {@inheritDoc}
     */
    protected function encode($value) {

        if (null === $value) {
            return null;
        }

        $date = new DateTime("@$value");

        return parent::encode($date);
    }
}
