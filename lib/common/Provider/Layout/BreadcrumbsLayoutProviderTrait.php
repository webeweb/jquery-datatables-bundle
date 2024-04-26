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
 * Breadcrumbs layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
trait BreadcrumbsLayoutProviderTrait {

    /**
     * Breadcrumbs layout provider.
     *
     * @var BreadcrumbsLayoutProviderInterface|null
     */
    private $breadcrumbsLayoutProvider;

    /**
     * Get the breadcrumbs layout provider.
     *
     * @return BreadcrumbsLayoutProviderInterface|null Returns the breadcrumbs layout provider.
     */
    public function getBreadcrumbsLayoutProvider(): ?BreadcrumbsLayoutProviderInterface {
        return $this->breadcrumbsLayoutProvider;
    }

    /**
     * Set the breadcrumbs layout provider.
     *
     * @param BreadcrumbsLayoutProviderInterface|null $breadcrumbsLayoutProvider The breadcrumbs layout provider.
     * @return self Returns this instance.
     */
    protected function setBreadcrumbsLayoutProvider(?BreadcrumbsLayoutProviderInterface $breadcrumbsLayoutProvider): self {
        $this->breadcrumbsLayoutProvider = $breadcrumbsLayoutProvider;
        return $this;
    }
}
