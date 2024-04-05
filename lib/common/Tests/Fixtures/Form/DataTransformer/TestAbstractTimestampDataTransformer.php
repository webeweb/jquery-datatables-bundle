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

use WBW\Bundle\CommonBundle\Form\DataTransformer\AbstractTimestampDataTransformer;

/**
 * Test timestamp data transformer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Form\DataTransformer
 */
class TestAbstractTimestampDataTransformer extends AbstractTimestampDataTransformer {

    /**
     * Constructor.
     *
     * @param string $format The format.
     * @param string|null $timeZone The timezone.
     */
    public function __construct(string $format, ?string $timeZone = null) {
        parent::__construct($format, $timeZone);
    }
}
