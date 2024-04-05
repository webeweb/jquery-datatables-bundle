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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Form\DataTransformer;

use DateTimeZone;
use WBW\Bundle\CommonBundle\Form\DataTransformer\AbstractDateTimeDataTransformer;

/**
 * Test abstract date/time data transformer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Form\DataTransformer
 */
class TestAbstractDateTimeDataTransformer extends AbstractDateTimeDataTransformer {

    /**
     * Constructor.
     *
     * @param string $format The format.
     * @param string|null $timeZone The timezone.
     */
    public function __construct(string $format, ?string $timeZone = null) {
        parent::__construct($format, $timeZone);
    }

    /**
     * {@inheritDoc}
     */
    public function newDateTimeZone(): ?DateTimeZone {
        return parent::newDateTimeZone();
    }
}
