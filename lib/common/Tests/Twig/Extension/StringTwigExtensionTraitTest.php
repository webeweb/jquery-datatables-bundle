<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Twig\Extension;

use Twig\Environment;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Twig\Extension\TestStringTwigExtensionTrait;
use WBW\Bundle\CommonBundle\Twig\Extension\StringTwigExtension;

/**
 * String Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Extension
 */
class StringTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setStringTwigExtension()
     *
     * @return void
     */
    public function testSetStringTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a String Twig extension mock.
        $stringTwigExtension = new StringTwigExtension($twigEnvironment);

        $obj = new TestStringTwigExtensionTrait();

        $obj->setStringTwigExtension($stringTwigExtension);
        $this->assertSame($stringTwigExtension, $obj->getStringTwigExtension());
    }
}
