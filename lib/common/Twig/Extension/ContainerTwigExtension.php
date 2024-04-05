<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Environment;
use Twig\TwigFunction;
use WBW\Bundle\CommonBundle\DependencyInjection\Container\ContainerTrait;

/**
 * Container Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Twig\Extension
 */
class ContainerTwigExtension extends AbstractTwigExtension {

    use ContainerTrait;

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.twig.extension.container";

    /**
     * Constructor.
     *
     * @param Environment $twigEnvironment The Twig environment.
     * @param ContainerInterface $container The container.
     */
    public function __construct(Environment $twigEnvironment, ContainerInterface $container) {
        parent::__construct($twigEnvironment);

        $this->setContainer($container);
    }

    /**
     * Get a container parameter.
     *
     * @param string $name The name.
     * @return mixed Returns the container parameter in case of success, null otherwise.
     */
    public function getContainerParameterFunction(string $name) {
        return $this->getContainer()->getParameter($name);
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("getContainerParameter", [$this, "getContainerParameterFunction"]),
            new TwigFunction("phpNativeMethod", [$this, "phpNativeMethodFunction"]),
            new TwigFunction("phpStaticMethod", [$this, "phpStaticMethodFunction"]),
        ];
    }

    /**
     * Call a PHP native function.
     *
     * @param string|null $function The function.
     * @param mixed[] $arguments The arguments.
     * @return mixed|null Returns the PHP native method result.
     */
    public function phpNativeMethodFunction(?string $function, array $arguments = []) {

        if (null === $function || false === function_exists($function)) {
            return null;
        }

        return call_user_func_array($function, $arguments);
    }

    /**
     * Call a PHP static method.
     *
     * @param string|null $classname The classname.
     * @param string|null $method The method.
     * @param mixed[] $arguments The arguments.
     * @return mixed|null Returns the PHP static method result.
     */
    public function phpStaticMethodFunction(?string $classname, ?string $method, array $arguments = []) {

        if (null === $classname || null === $method || false === method_exists($classname, $method)) {
            return null;
        }

        return call_user_func_array("$classname::$method", $arguments);
    }
}
