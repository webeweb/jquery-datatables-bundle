<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component;

use WBW\Bundle\BootstrapBundle\Component\AbstractBadge;
use WBW\Bundle\BootstrapBundle\Component\BadgeInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component\TestAbstractBadge;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;
use WBW\Library\Symfony\Assets\BadgeInterface as BaseBadgeInterface;

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

        $res = [
            BaseBadgeInterface::BADGE_TYPE_DANGER,
            BadgeInterface::BADGE_TYPE_DARK,
            BaseBadgeInterface::BADGE_TYPE_INFO,
            BadgeInterface::BADGE_TYPE_LIGHT,
            BadgeInterface::BADGE_TYPE_PRIMARY,
            BadgeInterface::BADGE_TYPE_SECONDARY,
            BaseBadgeInterface::BADGE_TYPE_SUCCESS,
            BaseBadgeInterface::BADGE_TYPE_WARNING,
        ];
        $this->assertEquals($res, AbstractBadge::enumTypes());
    }

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        // Set the expected data.
        $data = file_get_contents(__DIR__ . "/../Fixtures/Component/AbstractBadgeTest.testJsonSerialize.json");
        $json = json_decode($data, true);

        $obj = new TestAbstractBadge("test");
        $obj->setContent(BaseSerializerKeys::CONTENT);
        $obj->setPill(true);

        $res = $obj->jsonSerialize();
        $this->assertCount(4, $res);

        $this->assertEquals($json, $res);
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

        $this->assertInstanceOf(BadgeInterface::class, $obj);

        $this->assertNull($obj->getContent());
        $this->assertEquals("test", $obj->getType());

        $this->assertNull($obj->getPill());
        $this->assertEquals("badge-", $obj->getPrefix());
    }

}
