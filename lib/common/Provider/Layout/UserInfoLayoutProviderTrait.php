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
 * User info layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
trait UserInfoLayoutProviderTrait {

    /**
     * User info layout provider.
     *
     * @var UserInfoLayoutProviderInterface|null
     */
    private $userInfoLayoutProvider;

    /**
     * Get the user info layout provider.
     *
     * @return UserInfoLayoutProviderInterface|null Returns the user info layout provider.
     */
    public function getUserInfoLayoutProvider(): ?UserInfoLayoutProviderInterface {
        return $this->userInfoLayoutProvider;
    }

    /**
     * Set the user info layout provider.
     *
     * @param UserInfoLayoutProviderInterface|null $userInfoLayoutProvider The user info layout provider.
     * @return self Returns this instance.
     */
    protected function setUserInfoLayoutProvider(?UserInfoLayoutProviderInterface $userInfoLayoutProvider): self {
        $this->userInfoLayoutProvider = $userInfoLayoutProvider;
        return $this;
    }
}
