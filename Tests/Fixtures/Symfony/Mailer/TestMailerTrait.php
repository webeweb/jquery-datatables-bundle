<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\Mailer;

use WBW\Bundle\DataTablesBundle\Symfony\Mailer\MailerTrait;

/**
 * Test mailer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\Mailer
 */
class TestMailerTrait {

    use MailerTrait {
        setMailer as public;
    }
}
