<?php

namespace App\Console\Commands;

use App\Http\Services\EmailService;
use App\Http\Services\UserService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateSuperUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-super-user-command {first_name} {last_name} {gender} {phone} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(UserService $userService, EmailService $emailService)
    {
        $has_password = $userService::generateRandomString(10);
        $userService->create([
            'first_name'        => $this->argument('first_name'),
            'last_name'         => $this->argument('last_name'),
            'gender'            => $this->argument('gender'),
            'role'              => "Администратор",
            'phone'             => $this->argument('phone'),
            'password_admin'    => Hash::make($has_password),
        ]);
        if ($this->argument('email'))
        {
            $this->info($this->argument('email'));
            $emailService->send([
                'email'             => $this->argument('email'),
                'first_name'        => $this->argument('first_name'),
                'last_name'         => $this->argument('last_name'),
                'phone'             => $this->argument('phone'),
                'password_admin'    => $has_password,
            ]);
        }
        $this->info('Здравствуйте!\nВы успешно зарегистрировали супер-админа!');
        $this->info('Данные входа были отправлены вам на почту, которую вы указали!');
    }
}
