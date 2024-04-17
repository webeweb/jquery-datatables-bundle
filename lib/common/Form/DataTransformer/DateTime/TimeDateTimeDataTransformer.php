<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Form\DataTransformer\DateTime;

use WBW\Bundle\CommonBundle\Form\DataTransformer\AbstractDateTimeDataTransformer;

/**
 * Time date/time data transformer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Form\DataTransformer\DateTime
 */
class TimeDateTimeDataTransformer extends AbstractDateTimeDataTransformer {

    /**
     * Constructor.
     *
     * @param string $format The format.
     * @param string|null $timezone The timezone.
     */
    public function __construct(string $format = "H:i:s", ?string $timezone = "UTC") {
        parent::__construct($format, $timezone);
    }
}
