<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class AddUserCommand extends Command
{

    protected $signature = 'user:add {email} {password}';


    protected $description = 'Add a new user';


    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        User::create([
            'email' => $email,
            'password' => $password,
        ]);

        $this->info('User added successfully.');
    }
}
