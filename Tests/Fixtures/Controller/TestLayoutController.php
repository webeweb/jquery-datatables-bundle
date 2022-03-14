<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Controller;

use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\CoreBundle\Controller\AbstractController;

/**
 * Test layout controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Controller
 */
class TestLayoutController extends AbstractController {

    /**
     * Displays a javascripts template.
     *
     * @return Response Returns the response.
     */
    public function javascriptsAction(): Response {
        return $this->render("@WBWJQueryDataTables/assets/_javascripts.html.twig");
    }

    /**
     * Displays a stylesheets template.
     *
     * @return Response Returns the response.
     */
    public function stylesheetsAction(): Response {
        return $this->render("@WBWJQueryDataTables/assets/_stylesheets.html.twig");
    }
}
