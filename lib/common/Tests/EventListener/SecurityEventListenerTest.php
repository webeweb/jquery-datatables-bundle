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

namespace WBW\Bundle\CommonBundle\Tests\EventListener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Contracts\Translation\TranslatorInterface;
use WBW\Bundle\CommonBundle\EventListener\SecurityEventListener;
use WBW\Bundle\CommonBundle\EventListener\SecurityEventListenerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\DefaultTestCase;

/**
 * Security event listener test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\EventListener
 */
class SecurityEventListenerTest extends AbstractTestCase {

    /**
     * Translator.
     *
     * @var TranslatorInterface|null
     */
    private $translator;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Translator mock.
        $this->translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();
        $this->translator->expects($this->any())->method("trans")->willReturnCallback(DefaultTestCase::getTranslatorTransFunction());
    }

    /**
     * Test onInteractiveLogin()
     *
     * @return void
     */
    public function testOnInteractiveLogin(): void {

        // Set a User mock.
        $user = $this->getMockBuilder(UserInterface::class)->getMock();

        // Set a Token mock.
        $token = $this->getMockBuilder(TokenInterface::class)->getMock();
        $token->expects($this->any())->method("getUser")->willReturn($user);

        // Set a Flash bag mock.
        $flashBag = $this->getMockBuilder(FlashBagInterface::class)->getMock();

        // Set a Session mock.
        $session = $this->getMockBuilder(Session::class)->getMock();
        $session->expects($this->any())->method("getFlashBag")->willReturn($flashBag);

        // Set a Request mock.
        $request = $this->getMockBuilder(Request::class)->getMock();
        $request->expects($this->any())->method("getSession")->willReturn($session);

        // Set an Interactive login event mock.
        $event = new InteractiveLoginEvent($request, $token);

        $obj = new SecurityEventListener($this->translator);

        $this->assertSame($event, $obj->onInteractiveLogin($event));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.event_listener.security", SecurityEventListener::SERVICE_NAME);

        $obj = new SecurityEventListener($this->translator);

        $this->assertInstanceOf(SecurityEventListenerInterface::class, $obj);

        $this->assertSame($this->translator, $obj->getTranslator());
    }
}
