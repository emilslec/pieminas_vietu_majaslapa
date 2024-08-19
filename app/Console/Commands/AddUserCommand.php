<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class AddUserCommand extends Command
{

    protected $signature = 'user:add {username} {password}';


    protected $description = 'Add a new user';


    public function handle()
    {
        $username = $this->argument('username');
        $password = $this->argument('password');

        User::create([
            'username' => $username,
            'password' => $password,
        ]);

        $this->info('User added successfully.');
    }
}
