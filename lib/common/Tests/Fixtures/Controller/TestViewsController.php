<?php

/*
 * This file is part of the core-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Controller;

use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\CommonBundle\Controller\AbstractController;

/**
 * Test views controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Controller
 */
class TestViewsController extends AbstractController {

    /**
     * Render lib/common/Resources/views/assets/_javascripts.html.twig
     *
     * @return Response Returns the response.
     */
    public function assetsJavascriptsAction(): Response {
        return $this->render("@WBWCommon/assets/_javascripts.html.twig");
    }

    /**
     * Render lib/common/Resources/views/assets/_stylesheets.html.twig
     *
     * @return Response Returns the response.
     */
    public function assetsStylesheetsAction(): Response {
        return $this->render("@WBWCommon/assets/_stylesheets.html.twig");
    }
}
