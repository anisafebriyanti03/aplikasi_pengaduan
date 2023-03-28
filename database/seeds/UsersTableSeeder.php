<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'nik' =>'1001',
            'nama' => 'Anisa Febriyanti',
            'level' => 'Admin',
            'Email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'telp'=>'08766',
            'jenkel'=>'perempuan',
            'alamat'=>'Jalan Raya',
            'rt'=>'01',
            'rw'=>'01',
            'kode_pos'=>'1456',
            'province_id'=>'01',
            'regency_id'=>'01',
            'district_id'=>'01',
            'village_id'=>'01',
            'remember_token' => Str::random(60)
        ]);
    }
}
