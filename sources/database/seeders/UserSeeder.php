<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Гарри',
                'last_name' => 'Причёскин',
                'middle_name' => 'Фенвентиляторович',
                'age' => 19,
                'birth_date' => '11.09.2001',
                'role' => 'Администратор',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-01',
                'email' => 'test.user.1@email.ru'
            ],
            [
                'first_name' => 'Лола',
                'last_name' => 'Кукурузова',
                'age' => 22,
                'birth_date' => '11.09.2001',
                'role' => 'Тренер',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-02',
                'email' => 'test.user.2@email.ru'
            ],
            [
                'first_name' => 'Борис',
                'last_name' => 'Огурцов',
                'middle_name' => 'Утюгинасов',
                'age' => 25,
                'birth_date' => '11.09.2001',
                'role' => 'Тренер',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-03',
                'email' => 'test.user.3@email.ru'
            ],
            [
                'first_name' => 'Марго',
                'last_name' => 'Лягушкина',
                'age' => 19,
                'birth_date' => '11.09.2001',
                'role' => 'Руководитель',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-04',
                'email' => 'test.user.4@email.ru'
            ],
            [
                'first_name' => 'Денис',
                'last_name' => 'Шоколадкин',
                'middle_name' => 'Микроволнович',
                'age' => 31,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент-менеджер',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-05',
                'email' => 'test.user.5@email.ru'
            ],
            [
                'first_name' => 'Клавдия',
                'last_name' => 'Карамелькина',
                'middle_name' => 'Тостеровна',
                'age' => 21,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-06',
                'email' => 'test.user.6@email.ru'
            ],
            [
                'first_name' => 'Рудольф',
                'last_name' => 'Вафелькин',
                'age' => 23,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-07',
                'email' => 'test.user.7@email.ru'
            ],
            [
                'first_name' => 'Виолетта',
                'last_name' => 'Трюфелина',
                'middle_name' => 'Утюгинасовна',
                'age' => 28,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-08',
                'email' => 'test.user.8@email.ru'
            ],
            [
                'first_name' => 'Артур',
                'last_name' => 'Лимонадов',
                'middle_name' => 'Лампочкин',
                'age' => 21,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-09',
                'email' => 'test.user.9@email.ru'
            ],
            [
                'first_name' => 'Инга',
                'last_name' => 'Печенькина',
                'age' => 17,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-10',
                'email' => 'test.user.10@email.ru'
            ],
            [
                'first_name' => 'Оливер',
                'last_name' => 'Чупа-Чупсов',
                'age' => 22,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-11',
                'email' => 'test.user.11@email.ru'
            ],
            [
                'first_name' => 'Розалия',
                'last_name' => 'Попкорнина',
                'age' => 34,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-12',
                'email' => 'test.user.12@email.ru'
            ],
            [
                'first_name' => 'Григорий',
                'last_name' => 'Бубликов',
                'age' => 27,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-13',
                'email' => 'test.user.13@email.ru'
            ],
            [
                'first_name' => 'Лолита',
                'last_name' => 'Сникерсова',
                'age' => 37,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-14',
                'email' => 'test.user.14@email.ru'
            ],
            [
                'first_name' => 'Феликс',
                'last_name' => 'Шариков',
                'age' => 31,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-15',
                'email' => 'test.user.15@email.ru'
            ],
            [
                'first_name' => 'Валентина',
                'last_name' => 'Пончикова',
                'middle_name' => 'Фенхозяйкаевна',
                'age' => 22,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-16',
                'email' => 'test.user.16@email.ru'
            ],
            [
                'first_name' => 'Фёдор',
                'last_name' => 'Молочников',
                'middle_name' => 'Миксерович',
                'age' => 19,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-17',
                'email' => 'test.user.17@email.ru'
            ],
            [
                'first_name' => 'Луиза',
                'last_name' => 'Помидорова',
                'middle_name' => 'Пылесосовна',
                'age' => 25,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-18',
                'email' => 'test.user.18@email.ru'
            ],
            [
                'first_name' => 'Игорь',
                'last_name' => 'Картофелин',
                'middle_name' => 'Блендерович',
                'age' => 30,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-19',
                'email' => 'test.user.19@email.ru'
            ],
            [
                'first_name' => 'Анжелика',
                'last_name' => 'Кексына',
                'middle_name' => 'Утюжиловна',
                'age' => 28,
                'birth_date' => '11.09.2001',
                'role' => 'Клиент',
                'gender' => 'Мужчина',
                'weight' => 175,
                'height' => 77.6,
                'size_cloth' => 55,
                'phone' => '+7 (111) 111-11-20',
                'email' => 'test.user.20@email.ru'
            ],
        ];
        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
