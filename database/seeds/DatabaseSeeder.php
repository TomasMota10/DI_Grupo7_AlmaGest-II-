<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Delivery_terms::class, 10) -> create();
        factory(\App\Transports::class, 10) -> create();
        factory(\App\Payment_terms::class, 10) -> create();
        factory(\App\Bank_entity::class, 10) -> create();
        factory(\App\Discount::class, 10) -> create();
        factory(\App\Companies::class, 10) -> create();
        factory(\App\Families::class, 10) -> create();
        factory(\App\Articles::class, 10) -> create();
        factory(\App\Products::class, 10) -> create();
        // factory(\App\Orders::class, 10) -> create();
        // factory(\App\Delivery_note::class, 10) -> create();

        // factory(\App\Invoice::class, 10) -> create();
        // factory(\App\Order_lines::class, 10) -> create();
        // factory(\App\Delivery_note_lines::class, 10) -> create();
        // factory(\App\Contain_art_orderline::class, 10) -> create();
        // factory(\App\Contain_art_delivlines::class, 10) -> create();

        // factory(\App\Invoice_lines::class, 10) -> create();
        // factory(\App\Contain_art_invlines::class, 10) -> create();*/

        factory(\App\User::class, 10) -> create();
        factory(\App\User::class)->create(
            [
            'firstname' => 'Tomas',
            'secondname' => 'Mota',
            'email' => 'admin@admin.com',
            'type'=> 'a',
            'password' => Hash::make('12345678'),
            'actived' => 1,
            'code' => null,
            'email_confirmed' => 1]
        );
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class)->create(
            [
            'firstname' => 'Cristian',
            'secondname' => 'Atienza',
            'email' => 'cristianatienza26@gmail.com',
            'code' => null,
            'password' => Hash::make('12345678'),
            'actived' => 1,
            'type' => 'u',
            'email_confirmed' => 1,
            'iscontact' => 1,
            'company_id' => 1]
        );

        factory(\App\User::class)->create(
            [
            'firstname' => 'Agustin',
            'secondname' => 'Guerrero',
            'email' => 'tmotasanchez14@gmail.com',
            'code' => null,
            'password' => Hash::make('12345678'),
            'actived' => 1,
            'type' => 'u',
            'email_confirmed' => 1,
            'iscontact' => 1,
            'company_id' => 2]
        );
    }
}
