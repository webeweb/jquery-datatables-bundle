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

namespace WBW\Bundle\CommonBundle\DependencyInjection\Container;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Container trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\DependencyInjection\Container
 */
trait ContainerTrait {

    /**
     * Container.
     *
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * Get the container.
     *
     * @return ContainerInterface|null Returns the container.
     */
    public function getContainer(): ?ContainerInterface {
        return $this->container;
    }

    /**
     * Set the container.
     *
     * @param ContainerInterface|null $container The container.
     * @return self Returns this instance.
     */
    protected function setContainer(?ContainerInterface $container): self {
        $this->container = $container;
        return $this;
    }
}
