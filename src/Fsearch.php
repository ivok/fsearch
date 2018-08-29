<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 8/29/2018
 * Time: 18:52
 */

namespace Fsearch;

use Illuminate\Support\Facades\App;

class Fsearch
{
    /**
     * Това може и в конфигурация да се изнесе
     */
    const ALLOWED_FILES = ['php'];

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var array
     */
    protected $result = [];

    /**
     * @param $content
     * @param $path
     * @return string
     */
    public function search($content, $path)
    {
        try {
            $this->setPath($path);
            $this->setContent($content);
            return $this->doSearch();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function consoleOutput()
    {
        if (App::runningInConsole()) {
            foreach ($this->result as $item) {
                $file = $item['file'];
                echo "\033[01;36m $file \033[0m" . ":\n";
                foreach ($item['lines'] as $line) {
                    echo "\033[01;30m $line \033[0m" . "\n";
                }
                echo "\n\n";
            }
        }
    }

    /**
     * @return array
     */
    protected function doSearch()
    {
        $directoryIterator = new \RecursiveDirectoryIterator($this->path);
        $iterator = new \RecursiveIteratorIterator($directoryIterator);
        foreach (new \RecursiveIteratorIterator($directoryIterator) as $file) {
            if (in_array(pathinfo($file, PATHINFO_EXTENSION), self::ALLOWED_FILES)) {
                $this->readContent($file);
            }
        }
        return $this->result;
    }

    /**
     * @param $file
     */
    protected function readContent($file)
    {
        $contents = file_get_contents($file);
        $pattern = "/^.*$this->content.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $this->result[] = [
                'file' => $file,
                'lines' => $matches[0]
            ];
        }
    }

    /**
     * @param $path
     * @throws \Exception
     */
    protected function setPath($path)
    {
        if (in_array(PHP_OS, ['Windows', 'WINNT'])) {
            $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
        }

        if (!is_dir($path)) {
            throw new \Exception('Invalid directory');
        }

        $this->path = realpath($path);
    }

    /**
     * @param $content
     */
    protected function setContent($content)
    {
        $this->content = preg_quote($content, '/');
    }
}
