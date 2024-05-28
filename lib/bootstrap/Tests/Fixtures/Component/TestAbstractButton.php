<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component;

use WBW\Bundle\BootstrapBundle\Component\AbstractButton;

/**
 * Test abstract button.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component
 */
class TestAbstractButton extends AbstractButton {

    /**
     * Constructor.
     *
     * @param string|null $type The type.
     */
    public function __construct(?string $type) {
        parent::__construct($type);
    }
}
