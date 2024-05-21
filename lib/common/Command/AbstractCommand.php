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

namespace WBW\Bundle\CommonBundle\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use WBW\Bundle\CommonBundle\Translation\TranslatorTrait;

/**
 * Abstract command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Command
 * @abstract
 */
abstract class AbstractCommand extends Command {

    use TranslatorTrait {
        setTranslator as public;
    }

    /**
     * Display a footer.
     *
     * @param StyleInterface $io The I/O.
     * @param int $count The count.
     * @param string $success The success message.
     * @param string $warning The warning message.
     * @param string $domain The domain.
     * @param string|null $locale The locale.
     * @return void
     */
    protected function displayFooter(StyleInterface $io, int $count, string $success, string $warning, string $domain, string $locale = null): void {

        $message = $this->translate(0 < $count ? $success : $warning, [], $domain, $locale);

        $io->success($message);
    }

    /**
     * Display the header.
     *
     * @param StyleInterface $io The I/O.
     * @param string $header The header.
     * @return void
     */
    protected static function displayHeader(StyleInterface $io, string $header): void {
        $io->text($header);
        $io->newLine();
    }

    /**
     * Display the title.
     *
     * @param StyleInterface $io The I/O.
     * @param string $title The title.
     * @return void
     */
    protected static function displayTitle(StyleInterface $io, string $title): void {
        $io->title($title);
    }

    /**
     * Format a checkbox.
     *
     * @param bool $checked Checked ?
     * @return string Returns the checkbox.
     */
    protected static function formatCheckbox(bool $checked): string {
        return CommandHelper::formatCheckbox($checked);
    }

    /**
     * Format a help.
     *
     * @param string $content The content.
     * @return string Returns the help.
     */
    protected static function formatHelp(string $content): string {
        return CommandHelper::formatHelp($content);
    }

    /**
     * Get the kernel.
     *
     * @return KernelInterface|null Returns the kernel in case of success, null otherwise.
     */
    protected function getKernel(): ?KernelInterface {

        if (false === ($this->getApplication() instanceof Application)) {
            return null;
        }

        return $this->getApplication()->getKernel();
    }

    /**
     * Create a style.
     *
     * @param InputInterface $input The input.
     * @param OutputInterface $output The output.
     * @return StyleInterface Returns the style.
     */
    protected static function newStyle(InputInterface $input, OutputInterface $output): StyleInterface {
        return CommandHelper::newSymfonyStyle($input, $output);
    }
}
