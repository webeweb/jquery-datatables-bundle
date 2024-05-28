<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Exception;

use WBW\Bundle\CommonBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\TestProvider;

/**
 * Already registered provider exception test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Exception
 */
class AlreadyRegisteredProviderExceptionTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        // Set a Provider mock.
        $provider = new TestProvider();

        $obj = new AlreadyRegisteredProviderException($provider);

        $this->assertEquals('The provider "WBW\\Bundle\\CommonBundle\\Tests\\Fixtures\\Provider\\TestProvider" is already registered', $obj->getMessage());
    }
}
