<?php

namespace App\Logger;


use Bramus\Ansi\Ansi;
use Bramus\Ansi\ControlSequences\EscapeSequences\Enums\SGR;
use Bramus\Ansi\Writers\BufferWriter;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;

class ColoredLineFormatter extends LineFormatter
{

    const LOG_FORMAT = "[%datetime%] %col1%%level_name%%reset%%col2%[%channel%]%reset%: %col2%%message% %context% %extra%%reset%\n";

    /**
     * ANSI Wrapper which provides colors
     * @var \Bramus\Ansi\Ansi
     */
    protected $ansi = NULL;

    /**
     * @param string $format The format of the message
     * @param string $dateFormat The format of the timestamp: one supported by DateTime::format
     * @param bool $allowInlineLineBreaks Whether to allow inline line breaks in log entries
     * @param bool $ignoreEmptyContextAndExtra
     */
    public function __construct($format = NULL, $dateFormat = NULL, $allowInlineLineBreaks = TRUE, $ignoreEmptyContextAndExtra = TRUE)
    {

        // Create Ansi helper
        $this->ansi = new Ansi(new BufferWriter());
        parent::__construct(static::LOG_FORMAT, $dateFormat, $allowInlineLineBreaks, $ignoreEmptyContextAndExtra);
    }

    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {

        $vars = $this->normalize($record);

        $output = $this->colorizeFormat($record['level']);

        foreach ($vars['extra'] as $var => $val) {
            if (FALSE !== strpos($output, '%extra.' . $var . '%')) {
                $output = str_replace('%extra.' . $var . '%', $this->stringify($val), $output);
                unset($vars['extra'][ $var ]);
            }
        }


        foreach ($vars['context'] as $var => $val) {
            if (FALSE !== strpos($output, '%context.' . $var . '%')) {
                $output = str_replace('%context.' . $var . '%', $this->stringify($val), $output);
                unset($vars['context'][ $var ]);
            }
        }

        if ($this->ignoreEmptyContextAndExtra) {
            if (empty($vars['context'])) {
                unset($vars['context']);
                $output = str_replace('%context%', '', $output);
            }

            if (empty($vars['extra'])) {
                unset($vars['extra']);
                $output = str_replace('%extra%', '', $output);
            }
        }

        foreach ($vars as $var => $val) {
            if (FALSE !== strpos($output, '%' . $var . '%')) {

                if ($var == 'level_name') {
                    $parsedVal = str_pad('[' . $this->stringify($val) . ']', 11, ' ');
                } else {
                    $parsedVal = $this->stringify($val);
                }

                $output = str_replace('%' . $var . '%', $parsedVal, $output);
            }
        }

        // remove leftover %extra.xxx% and %context.xxx% if any
        if (FALSE !== strpos($output, '%')) {
            $output = preg_replace('/%(?:extra|context)\..+?%/', '', $output);
        }

        return $output;
    }

    public function colorizeFormat($level)
    {
        $colorArray = $this->getColorizedArray();
        $colorizedFormat = $this->format;

        $colorizedFormat = str_replace('%col1%', $colorArray[ $level ]['col1'], $colorizedFormat);
        $colorizedFormat = str_replace('%col2%', $colorArray[ $level ]['col2'], $colorizedFormat);

        $colorizedFormat = str_replace('%reset%', $this->ansi->reset()->get(), $colorizedFormat);

        return $colorizedFormat;


    }

    public function getColorizedArray()
    {
        return [
            Logger::DEBUG     => [
                'col1' => $this->ansi->color(SGR::COLOR_FG_BLUE_BRIGHT)->bold()->get(),
                'col2' => $this->ansi->color(SGR::COLOR_FG_BLUE_BRIGHT)->bold()->get()],
            Logger::INFO      => [
                'col1' => $this->ansi->color(SGR::COLOR_FG_WHITE)->bold()->get(),
                'col2' => $this->ansi->color(SGR::COLOR_FG_WHITE)->bold()->get()],
            Logger::NOTICE    => [
                'col1' => $this->ansi->color(SGR::COLOR_FG_CYAN)->bold()->get(),
                'col2' => $this->ansi->color(SGR::COLOR_FG_CYAN)->bold()->get()],
            Logger::WARNING   => [
                'col1' => $this->ansi->color(SGR::COLOR_FG_YELLOW)->bold()->get(),
                'col2' => $this->ansi->color(SGR::COLOR_FG_YELLOW)->bold()->get()],
            Logger::ERROR     => [
                'col1' => $this->ansi->color(SGR::COLOR_FG_RED)->bold()->get(),
                'col2' => $this->ansi->color(SGR::COLOR_FG_RED)->bold()->get()],
            Logger::CRITICAL  => [
                'col1' => $this->ansi->color(SGR::COLOR_FG_RED)->underline()->bold()->get(),
                'col2' => $this->ansi->color(SGR::COLOR_FG_RED)->underline()->bold()->get()],
            Logger::ALERT     => [
                'col1' => $this->ansi->color([SGR::COLOR_FG_WHITE, SGR::COLOR_BG_RED_BRIGHT])->bold()->get(),
                'col2' => $this->ansi->color([SGR::COLOR_FG_WHITE, SGR::COLOR_BG_RED_BRIGHT])->bold()->get()],
            Logger::EMERGENCY => [
                'col1' => $this->ansi->color(SGR::COLOR_BG_RED_BRIGHT)->blink()->color(SGR::COLOR_FG_WHITE)->bold()->get(),
                'col2' => $this->ansi->color(SGR::COLOR_BG_RED_BRIGHT)->blink()->color(SGR::COLOR_FG_WHITE)->bold()->get()],
        ];
    }


}