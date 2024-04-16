<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\ProgressBar;

use WBW\Bundle\WidgetBundle\ProgressBar\AbstractProgressBar;

/**
 * Test progress bar.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\ProgressBar
 */
class TestProgressBar extends AbstractProgressBar {

    /**
     * Constructor.
     *
     * @param string $type The type.
     */
    public function __construct(string $type) {
        parent::__construct($type);
    }
}
