<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Provider\Layout;

/**
 * Footer layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
trait FooterLayoutProviderTrait {

    /**
     * Footer layout provider.
     *
     * @var FooterLayoutProviderInterface|null
     */
    private $footerLayoutProvider;

    /**
     * Get the footer layout provider.
     *
     * @return FooterLayoutProviderInterface|null Returns the footer layout provider.
     */
    public function getFooterLayoutProvider(): ?FooterLayoutProviderInterface {
        return $this->footerLayoutProvider;
    }

    /**
     * Set the footer layout provider.
     *
     * @param FooterLayoutProviderInterface|null $footerLayoutProvider The footer layout provider.
     * @return self Returns this instance.
     */
    protected function setFooterLayoutProvider(?FooterLayoutProviderInterface $footerLayoutProvider): self {
        $this->footerLayoutProvider = $footerLayoutProvider;
        return $this;
    }
}
