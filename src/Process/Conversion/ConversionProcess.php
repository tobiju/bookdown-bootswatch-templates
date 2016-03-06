<?php
namespace Tobiju\Bookdown\Process\Conversion;

use Bookdown\Bookdown\Config\RootConfig;
use Bookdown\Bookdown\Content\Page;
use Bookdown\Bookdown\Fsio;
use Bookdown\Bookdown\Process\Conversion\ConversionProcess as BookdownConversionProcess;
use League\CommonMark\Converter;
use Psr\Log\LoggerInterface;

class ConversionProcess extends BookdownConversionProcess
{
    /**
     * @var RootConfig
     */
    protected $config;

    public function __construct(
        LoggerInterface $logger,
        Fsio $fsio,
        Converter $commonMarkConverter,
        RootConfig $config
    )
    {
        parent::__construct(
            $logger,
            $fsio,
            $commonMarkConverter
        );

        $this->config = $config;
    }

    public function __invoke(Page $page)
    {
        parent::__invoke($page);

        $pageTarget = $page->getTarget();
        $this->logger->info("    Json Rendering {$pageTarget}");

        $file = $this->config->getTarget() . '/index.json';

        $this->writeIndex($page, $file);
    }

    /**
     * Write json index.
     *
     * @param Page $page
     * @param string $file
     * @throws \Bookdown\Bookdown\Exception
     */
    protected function writeIndex(Page $page, $file)
    {
        if ($page->isRoot()) {
            $this->fsio->put($file, json_encode(array()));
        }

        if (!$page->isIndex()) {
            $pageArray = $this->readJson($file);

            array_push($pageArray, array(
                'id' => $page->getHref(),
                'title' => $page->getName(),
                'body' => strip_tags($this->readOrigin())
            ));

            $this->writeJson($pageArray, $file);
        }
    }

    /**
     * Read in the file and return json data as array.
     *
     * @param $file
     * @return array
     * @throws \Bookdown\Bookdown\Exception
     */
    protected function readJson($file)
    {
        $json = $this->fsio->get($file);
        return json_decode($json, true);
    }

    /**
     * Write the content array to file as json.
     *
     * @param array $content
     * @param $file
     * @throws \Bookdown\Bookdown\Exception
     */
    protected function writeJson(array $content, $file)
    {
        $json = json_encode($content);
        $this->fsio->put($file, $json);
    }
}
