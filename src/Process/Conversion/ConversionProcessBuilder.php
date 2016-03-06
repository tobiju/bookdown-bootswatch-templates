<?php
namespace Tobiju\Bookdown\Process\Conversion;

use Psr\Log\LoggerInterface;
use Bookdown\Bookdown\Config\RootConfig;
use Bookdown\Bookdown\Fsio;
use Bookdown\Bookdown\Process\Conversion\ConversionProcessBuilder as BookdownConversionProcessBuilder;

class ConversionProcessBuilder extends BookdownConversionProcessBuilder
{
    public function newInstance(RootConfig $config, LoggerInterface $logger, Fsio $fsio)
    {
        return new ConversionProcess(
            $logger,
            $fsio,
            $this->newCommonMarkConverter($config),
            $config
        );
    }
}
