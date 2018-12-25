<?php

use Illuminate\Database\Seeder;

class SkillSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skillSet = new \App\SkillSet();$skillSet->skill_name = "Php";$skillSet->save();
        $skillSet = new \App\SkillSet();$skillSet->skill_name = "Laravel";$skillSet->save();
        $skillSet = new \App\SkillSet();$skillSet->skill_name = "Html";$skillSet->save();
        $skillSet = new \App\SkillSet();$skillSet->skill_name = "Css";$skillSet->save();
        $skillSet = new \App\SkillSet();$skillSet->skill_name = "Javascript";$skillSet->save();
        $skillSet = new \App\SkillSet();$skillSet->skill_name = "JQuery";$skillSet->save();
    }
}
