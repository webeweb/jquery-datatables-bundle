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

namespace WBW\Bundle\CommonBundle\Tests;

use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Contracts\EventDispatcher\Event;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;
use Twig\Loader\LoaderInterface;

/**
 * Default test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests
 * @abstract
 */
abstract class DefaultTestCase extends TestCase {

    /**
     * Container builder.
     *
     * @var ContainerBuilder|null
     */
    protected $containerBuilder;

    /**
     * CSRF token manager.
     *
     * @var MockObject|CsrfTokenManagerInterface|null
     */
    protected $csrfTokenManager;

    /**
     * Encoder factory.
     *
     * @var MockObject|EncoderFactoryInterface|null
     */
    protected $encoderFactory;

    /**
     * Entity manager.
     *
     * @var MockObject|EntityManagerInterface|null
     */
    protected $entityManager;

    /**
     * Event dispatcher.
     *
     * @var EventDispatcherInterface|null
     */
    protected $eventDispatcher;

    /**
     * Flash bag.
     *
     * @var MockObject|FlashBagInterface|null
     */
    protected $flashBag;

    /**
     * Form factory.
     *
     * @var MockObject|FormFactoryInterface|null
     */
    protected $formFactory;

    /**
     * Kernel.
     *
     * @var MockObject|KernelInterface|null
     */
    protected $kernel;

    /**
     * Logger.
     *
     * @var MockObject|LoggerInterface|null
     */
    protected $logger;

    /**
     * Mailer.
     *
     * @var MockObject|MailerInterface|null
     */
    protected $mailer;

    /**
     * Request stack.
     *
     * @var MockObject|RequestStack|null
     */
    protected $requestStack;

    /**
     * Router.
     *
     * @var MockObject|RouterInterface|null
     */
    protected $router;

    /**
     * Session.
     *
     * @var MockObject|SessionInterface|null
     */
    protected $session;

    /**
     * Session bag.
     *
     * @var MockObject|SessionBagInterface|null
     */
    protected $sessionBag;

    /**
     * Token
     *
     * @var MockObject|TokenInterface|null
     */
    protected $token;

    /**
     * Token storage.
     *
     * @var MockObject|TokenStorageInterface|null
     */
    protected $tokenStorage;

    /**
     * Translator.
     *
     * @var MockObject|TranslatorInterface|null
     */
    protected $translator;

    /**
     * Twig environment.
     *
     * @var Environment|null
     */
    protected $twigEnvironment;

    /**
     * Twig globals.
     *
     * @var array<string,mixed>
     */
    private $twigGlobals = [];

    /**
     * Twig loader.
     *
     * @var LoaderInterface|null
     */
    protected $twigLoader;

    /**
     * User.
     *
     * @var MockObject|UserInterface|null
     */
    protected $user;

    /**
     * Get dispatch() function for an event dispatcher.
     *
     * @return callable Returns dispatch() function for an event dispatcher.
     */
    public static function getEventDispatcherDispatchFunction(): callable {

        return function(Event $event): Event {
            return $event;
        };
    }

    /**
     * Get generate() function for a router.
     *
     * @return callable Returns generate() function for a router.
     */
    public static function getRouterGenerateFunction(): callable {

        return function($name) {
            return $name;
        };
    }

    /**
     * Get a trans() function for a translator.
     *
     * @return callable Returns the trans() function for a translator.
     */
    public static function getTranslatorTransFunction(): callable {

        return function($id): ?string {
            return $id;
        };
    }

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a CSRF token manager.
        $this->csrfTokenManager = $this->getMockBuilder(CsrfTokenManagerInterface::class)->getMock();

        // Set an Encoder factory mock.
        $this->encoderFactory = $this->getMockBuilder(EncoderFactoryInterface::class)->getMock();

        // Set an Entity manager mock.
        $this->entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        // Set an Event dispatcher mock.
        $this->eventDispatcher = $this->getMockBuilder(EventDispatcherInterface::class)->getMock();

        // Set a Flash bag mock.
        $this->flashBag = $this->getMockBuilder(FlashBagInterface::class)->getMock();

