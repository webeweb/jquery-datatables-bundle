<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Helper\Component;

use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use WBW\Library\Widget\Component\Navigation\BreadcrumbNode;
use WBW\Library\Widget\Component\Navigation\NavigationNode;
use WBW\Library\Widget\Component\Navigation\NavigationTree;
use WBW\Library\Widget\Component\NavigationNodeInterface;

/**
 * Navigation helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Helper\Component
 */
class NavigationHelper {

    /**
     * Active the navigation nodes.
     *
     * @param Request $request The request.
     * @param NavigationNodeInterface[] $nodes The navigation nodes.
     * @param int $level The node level.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected static function activeNodes(Request $request, array $nodes = [], int $level = 0): bool {

        $result = false;

        foreach ($nodes as $n) {

            if (true === static::nodeMatch($n, $request)) {
                $current = true;
            } else {
                $current = static::activeNodes($request, $n->getNodes(), $level + 1);
            }

            if (false === $current) {
                continue;
            }

            $result = $n->setActive(true)->getActive();
        }

        return $result;
    }

    /**
     * Active a tree.
     *
     * @param NavigationTree $tree The tree.
     * @param Request $request The request.
     * @return void
     */
    public static function activeTree(NavigationTree $tree, Request $request): void {
        static::activeNodes($request, $tree->getNodes());
    }

    /**
     * Get the breadcrumbs.
     *
     * @param NavigationNodeInterface $node The navigation node.
     * @return NavigationNodeInterface[] Returns the breadcrumbs.
     */
    public static function getBreadcrumbs(NavigationNodeInterface $node): array {

        $breadcrumbs = [];

        if (true === ($node instanceof NavigationNode || $node instanceof BreadcrumbNode) && true === $node->getActive()) {
            $breadcrumbs[] = $node;
        }

        foreach ($node->getNodes() as $current) {
            $breadcrumbs = array_merge($breadcrumbs, static::getBreadcrumbs($current));
        }

        return $breadcrumbs;
    }

    /**
     * Determine if a navigation node match a URL.
     *
     * @param NavigationNodeInterface $node The navigation node.
     * @param Request $request The request.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected static function nodeMatch(NavigationNodeInterface $node, Request $request): bool {

        $result = false;

        switch ($node->getMatcher()) {

            case NavigationNodeInterface::MATCHER_REGEXP:
                $result = preg_match("/" . $node->getUri() . "/", $request->getUri());
                break;

            case NavigationNodeInterface::MATCHER_ROUTER:
                $result = $request->get("_route") === $node->getUri() || $request->get("_forwarded", new ParameterBag())->get("_route") === $node->getUri();
                break;

            case NavigationNodeInterface::MATCHER_URL:
                $result = $request->getUri() === $node->getUri() || $request->getRequestUri() === $node->getUri();
                break;
        }

        return boolval($result);
    }
}
