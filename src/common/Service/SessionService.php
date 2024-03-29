<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2023 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Service;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Kernel;
use WBW\Bundle\CommonBundle\DependencyInjection\Container\ContainerTrait;

/**
 * Symfony backward compatibility service.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Service
 */
class SessionService implements SessionServiceInterface {

    use ContainerTrait;

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.common.service.session";

    /**
     * Constructor.
     *
     * @param ContainerInterface $container The container.
     */
    public function __construct(ContainerInterface $container) {
        $this->setContainer($container);
    }

    /**
     * {@inheritDoc}
     */
    public function getSession(): ?SessionInterface {

        // TODO: Remove when dropping support for Symfony 5.3
        if (Kernel::VERSION_ID < 50300) {
            return $this->getContainer()->get("session");
        }

        return $this->getContainer()->get("request_stack")->getSession();
    }
}
