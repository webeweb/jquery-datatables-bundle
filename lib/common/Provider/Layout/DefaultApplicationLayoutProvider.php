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
 * Default application layout provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
class DefaultApplicationLayoutProvider implements ApplicationLayoutProviderInterface {

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): ?string {
        return "Common bundle";
    }

    /**
     * {@inheritDoc}
     */
    public function getHome(): ?string {
        return "/";
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string {
        return "Common<b>bundle</b>";
    }

    /**
     * {@inheritDoc}
     */
    public function getRoute(): ?string {
        return "/";
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle(): ?string {
        return "Common bundle";
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion(): ?string {
        return "dev-master";
    }

    /**
     * {@inheritDoc}
     */
    public function getYear(string $startYear = null): ?string {

        $today = date("Y");
        $years = ["2018"];

        if (0 < intval($startYear)) {
            if (intval($startYear) <= intval($today)) {
                $years = [$startYear];
            } else {
                $years = [$today];
            }
        }

        if ($years[0] !== $today) {
            $years[] = $today;
        }

        return implode("-", $years);
    }
}
