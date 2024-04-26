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

namespace WBW\Bundle\CommonBundle\Provider\Layout;

/**
 * Navigation layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
trait NavigationLayoutProviderTrait {

    /**
     * Navigation layout provider.
     *
     * @var NavigationLayoutProviderInterface|null
     */
    private $navigationLayoutProvider;

    /**
     * Get the navigation layout provider.
     *
     * @return NavigationLayoutProviderInterface|null Returns the navigation layout provider.
     */
    public function getNavigationLayoutProvider(): ?NavigationLayoutProviderInterface {
        return $this->navigationLayoutProvider;
    }

    /**
     * Set the navigation layout provider.
     *
     * @param NavigationLayoutProviderInterface|null $navigationLayoutProvider The navigation layout provider.
     * @return self Returns this instance.
     */
    protected function setNavigationLayoutProvider(?NavigationLayoutProviderInterface $navigationLayoutProvider): self {
        $this->navigationLayoutProvider = $navigationLayoutProvider;
        return $this;
    }
}
