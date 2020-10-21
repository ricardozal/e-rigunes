<?php


namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use \Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public $faker;

    public function run()
    {
        $this->faker = Factory::create();

        $this->users();

    }

    public function users()
    {
        $this->role();

        if (env('APP_DEBUG')) {
            $this->admin();
            $this->buyers();
        }else{
            $this->adminP();
        }
    }

    public function admin()
    {
        DB::table('user')->insert([
            [
                'email' => 'admin@rigunes.com.mx',
                'password' => bcrypt('prueba'),
                'fk_id_role' => 2,
            ]
        ]);
    }

    public function buyers(){

        for ($i=0;$i<5;$i++){

            $buyerId = DB::table('buyer')->insertGetId([
                'name' => $this->faker->firstNameFemale,
                'father_last_name' => $this->faker->firstNameFemale,
                'mother_last_name' => $this->faker->firstNameFemale,
                'email' => 'buyer'.$i.'@rigunes.com.mx',
                'password' => bcrypt('prueba'),
                'birthday' => Carbon::parse('10/10/1997'),
                'phone' => $this->faker->tollFreePhoneNumber
            ]);

            for ($j=1;$j<=5;$j++){
                DB::table('address')->insert([
                    'street' => $this->faker->streetName,
                    'ext_num' => rand(10,100),
                    'int_num' => rand(10,100),
                    'colony' => $this->faker->streetSuffix,
                    'zip_code' => rand(1000,9999),
                    'city' => $this->faker->city,
                    'state' => $this->faker->state,
                    'country' => $this->faker->country,
                    'references' => 'Referencias',
                    'fk_id_buyer' => $buyerId,
                ]);
            }


        }

    }

    public function adminP()
    {
        DB::table('user')->insert([
            [
                'email' => 'admin@rigunes.com.mx',
                'password' => bcrypt('r1guN352020'),
                'fk_id_role' => 2,
            ]
        ]);
    }

    public function role(){
        DB::table('role')->insert([
            [
                'name' => 'Comprador'
            ],[
                'name' => 'Administrador'
            ]
        ]);
    }
}
