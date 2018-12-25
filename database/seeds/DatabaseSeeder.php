<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UserRoleSeeder::class,
                GenderSeeder::class,
                CountrySeeder::class,
                StateSeeder::class,
                CitySeeder::class,
                ZipCodeSeeder::class,
                JobTypeSeeder::class,
                SkillSetSeeder::class,
                NotificationTypeSeeder::class,
                UserSeeder::class,
                EmployerProfileSeeder::class,
                AdminProfileSeeder::class,
                ApplicantProfileSeeder::class,
                ExperienceDetailSeeder::class,
                EducationDetailSeeder::class,
                JobLocationSeeder::class,
                ApplicantSkillSetSeeder::class,
                EmployerCompanySeeder::class,
                EmployerJobSeeder::class,
                ApplicantJobApplySeeder::class,
            ]);
    }
}
