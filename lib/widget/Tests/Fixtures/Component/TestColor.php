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

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\Component;

use WBW\Bundle\WidgetBundle\Component\AbstractColor;

/**
 * Test color.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\Component
 */
class TestColor extends AbstractColor {

    /**
     * Constructor.
     *
     * @param string $name The name.
     */
    public function __construct(string $name) {
        parent::__construct($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getValues(): array {
        return [];
    }
}
