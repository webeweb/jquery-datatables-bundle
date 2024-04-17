<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Security\Core\Authentication\Token\Storage;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Security\Core\Authentication\Token\Storage\TestTokenStorageTrait;

/**
 * Token storage trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Security\Core\Authentication\Token\Storage
 */
class TokenStorageTraitTest extends AbstractTestCase {

    /**
     * Test setTokenStorage()
     *
     * @return void
     */
    public function testSetTokenStorage(): void {

        $tokenStorage = $this->getMockBuilder(TokenStorageInterface::class)->getMock();

        $obj = new TestTokenStorageTrait();

        $obj->setTokenStorage($tokenStorage);
        $this->assertSame($tokenStorage, $obj->getTokenStorage());
    }
}
