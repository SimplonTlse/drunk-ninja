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
    protected $signature = 'ninja {--p|precision=70 : Percentage of landed  shots} {--s|shurikens=60 : Shurikens in pocket} {--S|success=1 : Points in case of landed shot} {--F|fail=10 : Substracted points in case of failed shot}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ninja stuff';

    private $nindo;
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
        $this->nindo = new Nindo($this->option('precision'), $this->option('shurikens'), $this->option('success'), $this->option('fail'));


        if ($this->option("verbose")) {
            $this->verbose();    
        }
        

        if ($this->nindo->hasWon()) {
            $this->info($this->nindo);
        } else {
            $this->error($this->nindo);
        }
    }

    private function verbose() {
        foreach($this->nindo->getLog() as $line) {
            if($line->success) {
                $this->info($line->msg);
            } else {
                $this->error($line->msg);
            }
        }
    }
}
