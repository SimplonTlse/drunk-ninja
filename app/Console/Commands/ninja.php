<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Nindo\Nindo;

class ninja extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ninja';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ninja stuff';

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
        echo new Nindo(7);
    }
}
