<?php

use Illuminate\Database\Seeder;

class EmployerJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //1-------------------------------------9
        for ($i=1; $i < 10; $i++) { 
            $job = new \App\Job;
            $job->title = "Software Developer";
            $job->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas arcu augue, vestibulum vitae condimentum ac, dapibus nec diam. Aliquam risus diam, ornare et purus a, volutpat aliquet dui. Nullam ut risus sem. Aliquam erat leo, eleifend eget pulvinar et, fermentum sed sem. Donec eu feugiat elit, eu ullamcorper tellus. Curabitur porta viverra lorem, quis commodo nulla condimentum sed. Integer varius quam sit amet tortor sodales scelerisque. Proin sit amet magna quis erat egestas auctor vitae ac justo. Integer velit arcu, ornare at pellentesque et, congue in dui.
    
            Duis facilisis pellentesque urna. Vivamus est quam, fermentum sed quam non, suscipit consectetur nisi. Sed euismod metus eu erat vehicula posuere. Fusce eros ipsum, lacinia in massa vitae, dapibus interdum lacus. Maecenas vehicula lacus erat, nec suscipit dui blandit vel. Curabitur tempor, ante pulvinar vehicula varius, mi lacus ornare tellus, a porta enim massa eget nulla. Etiam a finibus mauris. Fusce mollis eu felis et dapibus.
            ';
            $job->expire_job = Carbon\Carbon::tomorrow();
            $job->salary = 50000;
            $job->job_type_id = 1;
           $job->job_location_id = 1;
            $job->user_id = 2;
            $job->company_info_id = 1;
    
            $job->save();
        }

      
  //10-------------------------------------19
  for ($i=1; $i < 10; $i++) { 
    $job = new \App\Job;
    $job->title = "Tester";
    $job->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas arcu augue, vestibulum vitae condimentum ac, dapibus nec diam. Aliquam risus diam, ornare et purus a, volutpat aliquet dui. Nullam ut risus sem. Aliquam erat leo, eleifend eget pulvinar et, fermentum sed sem. Donec eu feugiat elit, eu ullamcorper tellus. Curabitur porta viverra lorem, quis commodo nulla condimentum sed. Integer varius quam sit amet tortor sodales scelerisque. Proin sit amet magna quis erat egestas auctor vitae ac justo. Integer velit arcu, ornare at pellentesque et, congue in dui.

    Duis facilisis pellentesque urna. Vivamus est quam, fermentum sed quam non, suscipit consectetur nisi. Sed euismod metus eu erat vehicula posuere. Fusce eros ipsum, lacinia in massa vitae, dapibus interdum lacus. Maecenas vehicula lacus erat, nec suscipit dui blandit vel. Curabitur tempor, ante pulvinar vehicula varius, mi lacus ornare tellus, a porta enim massa eget nulla. Etiam a finibus mauris. Fusce mollis eu felis et dapibus.
    ';
    $job->expire_job = Carbon\Carbon::tomorrow()->format('Y-m-d');
    $job->salary = 50000;
    $job->job_type_id = 1;
   $job->job_location_id = 2;
    $job->user_id = 2;
    $job->company_info_id = 2;

    $job->save();
}


$job = \App\Job::find(4);
$job->expire_job = Carbon\Carbon::yesterday()->format('Y-m-d');
$job->save();

$job = \App\Job::find(9);
    $job->expire_job = Carbon\Carbon::yesterday()->format('Y-m-d');
    $job->save();


    $job = \App\Job::find(15);
    $job->expire_job = Carbon\Carbon::yesterday()->format('Y-m-d');
    $job->save();


    }
}
