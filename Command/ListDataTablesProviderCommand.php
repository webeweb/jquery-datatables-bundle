<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManagerTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesCSVExporterInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * List DataTables provider command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Command
 */
class ListDataTablesProviderCommand extends AbstractCommand {

    use DataTablesManagerTrait {
        setDataTablesManager as public;
    }

    /**
     * Command help.
     *
     * @var string
     */
    const COMMAND_HELP = <<< EOT
The <info>%command.name%</info> command list the DatTables providers.

    <info>php %command.full_name%</info>


EOT;

    /**
     * Command name.
     *
     * @var string
     */
    const COMMAND_NAME = "wbw:jquery:datatables:list-provider";

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.jquery.datatables.command.list_provider";

    /**
     * {@inheritDoc}
     */
    protected function configure() {
        $this
            ->setDescription("List the DataTables providers")
            ->setHelp(self::COMMAND_HELP)
            ->setName(self::COMMAND_NAME);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): ?int {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());

        $rows = [];

        foreach ($this->getDataTablesManager()->getProviders() as $current) {
            $rows[] = $this->renderRow($current);
        }

        $this->sortRows($rows);

        $io->table($this->getHeaders(), $rows);

        return 0;
    }

    /**
     * Get the headers.
     *
     * @return string[] Returns the headers.
     */
    protected function getHeaders(): array {
        return [
            $this->translate("command.name", [], null, "en"),
            $this->translate("command.class", [], null, "en"),
            $this->translate("command.columns", [], null, "en"),
            $this->translate("command.prefix", [], null, "en"),
            $this->translate("command.view", [], null, "en"),
            $this->translate("command.csv", [], null, "en"),
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
     * @param array $rows The rows.
     * @return void
     */
    protected function sortRows(array &$rows): void {
        usort($rows, function(array $a, array $b) {
            return strcmp($a[0], $b[0]);
        });
    }
}
