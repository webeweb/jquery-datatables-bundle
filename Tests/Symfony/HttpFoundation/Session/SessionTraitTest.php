<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Symfony\HttpFoundation\Session;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\HttpFoundation\Session\TestSessionTrait;

/**
 * Session trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Symfony\HttpFoundation\Session
 */
class SessionTraitTest extends AbstractTestCase {

    /**
     * Test setSession()
     *
     * @return void
     */
    public function testSetSession(): void {

        $obj = new TestSessionTrait();

        $obj->setSession($this->session);
        $this->assertSame($this->session, $obj->getSession());
    }
}
