<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Form\DataTransformer;

use WBW\Bundle\CommonBundle\Form\DataTransformer\AbstractEntityDataTransformer;
use WBW\Bundle\CommonBundle\Model\User;

/**
 * Test abstract entity data transformer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Form\DataTransformer
 */
class TestAbstractEntityDataTransformer extends AbstractEntityDataTransformer {

    /**
     * {@inheritDoc}
     */
    public function getEntityClass(): string {
        return User::class;
    }
}
