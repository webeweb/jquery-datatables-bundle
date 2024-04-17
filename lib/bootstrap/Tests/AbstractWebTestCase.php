<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests;

use WBW\Bundle\CommonBundle\Tests\AbstractWebTestCase as BaseWebTestCase;

/**
 * Abstract web test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests
 */
abstract class AbstractWebTestCase extends BaseWebTestCase {

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        static::createClient();
    }
}
