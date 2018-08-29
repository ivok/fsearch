<?php

namespace Fsearch\Console;

use Illuminate\Console\Command;
use Fsearch\Facade\Fsearch;

class FsearchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fsearch {content} {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search files by content';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $results = Fsearch::search($this->argument('content'), $this->argument('path'));
            foreach ($results as $item) {
                $file = $item['file'];
                echo "\033[01;36m $file \033[0m" . ":\n";
                foreach ($item['lines'] as $line) {
                    echo "\033[01;30m $line \033[0m" . "\n";
                }
                echo "\n\n";
            }
        } catch (\RuntimeException $exception) {
            echo $exception->getMessage();
        }
        return 'search complete';
    }
}
