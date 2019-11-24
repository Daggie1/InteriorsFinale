<?php


use App\Models\Seller;
use Illuminate\Database\Seeder;
class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Seller::create([
            'f_name'      =>  'In House',
            'l_name'      =>  'Shop',
            'email'     =>  'admin@admin.com',
            'phone'     =>  '254791614457',
            'id_no'     =>  '987037032',
            'password'  =>  bcrypt('password'),
        ]);
    }
}
