<?php

use Illuminate\Database\Seeder;

class EmployerCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $com = new \App\CompanyInfo;

        $com->company_info = "Textile Company";
        $com->company_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas arcu augue, vestibulum vitae condimentum ac, dapibus nec diam. Aliquam risus diam, ornare et purus a, volutpat aliquet dui. Nullam ut risus sem. Aliquam erat leo, eleifend eget pulvinar et, fermentum sed sem. Donec eu feugiat elit, eu ullamcorper tellus. Curabitur porta viverra lorem, quis commodo nulla condimentum sed. Integer varius quam sit amet tortor sodales scelerisque. Proin sit amet magna quis erat egestas auctor vitae ac justo. Integer velit arcu, ornare at pellentesque et, congue in dui.

        Duis facilisis pellentesque urna. Vivamus est quam, fermentum sed quam non, suscipit consectetur nisi. Sed euismod metus eu erat vehicula posuere. Fusce eros ipsum, lacinia in massa vitae, dapibus interdum lacus. Maecenas vehicula lacus erat, nec suscipit dui blandit vel. Curabitur tempor, ante pulvinar vehicula varius, mi lacus ornare tellus, a porta enim massa eget nulla. Etiam a finibus mauris. Fusce mollis eu felis et dapibus.
        ';
        $com->established_date = Carbon\Carbon::parse('23-05-1990');
        $com->address = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ';
        $com->company_url = "https://www.test.com";
        $com->employer_profiles_id = 2;

        $com->save();


        $com = new \App\CompanyInfo;

        $com->company_info = "Carbon Company";
        $com->company_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas arcu augue, vestibulum vitae condimentum ac, dapibus nec diam. Aliquam risus diam, ornare et purus a, volutpat aliquet dui. Nullam ut risus sem. Aliquam erat leo, eleifend eget pulvinar et, fermentum sed sem. Donec eu feugiat elit, eu ullamcorper tellus. Curabitur porta viverra lorem, quis commodo nulla condimentum sed. Integer varius quam sit amet tortor sodales scelerisque. Proin sit amet magna quis erat egestas auctor vitae ac justo. Integer velit arcu, ornare at pellentesque et, congue in dui.

        Duis facilisis pellentesque urna. Vivamus est quam, fermentum sed quam non, suscipit consectetur nisi. Sed euismod metus eu erat vehicula posuere. Fusce eros ipsum, lacinia in massa vitae, dapibus interdum lacus. Maecenas vehicula lacus erat, nec suscipit dui blandit vel. Curabitur tempor, ante pulvinar vehicula varius, mi lacus ornare tellus, a porta enim massa eget nulla. Etiam a finibus mauris. Fusce mollis eu felis et dapibus.
        ';
        $com->established_date = Carbon\Carbon::parse('23-05-1986');
        $com->address = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ';
        $com->company_url = "https://www.test.com";
        $com->employer_profiles_id = 2;

        $com->save();
    }
}
