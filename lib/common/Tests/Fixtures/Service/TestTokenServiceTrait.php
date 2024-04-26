<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Service;

use WBW\Bundle\CommonBundle\Service\TokenServiceTrait;

/**
 * Test token service trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Service
 */
class TestTokenServiceTrait {

    use TokenServiceTrait {
        setTokenService as public;
    }
}
