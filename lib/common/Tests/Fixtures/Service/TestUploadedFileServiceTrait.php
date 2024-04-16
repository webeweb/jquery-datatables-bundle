<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-library package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Service;

use WBW\Bundle\CommonBundle\Service\UploadedFileServiceTrait;

/**
 * Test uploaded file service trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Service
 */
class TestUploadedFileServiceTrait {

    use UploadedFileServiceTrait {
        setUploadedFileService as public;
    }
}
