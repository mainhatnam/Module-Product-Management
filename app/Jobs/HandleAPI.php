<?php

namespace App\Jobs;

use App\Models\category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HandleAPI implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->onConnection('database2');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        for ($i=0; $i < 50; $i++) { 
            sleep(1);
            $output->writeln('hello lần thứ ' . $i);
        }

    }
}
