<?php

use Illuminate\Database\Seeder;

class ExperienceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exp_det = new \App\ExperienceDetail;

        $exp_det->is_job = 1;
        $exp_det->joining_date = Carbon\Carbon::parse("23-07-2014");
        $exp_det->quit_date = Carbon\Carbon::parse("23-07-2016");
        $exp_det->jon_tilte = 'Tester';
        $exp_det->company_title = 'Software Hoouse';
        $exp_det->job_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas arcu augue, vestibulum vitae condimentum ac, dapibus nec diam. Aliquam risus diam, ornare et purus a, volutpat aliquet dui. Nullam ut risus sem. Aliquam erat leo, eleifend eget pulvinar et, fermentum sed sem. Donec eu feugiat elit, eu ullamcorper tellus. Curabitur porta viverra lorem, quis commodo nulla condimentum sed. Integer varius quam sit amet tortor sodales scelerisque. Proin sit amet magna quis erat egestas auctor vitae ac justo. Integer velit arcu, ornare at pellentesque et, congue in dui.

        Duis facilisis pellentesque urna. Vivamus est quam, fermentum sed quam non, suscipit consectetur nisi. Sed euismod metus eu erat vehicula posuere. Fusce eros ipsum, lacinia in massa vitae, dapibus interdum lacus. Maecenas vehicula lacus erat, nec suscipit dui blandit vel. Curabitur tempor, ante pulvinar vehicula varius, mi lacus ornare tellus, a porta enim massa eget nulla. Etiam a finibus mauris. Fusce mollis eu felis et dapibus.
        ';
        $exp_det->day_experience = Carbon\Carbon::parse("23-07-2014")->diffInDays(Carbon\Carbon::parse("23-07-2016"));
        $exp_det->job_location_city = 1;
        $exp_det->job_location_country = 1;
        $exp_det->job_location_state = 1;
        $exp_det->applicant_profiles_userid = 3;

        $exp_det->save();

        $exp_det = new \App\ExperienceDetail;

        $exp_det->is_job = 1;
        $exp_det->joining_date = Carbon\Carbon::parse("23-07-2012");
        $exp_det->quit_date = Carbon\Carbon::parse("23-07-2016");
        $exp_det->jon_tilte = 'Developer';
        $exp_det->company_title = 'Software Hoouse';
        $exp_det->job_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas arcu augue, vestibulum vitae condimentum ac, dapibus nec diam. Aliquam risus diam, ornare et purus a, volutpat aliquet dui. Nullam ut risus sem. Aliquam erat leo, eleifend eget pulvinar et, fermentum sed sem. Donec eu feugiat elit, eu ullamcorper tellus. Curabitur porta viverra lorem, quis commodo nulla condimentum sed. Integer varius quam sit amet tortor sodales scelerisque. Proin sit amet magna quis erat egestas auctor vitae ac justo. Integer velit arcu, ornare at pellentesque et, congue in dui.

        Duis facilisis pellentesque urna. Vivamus est quam, fermentum sed quam non, suscipit consectetur nisi. Sed euismod metus eu erat vehicula posuere. Fusce eros ipsum, lacinia in massa vitae, dapibus interdum lacus. Maecenas vehicula lacus erat, nec suscipit dui blandit vel. Curabitur tempor, ante pulvinar vehicula varius, mi lacus ornare tellus, a porta enim massa eget nulla. Etiam a finibus mauris. Fusce mollis eu felis et dapibus.
        
        Proin dapibus bibendum egestas. Maecenas ac sagittis est. Pellentesque eleifend lobortis dolor congue tempus. Sed justo augue, volutpat quis est vel, tincidunt imperdiet augue. Ut eget turpis quis odio vestibulum tempor vitae eu odio. Ut vehicula ex quis ipsum sagittis, at aliquet metus efficitur. Mauris condimentum faucibus sapien, sit amet vehicula dolor convallis at. Praesent vel velit in est mollis elementum non id risus. Vestibulum a nibh commodo, mollis felis vitae, bibendum orci. Quisque feugiat metus eget fermentum placerat. Nunc id nulla id justo faucibus rhoncus eget vitae nisi. Aenean vestibulum tortor neque. Proin egestas porttitor purus ac varius. Maecenas ut sapien sit amet magna vulputate hendrerit a quis urna. Suspendisse ac placerat erat. Vestibulum erat enim, tempus et posuere semper, dictum volutpat elit.';
        $exp_det->day_experience = Carbon\Carbon::parse("23-07-2014")->diffInDays(Carbon\Carbon::parse("23-07-2016"));
        $exp_det->job_location_city = 1;
        $exp_det->job_location_country = 1;
        $exp_det->job_location_state = 1;
        $exp_det->applicant_profiles_userid = 3;

        $exp_det->save();
    }


}
