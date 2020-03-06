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
        $sql = file_get_contents(database_path() . '/seeds/languages.sql');
        DB::statement($sql);

        $sql = file_get_contents(database_path() . '/seeds/actors.sql');
        DB::statement($sql);

        $sql = file_get_contents(database_path() . '/seeds/films.sql');
        DB::statement($sql);

        $sql = file_get_contents(database_path() . '/seeds/actors_films.sql');
        DB::statement($sql);

        $sql = file_get_contents(database_path() . '/seeds/roles.sql');
        DB::statement($sql);

        $sql = file_get_contents(database_path() . '/seeds/users.sql');
        DB::statement($sql);

        $sql = file_get_contents(database_path() . '/seeds/critics.sql');
        DB::statement($sql);
    }
}
