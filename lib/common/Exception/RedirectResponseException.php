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

namespace WBW\Bundle\CommonBundle\Exception;

use WBW\Library\Common\Traits\Strings\StringOriginUrlTrait;
use WBW\Library\Common\Traits\Strings\StringRedirectUrlTrait;

/**
 * Redirect response exception.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Exception
 */
class RedirectResponseException extends AbstractException {

    use StringOriginUrlTrait;
    use StringRedirectUrlTrait;

    /**
     * Constructor.
     *
     * @param string $redirectUrl The redirect.
     * @param string|null $originUrl The route.
     */
    public function __construct(string $redirectUrl, ?string $originUrl) {

        $format  = 'You\'re not allowed to access to "%s"';
        $message = sprintf($format, $originUrl);

        parent::__construct($message, 403);

        $this->setOriginUrl($originUrl);
        $this->setRedirectUrl($redirectUrl);
    }
}
