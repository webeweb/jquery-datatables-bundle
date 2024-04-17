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
use Doctrine\ORM\Tools\SchemaTool;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;
use Throwable;

/**
 * Default web test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests
 * @abstract
 */
abstract class DefaultWebTestCase extends AbstractWebTestCase {

    /**
     * Client.
     *
     * @var MockObject|KernelBrowser|null
     */
    protected $client;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Client mock.
        $this->client = static::createClient();
    }

    /**
     * Set up a cookie.
     *
     * @param UserInterface|string $user The user.
     * @param string[] $userRoles The user roles.
     * @param string $firewallName The firewall name.
     * @param string $firewallContext The firewall context.
     * @return Cookie Returns the cookie.
     */
    protected function setUpCookie($user = "webeweb", array $userRoles = ["ROLE_SUPER_ADMIN"], string $firewallName = "main", string $firewallContext = "main"): Cookie {

        $token = new UsernamePasswordToken($user, null, $firewallName, $userRoles);

        /** @var SessionInterface $session */
        $session = static::$kernel->getContainer()->get("session");
        $session->set("_security_" . $firewallContext, serialize($token));
        $session->save();

        return new Cookie($session->getName(), $session->getId());
    }

    /**
     * Set up the schema tool.
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected static function setUpSchemaTool(): void {

        /** @var EntityManagerInterface $em */
        $em = static::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        $entities = $em->getMetadataFactory()->getAllMetadata();

        $schemaTool = new SchemaTool($em);
        $schemaTool->dropDatabase();
        $schemaTool->createSchema($entities);
    }
}
