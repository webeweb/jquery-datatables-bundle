<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Twig\Extension;

/**
 * Container Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Twig\Extension
 */
trait ContainerTwigExtensionTrait {

    /**
     * Container Twig extension.
     *
     * @var ContainerTwigExtension|null
     */
    private $containerTwigExtension;

    /**
     * Get the container Twig extension.
     *
     * @return ContainerTwigExtension|null Returns the container Twig extension.
     */
    public function getContainerTwigExtension(): ?ContainerTwigExtension {
        return $this->containerTwigExtension;
    }

    /**
     * Set the container Twig extension.
     *
     * @param ContainerTwigExtension|null $containerTwigExtension The container Twig extension.
     * @return self Returns this instance.
     */
    protected function setContainerTwigExtension(?ContainerTwigExtension $containerTwigExtension): self {
        $this->containerTwigExtension = $containerTwigExtension;
        return $this;
    }
}
