<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Twig\Extension;

use Twig\Environment;
use WBW\Bundle\CommonBundle\Manager\QuoteManagerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Twig\Extension\TestQuoteTwigExtensionTrait;
use WBW\Bundle\CommonBundle\Twig\Extension\QuoteTwigExtension;

/**
 * Quote Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Extension
 */
class QuoteTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setQuoteTwigExtension()
     *
     * @return void
     */
    public function testSetQuoteTwigExtension(): void {

        // Set a Quote manager mock.
        $quoteManager = $this->getMockBuilder(QuoteManagerInterface::class)->getMock();

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Quote Twig extension mock.
        $quoteTwigExtension = new QuoteTwigExtension($twigEnvironment, $quoteManager);

        $obj = new TestQuoteTwigExtensionTrait();

        $obj->setQuoteTwigExtension($quoteTwigExtension);
        $this->assertSame($quoteTwigExtension, $obj->getQuoteTwigExtension());
    }
}
