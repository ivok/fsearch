<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 8/29/2018
 * Time: 18:52
 */

namespace Fsearch;

use Fsearch\Exception\DirectoryNotFoundException;

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
     * @return array
     * @throws \Exception
     */
    public function search($content, $path)
    {
        $this->setPath($path);
        $this->setContent($content);
        return $this->doSearch();
    }

    /**
     * @return array
     */
    protected function doSearch()
    {
        $directoryIterator = new \RecursiveDirectoryIterator($this->path);
        foreach (new \RecursiveIteratorIterator($directoryIterator) as $filePath) {
            if (in_array(pathinfo($filePath, PATHINFO_EXTENSION), self::ALLOWED_FILES)) {
                $this->readContent($filePath);
            }
        }
        return $this->result;
    }

    /**
     * @param $file
     */
    protected function readContent($filePath)
    {
        $contents = file_get_contents($filePath);
        $pattern = "/^.*$this->content.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $this->result[] = [
                'file' => $filePath,
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
            throw new DirectoryNotFoundException('Invalid directory');
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
