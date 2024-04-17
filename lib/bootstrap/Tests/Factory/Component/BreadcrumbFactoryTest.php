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

namespace WBW\Bundle\BootstrapBundle\Tests\Factory\Component;

use WBW\Bundle\BootstrapBundle\Factory\Component\BreadcrumbFactory;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Assets\Navigation\BreadcrumbNode;
use WBW\Library\Symfony\Assets\NavigationNodeInterface;

/**
 * Breadcrumb factory test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Factory\Component
 */
class BreadcrumbFactoryTest extends AbstractTestCase {

    /**
     * Test newBreadcrumbItemsFOSUserWithFontAwesome()
     *
     * @return void
     */
    public function testNewBreadcrumbItemsFOSUserWithFontAwesome(): void {

        $res = BreadcrumbFactory::newBreadcrumbItemsFOSUserWithFontAwesome();
        $this->assertCount(3, $res);

        $this->assertInstanceOf(BreadcrumbNode::class, $res[0]);
        $this->assertEquals("label.edit_profile", $res[0]->getLabel());
        $this->assertEquals("fa:user", $res[0]->getIcon());
        $this->assertEquals("fos_user_profile_edit", $res[0]->getUri());
        $this->assertEquals(NavigationNodeInterface::MATCHER_ROUTER, $res[0]->getMatcher());

        $this->assertInstanceOf(BreadcrumbNode::class, $res[1]);
        $this->assertEquals("label.show_profile", $res[1]->getLabel());
        $this->assertEquals("fa:user", $res[1]->getIcon());
        $this->assertEquals("fos_user_profile_show", $res[1]->getUri());
        $this->assertEquals(NavigationNodeInterface::MATCHER_ROUTER, $res[1]->getMatcher());

        $this->assertInstanceOf(BreadcrumbNode::class, $res[2]);
        $this->assertEquals("label.change_password", $res[2]->getLabel());
        $this->assertEquals("fa:lock", $res[2]->getIcon());
        $this->assertEquals("fos_user_change_password", $res[2]->getUri());
        $this->assertEquals(NavigationNodeInterface::MATCHER_ROUTER, $res[2]->getMatcher());
    }

    /**
     * Test newBreadcrumbItemsFOSUserWithMaterialDesignIconicFont()
     *
     * @return void
     */
    public function testNewBreadcrumbItemsFOSUserWithMaterialDesignIconicFont(): void {

        $res = BreadcrumbFactory::newBreadcrumbItemsFOSUserWithMaterialDesignIconicFont();
        $this->assertCount(3, $res);

        $this->assertInstanceOf(BreadcrumbNode::class, $res[0]);
        $this->assertEquals("label.edit_profile", $res[0]->getLabel());
        $this->assertEquals("zmdi:account", $res[0]->getIcon());
        $this->assertEquals("fos_user_profile_edit", $res[0]->getUri());
        $this->assertEquals(NavigationNodeInterface::MATCHER_ROUTER, $res[0]->getMatcher());

        $this->assertInstanceOf(BreadcrumbNode::class, $res[1]);
        $this->assertEquals("label.show_profile", $res[1]->getLabel());
        $this->assertEquals("zmdi:account", $res[1]->getIcon());
        $this->assertEquals("fos_user_profile_show", $res[1]->getUri());
        $this->assertEquals(NavigationNodeInterface::MATCHER_ROUTER, $res[1]->getMatcher());

        $this->assertInstanceOf(BreadcrumbNode::class, $res[2]);
        $this->assertEquals("label.change_password", $res[2]->getLabel());
        $this->assertEquals("zmdi:lock", $res[2]->getIcon());
        $this->assertEquals("fos_user_change_password", $res[2]->getUri());
        $this->assertEquals(NavigationNodeInterface::MATCHER_ROUTER, $res[2]->getMatcher());
    }

    /**
     * Test newBreadcrumbItemsFOSUserWithGlyphicon()
     *
     * @return void
     */
    public function testNewGlyphiconBreadcrumbNodes(): void {

        $res = BreadcrumbFactory::newBreadcrumbItemsFOSUserWithGlyphicon();
        $this->assertCount(3, $res);

        $this->assertInstanceOf(BreadcrumbNode::class, $res[0]);
        $this->assertEquals("label.edit_profile", $res[0]->getLabel());
        $this->assertEquals("g:user", $res[0]->getIcon());
        $this->assertEquals("fos_user_profile_edit", $res[0]->getUri());
        $this->assertEquals(NavigationNodeInterface::MATCHER_ROUTER, $res[0]->getMatcher());

        $this->assertInstanceOf(BreadcrumbNode::class, $res[1]);
        $this->assertEquals("label.show_profile", $res[1]->getLabel());
        $this->assertEquals("g:user", $res[1]->getIcon());
        $this->assertEquals("fos_user_profile_show", $res[1]->getUri());
        $this->assertEquals(NavigationNodeInterface::MATCHER_ROUTER, $res[1]->getMatcher());

        $this->assertInstanceOf(BreadcrumbNode::class, $res[2]);
        $this->assertEquals("label.change_password", $res[2]->getLabel());
        $this->assertEquals("g:lock", $res[2]->getIcon());
        $this->assertEquals("fos_user_change_password", $res[2]->getUri());
        $this->assertEquals(NavigationNodeInterface::MATCHER_ROUTER, $res[2]->getMatcher());
    }
}
