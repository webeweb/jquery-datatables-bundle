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

namespace WBW\Bundle\CommonBundle\Security\Core\User;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Security\Core\User
 */
class UserHelper {

    /**
     * Get the identifier.
     *
     * @param UserInterface $user The user.
     * @return string|null Returns the identifier.
     */
    public static function getIdentifier(UserInterface $user): ?string {

        // TODO: Remove when dropping support for Symfony 5
        if (Kernel::MAJOR_VERSION < 6) {
            return $user->getUsername();
        }

        return $user->getUserIdentifier();
    }

    /**
     * Determine if the connected user entity has roles.
     *
     * @param UserInterface|null $user The user.
     * @param array<mixed>|string|null $roles The role or roles.
     * @param bool $or OR ? If true, matches a role cause a break and the method returns true.
     * @return bool Returns true in case of success, false otherwise.
     */
    public static function hasRoles(?UserInterface $user, $roles, bool $or = true): bool {

        if (null === $user || null === $roles) {
            return false;
        }

        if (true === is_string($roles)) {
            $roles = [$roles];
        }

        $result = 1 <= count($roles);

        foreach ($roles as $role) {

            $buffer = in_array($role, $user->getRoles());

            if (true === $buffer && true === $or) {
                return true;
            }

            $result = $result && $buffer;
        }

        return $result;
    }
}
