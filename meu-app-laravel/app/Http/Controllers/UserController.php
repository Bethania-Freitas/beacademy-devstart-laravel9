<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            'nome' => [ 
                'Bethânia Freitas',
                'José Lira'
            ],
        ];

        dd($users);
    }
    public function show($id)
    {
        dd('O ID do Usuario é ' . $id);
    }
}

