<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2023 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;
use WBW\Library\Traits\Integers\IntegerIdTrait;
use WBW\Library\Traits\Strings\ArrayRolesTrait;
use WBW\Library\Traits\Strings\StringPasswordTrait;
use WBW\Library\Traits\Strings\StringSaltTrait;
use WBW\Library\Traits\Strings\StringUsernameTrait;

/**
 * User.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Model
 */
class User implements UserInterface {

    use ArrayRolesTrait;
    use IntegerIdTrait;
    use StringSaltTrait;
    use StringPasswordTrait;
    use StringUsernameTrait;

    /**
     * Constructor.
     *
     * @param string|null $username The username.
     * @param string|null $password The password.
     * @param array<mixed> $roles The roles.
     */
    public function __construct(?string $username = null, ?string $password = null, array $roles = []) {
        $this->setPassword($password);
        $this->setRoles($roles);
        $this->setUsername($username);
    }

    /**
     * {@inheritDoc}
     */
    public function eraseCredentials(): void {
        // NOTHING TO DO
    }

    /**
     * {@inheritDoc}
     */
    public function getUserIdentifier(): string {
        return $this->username;
    }
}
