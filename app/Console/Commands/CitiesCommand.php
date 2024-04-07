<?php

namespace App\Console\Commands;

use App\Mail\CitiesMail;
use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CitiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:cities {--email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This sends an email of all Japanese prefectures to stakeholders';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sendToEmail = $this->option('email');
        error_log($sendToEmail);
        if(!$sendToEmail) {
            error_log('failure');
            return Command::FAILURE;
        }
        $cities = City::all();
        
        error_log($cities);

        if($cities->count() > 0) {
            Mail::to($sendToEmail)->send(new CitiesMail($cities));
        }
        
        return Command::SUCCESS;
        // }
    }
}
