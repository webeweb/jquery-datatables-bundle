<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Provider;

/**
 * Layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider
 */
trait LayoutProviderTrait {

    /**
     * Layout provider.
     *
     * @var LayoutProviderInterface|null
     */
    protected $layoutProvider;

    /**
     * Get the layout provider.
     *
     * @return LayoutProviderInterface|null Returns the layout provider.
     */
    public function getLayoutProvider(): ?LayoutProviderInterface {
        return $this->layoutProvider;
    }

    /**
     * Set the layout provider.
     *
     * @param LayoutProviderInterface|null $layoutProvider The layout provider.
     * @return self Returns this instance.
     */
    protected function setLayoutProvider(?LayoutProviderInterface $layoutProvider): self {
        $this->layoutProvider = $layoutProvider;
        return $this;
    }
}
