<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Twig\Environment;

use Twig\Environment;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Twig\Environment\TestTwigEnvironmentTrait;

/**
 * Twig environment trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Environment
 */
class TwigEnvironmentTraitTest extends AbstractTestCase {

    /**
     * Test setTwigEnvironment()
     *
     * @return void
     */
    public function testSetTwigEnvironment(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        $obj = new TestTwigEnvironmentTrait();

        $obj->setTwigEnvironment($twigEnvironment);
        $this->assertSame($twigEnvironment, $obj->getTwigEnvironment());
    }
}
