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

namespace WBW\Bundle\DocumentBundle\Tests\Exception;

use WBW\Bundle\DocumentBundle\Exception\NoneRegisteredStorageProviderException;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;

/**
 * None registered storage provider exception test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Exception
 */
class NoneRegisteredStorageProviderExceptionTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new NoneRegisteredStorageProviderException();

        $this->assertEquals("None registered storage provider", $obj->getMessage());
    }
}
