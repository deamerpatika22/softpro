<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user -> name = "dea merpatika";
        $user -> email = "deamerpatika@gmail.com";
        $user -> password = bcrypt("1234");
        $user -> phone = "123456789";
        $user -> alamat = "Yogyakarta";
        $user -> role = "admin";
        $user -> save();
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}
