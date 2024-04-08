<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Form\DataTransformer\Timestamp;

use WBW\Bundle\CommonBundle\Form\DataTransformer\AbstractTimestampDataTransformer;

/**
 * Date timestamp data transformer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Form\DataTransformer\Timestamp
 */
class DateTimestampDataTransformer extends AbstractTimestampDataTransformer {

    /**
     * Constructor.
     *
     * @param string $format The format.
     * @param string|null $timezone The timezone.
     */
    public function __construct(string $format = "Y-m-d", ?string $timezone = "UTC") {
        parent::__construct($format, $timezone);
    }
}