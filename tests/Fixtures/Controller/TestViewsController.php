<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Controller;

use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\CommonBundle\Controller\AbstractController;

/**
 * Test views controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Controller
 */
class TestViewsController extends AbstractController {

    /**
     * Render src/Resources/views/assets/_javascripts.html.twig
     *
     * @return Response Returns the response.
     */
    public function assetsJavascriptsAction(): Response {
        return $this->render("@WBWDataTables/assets/_javascripts.html.twig");
    }

    /**
     * Render src/Resources/views/assets/_stylesheets.html.twig
     *
     * @return Response Returns the response.
     */
    public function assetsStylesheetsAction(): Response {
        return $this->render("@WBWDataTables/assets/_stylesheets.html.twig");
    }
}
