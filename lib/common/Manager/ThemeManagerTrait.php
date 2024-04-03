<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Manager;

/**
 * Theme manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
trait ThemeManagerTrait {

    /**
     * Theme manager.
     *
     * @var ThemeManager|null
     */
    private $themeManager;

    /**
     * Get the theme manager.
     *
     * @return ThemeManager|null Returns the theme manager.
     */
    public function getThemeManager(): ?ThemeManager {
        return $this->themeManager;
    }

    /**
     * Set the theme manager.
     *
     * @param ThemeManager|null $themeManager The theme manager.
     * @return self Returns this instance.
     */
    protected function setThemeManager(?ThemeManager $themeManager): self {
        $this->themeManager = $themeManager;
        return $this;
    }
}
