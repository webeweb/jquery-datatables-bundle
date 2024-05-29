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

namespace WBW\Bundle\CommonBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WBW\Bundle\CommonBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\CommonBundle\WBWCommonBundle;
use WBW\Library\Widget\Helper\AssetsHelper;

/**
 * Assets unzip command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Command
 */
class AssetsUnzipCommand extends AbstractCommand {

    /**
     * Command name.
     *
     * @var string
     */
    public const COMMAND_NAME = "wbw:common:assets:unzip";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.command.assets_unzip";

    /**
     * {@inheritDoc}
     */
    protected function configure(): void {
        $this
            ->setDescription("Unzip assets under a public directory")
            ->setHelp(static::formatHelp("unzips bundle assets into <comment>public</comment>"))
            ->setName(self::COMMAND_NAME);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());
        $this->displayHeader($io, "Trying to unzip assets");

        $rows = [];

        $bundles = $this->getKernel()->getBundles();
        foreach ($bundles as $current) {

            if (false === ($current instanceof AssetsProviderInterface)) {
                continue;
            }

            $bundlePath = $current->getPath();

            $assetsDirectory = $bundlePath . $current->getAssetsRelativeDirectory();
            $publicDirectory = $bundlePath . "/Resources/public";

            $buffer = AssetsHelper::unzipAssets($assetsDirectory, $publicDirectory);
            $rows   = array_merge($rows, $this->renderRows($current->getName(), $buffer));
        }

        $io->table($this->getHeaders(), $rows);
        $this->displayFooter($io, count($rows), "command.footer.assets_unzip.success", "command.footer.assets_unzip.warning", WBWCommonBundle::getTranslationDomain(), "en");

        return 0;
    }

    /**
     * Get the headers.
     *
     * @return string[] Returns the headers.
     */
    protected function getHeaders(): array {

        return [
            "",
            $this->translate("command.header.bundle", [], WBWCommonBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.asset", [], WBWCommonBundle::getTranslationDomain(), "en"),
        ];
    }

    /**
     * Render the rows.
     *
     * @param string $bundle The bundle.
     * @param array<string,bool> $assets The assets.
     * @return string[][] Returns the rendered rows.
     */
    protected function renderRows(string $bundle, array $assets): array {

        $rows = [];

        $success = static::formatCheckbox(true);
        $warning = static::formatCheckbox(false);

        foreach ($assets as $k => $v) {

            $rows[] = [
                true === $v ? $success : $warning,
                $bundle,
                basename($k),
            ];
        }

        return $rows;
    }
}
