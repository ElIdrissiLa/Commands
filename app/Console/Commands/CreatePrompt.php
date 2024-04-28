<?php

namespace App\Console\Commands;
use App\Models\Pay;
use App\Models\Client;
use Illuminate\Console\Command;

class CreatePrompt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-prompt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // $prompt=$this->choice(
        //     'What is your name?',
        //     ['Taylor', 'Dayle'],
        //     $defaultIndex
        // );
        $prompt=$this->ask("nombre de client a creer?");
        $this->info('Client doit etre liee avec un pays');
        $x=$this->choice(
                'Voulez vous creer new contries?',
                ['oui', 'non'],
                "oui"
            );
        if($x=="oui"){
            if($prompt<=1){
                Client::factory()->for(Pay::factory())->create();
            }else{
                Client::factory()->count($prompt)->for(Pay::factory())->create();
            }
        }else{
            // $pays=Pay::all()->toArray();
            // print_r($pays);
            $this->table(
                ['id','nom'],
                Pay::all(['id', 'nom_pays'])->toArray()
            );
            $id=$this->ask('Taper l\'id de pays');

            $pays=Pay::find($id);
            if($prompt<=1){
                Client::factory()->for($pays)->create();
            }else{
                Client::factory()->count($prompt)->for($pays)->create();
            }
        }

    }
}
