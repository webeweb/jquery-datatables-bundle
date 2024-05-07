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

namespace WBW\Bundle\CommonBundle\Tests\EventListener;

use Symfony\Contracts\Translation\TranslatorInterface;
use WBW\Bundle\CommonBundle\EventListener\SecurityEventListener;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\EventListener\TestSecurityEventListenerTrait;

/**
 * Security event listener trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\EventListener
 */
class SecurityEventListenerTraitTest extends AbstractTestCase {

    /**
     * Test setSecurityEventListener()
     *
     * @return void
     */
    public function testSetSecurityEventListener(): void {

        // Set a Translator mock.
        $translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();

        // Set a Security event listener mock.
        $securityEventListener = new SecurityEventListener($translator);

        $obj = new TestSecurityEventListenerTrait();

        $obj->setSecurityEventListener($securityEventListener);
        $this->assertSame($securityEventListener, $obj->getSecurityEventListener());
    }
}
