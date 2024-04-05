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

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer\Strings;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestStringWrapperTrait;

/**
 * String wrapper trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer\Strings
 */
class StringWrapperTraitTest extends AbstractTestCase {

    /**
     * Test wrapString()
     *
     * @return void
     */
    public function testWrapString(): void {

        $obj = new TestStringWrapperTrait();

        $this->assertNull($obj->wrapString(null, "prefix-", "-suffix"));
        $this->assertEquals("content", $obj->wrapString("content", null, null));
        $this->assertEquals("prefix-content", $obj->wrapString("content", "prefix-", null));
        $this->assertEquals("prefix-content-suffix", $obj->wrapString("content", "prefix-", "-suffix"));
        $this->assertEquals("content-suffix", $obj->wrapString("content", null, "-suffix"));
    }
}
