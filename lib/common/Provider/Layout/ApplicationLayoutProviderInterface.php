<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\LayoutProviderInterface;

/**
 * Application layout provider interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
interface ApplicationLayoutProviderInterface extends LayoutProviderInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.provider.layout.application";

    /**
     * Get the description.
     *
     * @return string|null Returns the description.
     */
    public function getDescription(): ?string;

    /**
     * Get the home.
     *
     * @return string Returns the home.
     */
    public function getHome(): ?string;

    /**
     * Get the name.
     *
     * @return string|null Returns the name.
     */
    public function getName(): ?string;

    /**
     * Get the route.
     *
     * @return string|null Returns the route.
     */
    public function getRoute(): ?string;

    /**
     * Get the title.
     *
     * @return string|null Returns the title.
     */
    public function getTitle(): ?string;

    /**
     * Get the version.
     *
     * @return string|null Returns the version.
     */
    public function getVersion(): ?string;

    /**
     * Get the year.
     *
     * @param string|null $startYear The start year.
     * @return string|null Returns the year.
     */
    public function getYear(string $startYear = null): ?string;
}
