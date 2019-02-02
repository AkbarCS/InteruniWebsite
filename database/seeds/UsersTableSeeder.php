<?php

use Illuminate\Database\Seeder;

use App\University;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surrey = University::where('domain', 'surrey.ac.uk')->firstOrFail();

		$surrey->users()->create([
            'admin' => true,
            'name' => 'Theodore Messinezis',
            'email' => 'theodore@messinezis.com',
            'password' => bcrypt('umd-cnO4k>ynCIA')
        ]);
    }
}
