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

namespace WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component;

use WBW\Bundle\BootstrapBundle\Component\AbstractAlert;

/**
 * Test abstract alert.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component
 */
class TestAbstractAlert extends AbstractAlert {

    /**
     * Constructor.
     *
     * @param string|null $type The type.
     */
    public function __construct(?string $type) {
        parent::__construct($type);
    }
}
