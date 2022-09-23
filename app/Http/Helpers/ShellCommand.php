<?php
namespace App\Http\Helpers;

use Exception;
use Symfony\Component\Process\Process;

class ShellCommand
{
    public static function execute($cmd)
    {
        $process = Process::fromShellCommandline($cmd);

        $processOutput = "";

        $captureOutput = function ($type, $line) use (&$processOutput) {
            $processOutput .= $line;
        };

        $process
            ->run();

        if ($process->getExitCode()) {
            $exception = new Exception($cmd . " - " . $processOutput);
            report($exception);

            throw $exception;
        }

        return $process->getOutput();
    }
}
