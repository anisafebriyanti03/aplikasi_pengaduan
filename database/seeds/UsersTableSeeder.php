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
            'nik' =>'30000943020690143',
            'nama' => 'Staff Administrasi',
            'level' => 'Admin',
            'Email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'telp'=>'08766',
            'jenkel'=>'perempuan',
            'alamat'=>'Jalan Raya',
            'rt'=>'01',
            'rw'=>'01',
            'kode_pos'=>'1456',
            'province_id'=>'32',
            'regency_id'=>'3276',
            'district_id'=>'3276060',
            'village_id'=>'3276060004',
            'remember_token' => Str::random(60)
        ]);
    }
}
