<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Symfony\Mailer;

use Symfony\Component\Mailer\MailerInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\Mailer\TestMailerTrait;

/**
 * Mailer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Symfony\Mailer
 */
class MailerTraitTest extends AbstractTestCase {

    /**
     * Test setMailer()
     *
     * @return void
     */
    public function testSetMailer(): void {

        // Set a Mailer mock.
        $mailer = $this->getMockBuilder(MailerInterface::class)->getMock();

        $obj = new TestMailerTrait();

        $obj->setMailer($mailer);
        $this->assertSame($mailer, $obj->getMailer());
    }
}
