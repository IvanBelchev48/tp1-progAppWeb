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
        //$path = '/seeds/tp1.sql';
        //DB::unprepared(file_get_contents($path));

        $sql = file_get_contents(database_path() . '/seeds/actors.sql');
        $sql = file_get_contents(database_path() . '/seeds/films.sql');
        $sql = file_get_contents(database_path() . '/seeds/actors_films.sql');
        $sql = file_get_contents(database_path() . '/seeds/languages.sql');

        DB::statement($sql);
    }
}
