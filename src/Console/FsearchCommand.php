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
     * @param  DripEmailer  $drip
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
        Fsearch::search($this->argument('content'), $this->argument('path'));
        Fsearch::consoleOutput();
    }
}
