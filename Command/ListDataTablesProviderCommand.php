<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WBW\Bundle\CoreBundle\Console\ConsoleHelper;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManagerTrait;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCSVExporterInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * List DataTables provider command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Command
 */
class ListDataTablesProviderCommand extends AbstractCommand {

    use DataTablesManagerTrait {
        setDataTablesManager as public;
    }

    /**
     * Command name.
     *
     * @var string
     */
    public const COMMAND_NAME = "wbw:datatables:provider:list";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.command.list_provider";

    /**
     * {@inheritDoc}
     */
    protected function configure(): void {
        $this
            ->setDescription("List the DataTables providers")
            ->setHelp(ConsoleHelper::formatCommandHelp("list the DatTables providers"))
            ->setName(self::COMMAND_NAME);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): ?int {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());

        $rows = [];

        /** @var DataTablesProviderInterface $current */
        foreach ($this->getDataTablesManager()->getProviders() as $current) {
            $rows[] = $this->renderRow($current);
        }

        $this->sortRows($rows);

        $io->table($this->getHeaders(), $rows);
        $this->displayFooter($io, count($rows), "message.command.provider.list.success", "message.command.provider.list.warning");

        return 0;
    }

    /**
     * Get the headers.
     *
     * @return string[] Returns the headers.
     */
    protected function getHeaders(): array {

        return [
            $this->translate("header.name", [], null, "en"),
            $this->translate("header.service", [], null, "en"),
            $this->translate("header.columns", [], null, "en"),
            $this->translate("header.prefix", [], null, "en"),
            $this->translate("header.view", [], null, "en"),
            "CSV",
        ];
    }

    /**
     * Render a row.
     *
     * @param DataTablesProviderInterface $provider The provider.
     * @return string[] Returns the rendered row.
     */
    protected function renderRow(DataTablesProviderInterface $provider): array {

        $length = strlen($this->getHeaders()[2]);
        $format = "%{$length}d";

        return [
            $provider->getName(),
            implode(PHP_EOL, [
                get_class($provider),
                "└ " . $provider->getEntity(),
            ]),
            sprintf($format, count($provider->getColumns())),
            $provider->getPrefix(),
            $provider->getView(),
            $this->getCheckbox($provider instanceof DataTablesCSVExporterInterface),
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