        // Set a Form factory mock.
        $this->formFactory = $this->getMockBuilder(FormFactoryInterface::class)->getMock();

        // Set a Kernel mock.
        $this->kernel = $this->getMockBuilder(KernelInterface::class)->getMock();

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Mailer mock.
        $this->mailer = $this->getMockBuilder(MailerInterface::class)->getMock();

        // Set a Request stack.
        $this->requestStack = $this->getMockBuilder(RequestStack::class)->disableOriginalConstructor()->getMock();

        // Set a Router mock.
        $this->router = $this->getMockBuilder(RouterInterface::class)->getMock();

        // Set a Session mock.
        $this->session = $this->getMockBuilder(SessionInterface::class)->getMock();

        // TODO: Remove when dropping support for Symfony 5.2
        if (50300 <= Kernel::VERSION_ID) {
            $this->requestStack->expects($this->any())->method("getSession")->willReturn($this->session);
        }

        // Set a Session bag mock.
        $this->sessionBag = $this->getMockBuilder(SessionBagInterface::class)->getMock();

        // Set a Translator mock.
        $this->translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();
        $this->translator->expects($this->any())->method("trans")->willReturnCallback(static::getTranslatorTransFunction());

        // Set getUser() callback.
        $getUser = function(): ?UserInterface {
            return $this->user;
        };

        // Set a Token mock.
        $this->token = $this->getMockBuilder(TokenInterface::class)->getMock();
        $this->token->expects($this->any())->method("getUser")->willReturnCallback($getUser);

        // Set a Token storage mock.
        $this->tokenStorage = $this->getMockBuilder(TokenStorageInterface::class)->getMock();
        $this->tokenStorage->expects($this->any())->method("getToken")->willReturn($this->token);

        // Set a Twig loader mock.
        $this->twigLoader = $this->getMockBuilder(LoaderInterface::class)->getMock();

        // Set addGlobal() callback.
        $addGlobal = function(string $name, $value): void {
            $this->twigGlobals[$name] = $value;
        };

        // Set getGlobals() callback.
        $getGlobals = function(): array {
            return $this->twigGlobals;
        };

        // Set a Twig environment mock.
        $this->twigEnvironment = $this->getMockBuilder(Environment::class)->setConstructorArgs([$this->twigLoader, []])->getMock();
        $this->twigEnvironment->expects($this->any())->method("addGlobal")->willReturnCallback($addGlobal);
        $this->twigEnvironment->expects($this->any())->method("getGlobals")->willReturnCallback($getGlobals);

        // Set a Parameter bag mock.
        $parameterBag = new ParameterBag([
            "kernel.environment" => "test",
            "kernel.project_dir" => realpath(__DIR__ . "/Fixtures/app"),
        ]);

        // Set a Container builder with only the necessary.
        $this->containerBuilder = new ContainerBuilder($parameterBag);
        $this->containerBuilder->set("doctrine.orm.entity_manager", $this->entityManager);
        $this->containerBuilder->set("event_dispatcher", $this->eventDispatcher);
        $this->containerBuilder->set("form.factory", $this->formFactory);
        $this->containerBuilder->set("kernel", $this->kernel);
        $this->containerBuilder->set("logger", $this->logger);
        $this->containerBuilder->set("mailer", $this->mailer);
        $this->containerBuilder->set("router", $this->router);
        $this->containerBuilder->set("request_stack", $this->requestStack);
        $this->containerBuilder->set("session", $this->session);
        $this->containerBuilder->set("security.csrf.token_manager", $this->csrfTokenManager);
        $this->containerBuilder->set("security.encoder_factory", $this->encoderFactory);
        $this->containerBuilder->set("security.token_storage", $this->tokenStorage);
        $this->containerBuilder->set("swiftmailer.mailer", $this->mailer);
        $this->containerBuilder->set("translator", $this->translator);
        $this->containerBuilder->set("twig", $this->twigEnvironment);

        $this->containerBuilder->set("Psr\\Container\\ContainerInterface", $this->containerBuilder);
    }
}
