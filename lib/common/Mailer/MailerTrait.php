<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Mailer;

use Symfony\Component\Mailer\MailerInterface;

/**
 * Mailer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Mailer
 */
trait MailerTrait {

    /**
     * Mailer.
     *
     * @var MailerInterface|null
     */
    private $mailer;

    /**
     * Get the mailer.
     *
     * @return MailerInterface|null Returns the mailer.
     */
    public function getMailer(): ?MailerInterface {
        return $this->mailer;
    }

    /**
     * Set the mailer.
     *
     * @param MailerInterface|null $mailer The mailer.
     * @return self Returns this instance.
     */
    protected function setMailer(?MailerInterface $mailer): self {
        $this->mailer = $mailer;
        return $this;
    }
}
