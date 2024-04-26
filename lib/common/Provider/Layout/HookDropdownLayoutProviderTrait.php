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
 * Hook dropdown layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
trait HookDropdownLayoutProviderTrait {

    /**
     * Hook dropdown layout provider.
     *
     * @var HookDropdownLayoutProviderInterface|null
     */
    private $hookDropdownLayoutProvider;

    /**
     * Get the hook dropdown layout provider.
     *
     * @return HookDropdownLayoutProviderInterface|null Returns the hook dropdown layout provider.
     */
    public function getHookDropdownLayoutProvider(): ?HookDropdownLayoutProviderInterface {
        return $this->hookDropdownLayoutProvider;
    }

    /**
     * Set the hook dropdown layout provider.
     *
     * @param HookDropdownLayoutProviderInterface|null $hookDropdownLayoutProvider The hook dropdown layout provider.
     * @return self Returns this instance.
     */
    protected function setHookDropdownLayoutProvider(?HookDropdownLayoutProviderInterface $hookDropdownLayoutProvider): self {
        $this->hookDropdownLayoutProvider = $hookDropdownLayoutProvider;
        return $this;
    }
}
