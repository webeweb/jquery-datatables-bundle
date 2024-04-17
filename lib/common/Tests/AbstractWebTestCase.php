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

namespace WBW\Bundle\CommonBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Abstract web test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests
 */
class AbstractWebTestCase extends WebTestCase {

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        static::ensureKernelShutdown();
    }

    /**
     * {@inheritDoc}
     */
    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        static::$kernel = static::createKernel();

        // Clean the cache to avoid issues due to cache files.
        $filesystem = new Filesystem();
        $filesystem->remove(static::$kernel->getCacheDir());

        static::$kernel->boot();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown(): void {
        static::$kernel->shutdown();
        parent::tearDown();
    }
}
