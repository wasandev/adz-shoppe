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
        factory(App\Product::class, 10)->create();
        factory(App\Inventory::class, 10)->create();
        factory(App\User::class, 10)->create();
        factory(App\Lead::class, 10)->create();
        factory(App\Note::class, 20)->create();
        $this->call(LinksTableSeeder::class);
    }
}
