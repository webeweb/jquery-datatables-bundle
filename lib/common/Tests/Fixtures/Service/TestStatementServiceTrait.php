<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Service;

use WBW\Bundle\CommonBundle\Service\StatementServiceTrait;

/**
 * Test statement service trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Service
 */
class TestStatementServiceTrait {

    use StatementServiceTrait {
        setStatementService as public;
    }
}
