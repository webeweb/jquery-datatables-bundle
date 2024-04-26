<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\LayoutProviderInterface;

/**
 * User info layout provider interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
interface UserInfoLayoutProviderInterface extends LayoutProviderInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.provider.layout.user_info";

    /**
     * Provide a register link.
     *
     * @return bool|null Returns true in case of success, false otherwise.
     */
    public function provideRegisterLink(): ?bool;

    /**
     * Provide a resetting link.
     *
     * @return bool|null Returns true in case of success, false otherwise.
     */
    public function provideResettingLink(): ?bool;
}
