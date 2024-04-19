<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Component\AbstractBadge;
use WBW\Bundle\BootstrapBundle\Component\BadgeInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component\TestAbstractBadge;
use WBW\Bundle\WidgetBundle\Component\BadgeInterface as BaseBadgeInterface;

/**
 * Abstract badge test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component
 */
class AbstractBadgeTest extends AbstractTestCase {

    /**
     * Test enumTypes()
     *
     * @return void
     */
    public function testEnumTypes(): void {

        $exp = [
            BaseBadgeInterface::BADGE_TYPE_DANGER,
            BadgeInterface::BADGE_TYPE_DARK,
            BaseBadgeInterface::BADGE_TYPE_INFO,
            BadgeInterface::BADGE_TYPE_LIGHT,
            BadgeInterface::BADGE_TYPE_PRIMARY,
            BadgeInterface::BADGE_TYPE_SECONDARY,
            BaseBadgeInterface::BADGE_TYPE_SUCCESS,
            BaseBadgeInterface::BADGE_TYPE_WARNING,
        ];

        $this->assertEquals($exp, AbstractBadge::enumTypes());
    }

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new TestAbstractBadge("test");

        $this->assertIsArray($obj->jsonSerialize());
    }

    /**
     * Test setPill()
     *
     * @return void
     */
    public function testSetPill(): void {

        $obj = new TestAbstractBadge("test");

        $obj->setPill(true);
        $this->assertTrue($obj->getPill());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestAbstractBadge("test");

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(BadgeInterface::class, $obj);

        $this->assertNull($obj->getContent());
        $this->assertEquals("test", $obj->getType());

        $this->assertNull($obj->getPill());
        $this->assertEquals("badge-", $obj->getPrefix());
    }
}
