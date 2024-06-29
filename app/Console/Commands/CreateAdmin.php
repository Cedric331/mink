<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Veuillez indiquer votre nom :');
        $email = $this->ask('Veuillez indiquer votre email :');
        $password = $this->secret('Veuillez indiquer votre mot de passe :');
        $confirmPassword = $this->secret('Veuillez confirmer votre mot de passe :');

        if ($password !== $confirmPassword) {
            $this->error('Les mots de passe ne correspondent pas.');
            return false;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $user->assignRole('ADMIN');

        $this->info("Utilisateur {$user->name} créé avec succès.");

        return true;
    }
}
