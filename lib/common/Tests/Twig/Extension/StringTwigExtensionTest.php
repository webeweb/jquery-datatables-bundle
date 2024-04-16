<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Twig\Extension;

use DateTime;
use Throwable;
use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Twig\Extension\StringTwigExtension;

/**
 * String Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Extension
 */
class StringTwigExtensionTest extends AbstractTestCase {

    /**
     * Twig environment.
     *
     * @var Environment|null
     */
    private $twigEnvironment;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Twig environment mock.
        $this->twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * Test dateFormat()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDateFormat(): void {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->dateFormat(null));
        $this->assertEquals("2018-01-14 18:00", $obj->dateFormat(new DateTime("2018-01-14 18:00")));
        $this->assertEquals("14/01/2018 18:00", $obj->dateFormat(new DateTime("2018-01-14 18:00"), "d/m/Y H:i"));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters() {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(11, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("dateFormat", $res[$i]->getName());
        $this->assertEquals([$obj, "dateFormat"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("htmlEntityDecode", $res[$i]->getName());
        $this->assertEquals([$obj, "htmlEntityDecode"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("htmlEntityEncode", $res[$i]->getName());
        $this->assertEquals([$obj, "htmlEntityEncode"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("jsonDecode", $res[$i]->getName());
        $this->assertEquals([$obj, "jsonDecode"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("md5", $res[$i]->getName());
        $this->assertEquals([$obj, "md5"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("stringExtractUpperCase", $res[$i]->getName());
        $this->assertEquals([$obj, "stringExtractUpperCase"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("stringFormat", $res[$i]->getName());
        $this->assertEquals([$obj, "stringFormat"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("stringHumanReadable", $res[$i]->getName());
        $this->assertEquals([$obj, "stringHumanReadable"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("stringLowerCamelCase", $res[$i]->getName());
        $this->assertEquals([$obj, "stringLowerCamelCase"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("stringSnakeCase", $res[$i]->getName());
        $this->assertEquals([$obj, "stringSnakeCase"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("stringUpperCamelCase", $res[$i]->getName());
        $this->assertEquals([$obj, "stringUpperCamelCase"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions() {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(12, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("dateFormat", $res[$i]->getName());
        $this->assertEquals([$obj, "dateFormat"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("htmlEntityDecode", $res[$i]->getName());
        $this->assertEquals([$obj, "htmlEntityDecode"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("htmlEntityEncode", $res[$i]->getName());
        $this->assertEquals([$obj, "htmlEntityEncode"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("jsonDecode", $res[$i]->getName());
        $this->assertEquals([$obj, "jsonDecode"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("md5", $res[$i]->getName());
        $this->assertEquals([$obj, "md5"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("stringExtractUpperCase", $res[$i]->getName());
        $this->assertEquals([$obj, "stringExtractUpperCase"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("stringFormat", $res[$i]->getName());
        $this->assertEquals([$obj, "stringFormat"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("stringHumanReadable", $res[$i]->getName());
        $this->assertEquals([$obj, "stringHumanReadable"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("stringLowerCamelCase", $res[$i]->getName());
        $this->assertEquals([$obj, "stringLowerCamelCase"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("stringSnakeCase", $res[$i]->getName());
        $this->assertEquals([$obj, "stringSnakeCase"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("stringUniqId", $res[$i]->getName());
        $this->assertEquals([$obj, "stringUniqIdFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("stringUpperCamelCase", $res[$i]->getName());
        $this->assertEquals([$obj, "stringUpperCamelCase"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test htmlEntityDecode()
     *
     * @return void
     */
    public function testHtmlEntityDecode(): void {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->htmlEntityDecode(null));
        $this->assertEquals("&", $obj->htmlEntityDecode("&amp;"));
    }

    /**
     * Test htmlEntityEncode()
     *
     * @return void
     */
    public function testHtmlEntityEncode(): void {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->htmlEntityEncode(null));
        $this->assertEquals("&amp;", $obj->htmlEntityEncode("&"));
    }

    /**
     * Test jsonDecode()
     *
     * @return void
     */
    public function testJsonDecode(): void {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->jsonDecode(null));
        $this->assertEquals([], $obj->jsonDecode("{}"));
    }

    /**
     * Test md5()
     *
     * @return void
     */
    public function testMd5(): void {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->md5(null));
        $this->assertEquals("d41d8cd98f00b204e9800998ecf8427e", $obj->md5(""));
    }

    /**
     * Test the stringExtractUpperCase() method
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testStringExtractUpperCase() {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->stringExtractUpperCase(null));
        $this->assertEquals("STE", $obj->stringExtractUpperCase("StringTwigExtension"));
        $this->assertEquals("ste", $obj->stringExtractUpperCase("StringTwigExtension", true));
    }

    /**
     * Test the stringFormat() method
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testStringFormat() {

        $obj = new StringTwigExtension($this->twigEnvironment);
        $this->assertEquals("", $obj->stringFormat(null, "_____ _____ _"));
        $this->assertEquals("", $obj->stringFormat("Helloworld!", null));

        $this->assertEquals("Hello world !", $obj->stringFormat("Helloworld!", "_____ _____ _"));
        $this->assertEquals("+33 6 12 34 56 78", $obj->stringFormat("612345678", "+33 _ __ __ __ __"));
    }

    /**
     * Test the stringHumanReadable() method
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testStringHumanReadable() {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->stringHumanReadable(null));
        $this->assertEquals("String twig extension", $obj->stringHumanReadable("StringTwigExtension"));
    }

    /**
     * Test the stringLowerCamelCase() method
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testStringLowerCamelCase() {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->stringLowerCamelCase(null));
        $this->assertEquals("stringTwigExtension", $obj->stringLowerCamelCase("StringTwigExtension"));
    }

    /**
     * Test the stringSnakeCase() method
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testStringSnakeCase() {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->stringSnakeCase(null));
        $this->assertEquals("string_twig_extension", $obj->stringSnakeCase("StringTwigExtension"));
        $this->assertEquals("string-twig-extension", $obj->stringSnakeCase("StringTwigExtension", "-"));
    }

    /**
     * Test the stringUniqidFunction() method
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testStringUniqidFunction() {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->stringUniqidFunction(-1));

        $res = $obj->stringUniqidFunction();
        $this->assertRegExp("/^[a-z0-9]{13}$/", $res);

        $map = [];
        for ($i = 0; $i < 20; ++$i) {

            $tmp = $obj->stringUniqidFunction();
            $this->assertArrayNotHasKey($tmp, $map);

            $map[$tmp] = $tmp;
        }
    }

    /**
     * Test the stringUpperCamelCase() method
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testStringUpperCamelCase() {

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->stringUpperCamelCase(null));
        $this->assertEquals("StringTwigExtension", $obj->stringUpperCamelCase("StringTwigExtension"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("wbw.common.twig.extension.string", StringTwigExtension::SERVICE_NAME);

        $obj = new StringTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}
