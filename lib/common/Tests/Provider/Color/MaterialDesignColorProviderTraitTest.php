<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Provider\Color;

use WBW\Bundle\CommonBundle\Provider\Color\MaterialDesignColorProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Color\TestMaterialDesignColorProviderTrait;

/**
 * Material Design color provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Color
 */
class MaterialDesignColorProviderTraitTest extends AbstractTestCase {

    /**
     * Test setMaterialDesignColorProvider()
     *
     * @return void
     */
    public function testSetMaterialDesignColorProvider(): void {

        // Set a Material Design color provider mock.
        $materialDesignColorProvider = $this->getMockBuilder(MaterialDesignColorProviderInterface::class)->getMock();

        $obj = new TestMaterialDesignColorProviderTrait();

        $obj->setMaterialDesignColorProvider($materialDesignColorProvider);
        $this->assertSame($materialDesignColorProvider, $obj->getMaterialDesignColorProvider());
    }
}
