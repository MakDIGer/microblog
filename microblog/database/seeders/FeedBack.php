<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        for ($i = 0; $i < 20; $i++)
        {
            $feedbacks_library = [
                [
                    'name' => $names[rand(0, count($names) - 1)],
                    'email' => $emails[rand(0, count($emails) - 1)],
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod ligula non
                    finibus laoreet. Suspendisse efficitur vel eros tincidunt vestibulum. In sit amet elit gravida,
                    viverra odio at, ultricies dolor. Duis ornare urna lacus, iaculis fermentum lorem tincidunt quis.
                    Sed consequat diam ac gravida pulvinar. Phasellus vulputate eros ac viverra elementum. Ut faucibus
                    eget nunc quis luctus. Duis eget odio dapibus, faucibus turpis sit amet, vestibulum ante. Nam mi
                    tortor, pulvinar id dignissim nec, viverra quis dui. Nulla facilisi. Curabitur placerat ante eu
                    aliquam porttitor. In at nisl ut leo elementum molestie sit amet id erat.<br><br>

                    Sed et nunc tortor. Nunc molestie, ligula quis porta porttitor, quam dui feugiat mauris, non
                    tristique felis augue et arcu. Fusce rutrum erat eu rhoncus feugiat. Nam non euismod velit, id
                    commodo libero. Sed tincidunt tellus blandit, feugiat nulla ac, aliquam libero. In hac habitasse
                    platea dictumst. Fusce id viverra tortor, et cursus nunc. Nulla quis lobortis magna. Mauris
                    faucibus risus id ligula faucibus fringilla. Sed ac congue tortor, vel pretium leo. Integer ornare
                    augue nunc, at facilisis tortor auctor sit amet. Vivamus eu turpis nibh. Aliquam gravida rutrum
                    finibus. Ut eu dictum urna. Praesent lobortis fermentum metus, sit amet interdum nulla. Maecenas
                    quam magna, luctus at elementum ut, iaculis sed dolor.<br><br>

                    Duis rhoncus risus magna, et commodo ipsum luctus non. Praesent finibus mi feugiat, porttitor ex
                    vitae, semper nunc. Mauris vel dolor lacus. Nunc tristique tellus a massa rhoncus, eu hendrerit
                    dolor sagittis. Donec eu augue varius quam molestie feugiat. Fusce rutrum ligula ut quam tempor,
                    nec placerat lectus tincidunt. Nullam nec eros eu lectus imperdiet sagittis id vehicula dui.
                    Phasellus euismod quam felis, id rutrum est ullamcorper sit amet. Vestibulum sit amet risus neque.
                     Curabitur vel justo ut turpis eleifend mollis et et erat. Donec mollis tellus eu enim pellentesque
                      ultricies. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                      himenaeos. In enim purus, pretium id turpis quis, lacinia finibus ex. Etiam in ultricies odio.
                      Vestibulum nec tincidunt ante, nec rhoncus ipsum. Etiam malesuada sem quis posuere luctus. ',
                    'isAnswered' => rand(0, 1),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            ];

            DB::table('feedbacks')->insert($feedbacks_library);
        }


        // TODO: Дописать сидер для таблицы фидбэков
    }
}
