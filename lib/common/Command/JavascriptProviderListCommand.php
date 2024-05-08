<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\StyleInterface;
use WBW\Bundle\CommonBundle\Manager\JavascriptManagerTrait;
use WBW\Bundle\CommonBundle\Provider\JavascriptProviderInterface;
use WBW\Bundle\CommonBundle\WBWCommonBundle;

/**
 * Javascript provider list command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Command
 */
class JavascriptProviderListCommand extends AbstractCommand {

    use JavascriptManagerTrait {
        setJavascriptManager as public;
    }

    /**
     * Command name.
     *
     * @var string
     */
    public const COMMAND_NAME = "wbw:common:javascript:provider:list";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.command.javascript_provider_list";

    /**
     * {@inheritDoc}
     */
    protected function configure(): void {
        $this
            ->setDescription("List the javascript providers")
            ->setHelp(static::formatHelp("list the javascript providers"))
            ->setName(self::COMMAND_NAME);
    }

    /**
     * Display the footer.
     *
     * @param StyleInterface $io The I/O.
     * @param int $count The count.
     * @param string $success The success message.
     * @param string $warning The warning message.
     * @return void
     */
    protected function displayFooter(StyleInterface $io, int $count, string $success, string $warning): void {

        $message = $this->translate(0 < $count ? $success : $warning, [], WBWCommonBundle::getTranslationDomain(), "en");

        $io->success($message);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());

        $rows = [];

        /** @var JavascriptProviderInterface $current */
        foreach ($this->getJavascriptManager()->getProviders() as $current) {
            $rows[] = $this->renderRow($current);
        }

        $this->sortRows($rows);

        $io->table($this->getHeaders(), $rows);
        $this->displayFooter($io, count($rows), "command.footer.list_provider.success", "command.footer.list_provider.warning");

        return 0;
    }

    /**
     * Get the headers.
     *
     * @return string[] Returns the headers.
     */
    protected function getHeaders(): array {

        return [
            $this->translate("command.header.class", [], null, "en"),
            $this->translate("command.header.javascripts", [], null, "en"),
        ];
    }

    /**
     * Render a row.
     *
     * @param JavascriptProviderInterface $provider The provider.
     * @return string[] Returns the rendered row.
     */
    protected function renderRow(JavascriptProviderInterface $provider): array {

        $length = strlen($this->getHeaders()[1]);
        $format = "%{$length}d";

        return [
            get_class($provider),
            sprintf($format, count($provider->getJavascripts())),
        ];
    }

    /**
     * Sort the rows.
     *
     * @param string[][] $rows The rows.
     * @return void
     */
    protected function sortRows(array &$rows): void {

        usort($rows, function(array $a, array $b): int {
            return strcmp($a[0], $b[0]);
        });
    }
}
