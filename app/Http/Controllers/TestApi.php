<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestApi extends Controller
{
    public function index()
    {
        
        // User::create([
        //     'name' => 'test',
        //     'username' => 'testuser',
        //     'email'=> 'test@gmail.com',
        //     'password' => Hash::make('testpass')
            
        // ]);
        return [
            'name'=>'Hizqeel Javed'
        ];
    }
}
