<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Helper\Component;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\CommonBundle\Helper\Component\NavigationHelper;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Component\Navigation\DividerNode;
use WBW\Library\Widget\Component\Navigation\HeaderNode;
use WBW\Library\Widget\Component\Navigation\NavigationNode;
use WBW\Library\Widget\Component\Navigation\NavigationTree;
use WBW\Library\Widget\Component\NavigationNodeInterface;

/**
 * Navigation helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Helper\Component
 */
class NavigationHelperTest extends AbstractTestCase {

    /**
     * Navigation tree.
     *
     * @var NavigationTree|null
     */
    private $navigationTree;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Navigation tree mock.
        $this->navigationTree = new NavigationTree("tree");

        $this->navigationTree->addNode(new NavigationNode("GitHub", null, NavigationNodeInterface::DEFAULT_HREF));

        $this->navigationTree->getLastNode()->addNode(new HeaderNode("GitHub"));
        $this->navigationTree->getLastNode()->addNode(new DividerNode("Bundles"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("AdminBSB Material Design bundle", null, "https://github.com/webeweb/adminbsb-material-design-bundle"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("Bootstrap bundle", null, "https://github.com/webeweb/bootstrap-bundle"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("Core bundle", null, "https://github.com/webeweb/core-bundle"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("EDM bundle", null, "https://github.com/webeweb/edm-bundle"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("HaveIBeenPwnd bundle", null, "https://github.com/webeweb/haveibeenpwned-bundle"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("Highcharts bundle", null, "https://github.com/webeweb/highcharts-bundle"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("jQuery DataTables bundle", null, "https://github.com/webeweb/jquery-datatables-bundle"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("jQuery QueryBuilder bundle", null, "https://github.com/webeweb/jquery-querybuilder-bundle"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("OpenData bundle", null, "https://github.com/webeweb/opendata-bundle"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("SyntaxHighlighter bundle", null, "https://github.com/webeweb/syntaxhighlighter-bundle"));
        $this->navigationTree->getLastNode()->addNode(new DividerNode("Libraries"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("Chart accounts library", null, "https://github.com/webeweb/chart-accounts-library"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("Core library", null, "https://github.com/webeweb/core-library"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("cURL library", null, "https://github.com/webeweb/curl-library"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("FTP library", null, "https://github.com/webeweb/ftp-library"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("fPDF library", null, "https://github.com/webeweb/fpdf-library"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("HaveIBeenPwnd library", null, "https://github.com/webeweb/haveibeenpwned-library"));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("SkiData library", null, "https:\/\/github\.com\/webeweb\/skidata-library", NavigationNodeInterface::MATCHER_REGEXP));
        $this->navigationTree->getLastNode()->addNode(new NavigationNode("sMsmode library", null, "https://github.com/webeweb/smsmode-library", NavigationNodeInterface::MATCHER_ROUTER));
    }

    /**
     * Test activeTree()
     *
     * @return void
     */
    public function testActiveTree(): void {

        NavigationHelper::activeTree($this->navigationTree, Request::create("https://github.com/webeweb/core-bundle"));

        $this->assertTrue($this->navigationTree->getNodeAt(0)->getActive());

        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(0)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(1)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(2)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(3)->getActive());
        $this->assertTrue($this->navigationTree->getNodeAt(0)->getNodeAt(4)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(5)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(6)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(7)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(8)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(9)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(10)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(11)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(12)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(13)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(14)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(15)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(16)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(17)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(18)->getActive());
        $this->assertFalse($this->navigationTree->getNodeAt(0)->getNodeAt(19)->getActive());
    }

    /**
     * Test getBreadcrumbs()
     *
     * @return void
     */
    public function testGetBreadcrumbs(): void {

        NavigationHelper::activeTree($this->navigationTree, Request::create("https://github.com/webeweb/core-bundle"));

        $res = NavigationHelper::getBreadcrumbs($this->navigationTree);
        $this->assertCount(2, $res);

        $this->assertEquals("GitHub", $res[0]->getLabel());
        $this->assertEquals("Core bundle", $res[1]->getLabel());
    }
}
