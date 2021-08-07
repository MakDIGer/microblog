<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeedBack extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Фил',
            'Андрей',
            'Виктор',
            'Семен',
            'Петр',
            'Василий'
        ];
        $emails = [
            'admin@host.com',
            'max@host.com',
            'gid@host.com',
            'ralf@host.com',
            'seger@host.com',
            'fix@host.com'
        ];

        $feedbacks_library = [
            [
                'name' => $names[rand(0, count($names))],
                'email' => $emails[rand(0, count($emails))],
                'text' => '',
                'isAnswered' => rand(0, 1),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];

        // TODO: Дописать сидер для таблицы фидбэков
    }
}
