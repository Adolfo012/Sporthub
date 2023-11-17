<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{   protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        //Create a new user object 
        $usuario = new User();
        //Assigns attribute values
        $usuario->name = "Michael";
        $usuario->fsurname = "Oca";
        $usuario->msurname = "Mora";
        $usuario->nickname = "Paladin";
        $usuario->email = "migmal@gmail.com";
        $usuario->gender = "Masculino";
        $usuario->password = static::$password ??= Hash::make('admin123'); #Encrypted password
        $usuario->birthdate = "2002/12/12";
        //Save the record to the database
        $usuario->save();
    }
}
