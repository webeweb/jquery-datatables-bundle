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

use Psr\Log\LoggerInterface;
use Throwable;
use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFunction;
use WBW\Bundle\CommonBundle\Manager\QuoteManager;
use WBW\Bundle\CommonBundle\Provider\Quote\WorldsWisdomQuoteProvider;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Twig\Extension\QuoteTwigExtension;

/**
 * Quote Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Extension
 */
class QuoteTwigExtensionTest extends AbstractTestCase {

    /**
     * Logger.
     *
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * Quote manager.
     *
     * @var QuoteManager|null
     */
    private $quoteManager;

    /**
     * Twig environment.
     *
     * @var Environment|null
     */
    private $twigEnvironment;

    /**
     * {@inheritDoc}
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Quote provider mock.
        $quoteProvider = new WorldsWisdomQuoteProvider();

        // Set a Quote manager mock.
        $this->quoteManager = new QuoteManager($this->logger);
        $this->quoteManager->addProvider($quoteProvider);

        // Set a Twig environment mock.
        $this->twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new QuoteTwigExtension($this->twigEnvironment, $this->quoteManager);

        $res = $obj->getFunctions();
        $this->assertCount(3, $res);

        $this->assertInstanceOf(TwigFunction::class, $res[0]);
        $this->assertEquals("quote", $res[0]->getName());
        $this->assertEquals([$obj, "quoteFunction"], $res[0]->getCallable());
        $this->assertEquals(["html"], $res[0]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[1]);
        $this->assertEquals("quoteAuthor", $res[1]->getName());
        $this->assertEquals([$obj, "quoteAuthorFunction"], $res[1]->getCallable());
        $this->assertEquals(["html"], $res[1]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[2]);
        $this->assertEquals("quoteContent", $res[2]->getName());
        $this->assertEquals([$obj, "quoteContentFunction"], $res[2]->getCallable());
        $this->assertEquals(["html"], $res[2]->getSafe(new Node()));
    }

    /**
     * Test quoteAuthorFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testQuoteAuthorFunction(): void {

        $obj = new QuoteTwigExtension($this->twigEnvironment, $this->quoteManager);

        $this->assertNotNull($obj->quoteAuthorFunction());
    }

    /**
     * Test quoteAuthorFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testQuoteAuthorFunctionWithBadDomain(): void {

        $obj = new QuoteTwigExtension($this->twigEnvironment, $this->quoteManager);

        $this->assertEquals("", $obj->quoteAuthorFunction("github"));
    }

    /**
     * Test quoteContentFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testQuoteContentFunction(): void {

        $obj = new QuoteTwigExtension($this->twigEnvironment, $this->quoteManager);

        $this->assertNotNull($obj->quoteContentFunction());
    }

    /**
     * Test quoteContentFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testQuoteContentFunctionWithBadDomain(): void {

        $obj = new QuoteTwigExtension($this->twigEnvironment, $this->quoteManager);

        $this->assertEquals("", $obj->quoteContentFunction("github"));
    }

    /**
     * Test quoteFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testQuoteFunction(): void {

        $obj = new QuoteTwigExtension($this->twigEnvironment, $this->quoteManager);

        $res = $obj->quoteFunction();
        $this->assertNotNull($res);

        $this->assertSame($res, $obj->quoteFunction("WorldsWisdom.fr"));
        $this->assertSame($res, $obj->quoteFunction());
    }

    /**
     * Test quoteFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testQuoteFunctionWithBadDomain(): void {

        $obj = new QuoteTwigExtension($this->twigEnvironment, $this->quoteManager);

        $this->assertNull($obj->quoteFunction("github"));
    }

    /**
     * Test quoteFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testQuoteFunctionWithoutProvider(): void {

        $obj = new QuoteTwigExtension($this->twigEnvironment, new QuoteManager($this->logger));

        $this->assertNull($obj->quoteFunction());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.twig.extension.quote", QuoteTwigExtension::SERVICE_NAME);

        $obj = new QuoteTwigExtension($this->twigEnvironment, $this->quoteManager);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
        $this->assertSame($this->quoteManager, $obj->getQuoteManager());
    }
}
