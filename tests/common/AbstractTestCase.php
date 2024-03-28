<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

/**
 * Abstract test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests
 */
abstract class AbstractTestCase extends BaseTestCase {

    /**
     * Container builder.
     *
     * @var ContainerBuilder|null
     */
    protected $containerBuilder;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Parameter bag mock.
        $parameterBag = new ParameterBag([
            "kernel.environment" => "test",
            "kernel.project_dir" => realpath(__DIR__ . "/../fixtures/app"),
        ]);

        // Set a Container builder with only the necessary.
        $this->containerBuilder = new ContainerBuilder($parameterBag);
    }
}
