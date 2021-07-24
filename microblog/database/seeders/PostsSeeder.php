<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arTags = [
            'HTML5',
            'CSS3',
            'JavaScript',
            'PHP7',
            'MySQL',
            'NodeJS',
            'WordPress',
            'Bitrix',
            'CRM',
            'Docker',
            'PSR',
            'Composer',
            'JSON',
            'Linux',
            'CentOS',
            'Ubuntu',
            'Debian',
            'FreeBSD'
        ];

        for ($i = 0; $i < 20; $i++)
        {
            $postTags = [];
            $tagsNum = rand(1, count($arTags));

            for ($j = 0; $j < $tagsNum; $j++)
            {
                array_push($postTags, $arTags[rand(1, count($arTags) - 1)]);
            };

            DB::table('posts')->insert([
                'title' => 'Новость запись ' . $i,
                'category_id' => rand(1, 5),
                'prevText' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt efficitur
                ligula non facilisis. Proin eget porta mi. Nullam hendrerit rhoncus neque, sit amet ullamcorper tortor
                efficitur eget. Nulla et. <br>
                ПревТекст ' . $i,
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed dui sit amet orci
                tincidunt fermentum vitae a magna. Nullam id dui nibh. Maecenas faucibus nibh et dignissim lobortis.
                Nam malesuada tortor vel vulputate scelerisque. Fusce commodo sollicitudin nunc, sit amet malesuada
                nunc tincidunt sed. Nullam a lacinia arcu. Fusce sed finibus justo, rhoncus mollis nibh. Praesent id
                arcu mattis, suscipit quam ut, suscipit augue. In sit amet diam quis sem auctor suscipit vel in nunc.
                Sed et leo tortor. In aliquet magna nec fermentum auctor.<br><br>

                Nulla blandit vestibulum leo. Praesent odio orci, accumsan nec eros id, viverra pharetra libero.
                Praesent ante odio, consectetur quis placerat sit amet, eleifend fringilla diam. Fusce lobortis, nisi
                sed mollis tempor, ligula risus congue velit, a convallis nisi purus ac arcu. Vestibulum consequat
                sapien vitae nisl pharetra, consectetur aliquet velit tincidunt. Nullam vulputate laoreet felis at
                feugiat. Vivamus sempre erat eu risus ultrices, vel interdum orci semper. Suspendisse pulvinar a nulla
                eu tincidunt. Nullam porttitor lorem ex, nec accumsan dolor bibendum quis. Vivamus gravida scelerisque
                dui. Morbi tristique imperdiet ex, sed lobortis eros interdum sit amet. Fusce laoreet luctus ultrices.
                Maecenas congue fringilla mollis. Etiam consequat ornare bibendum.<br><br>

                Quisque vehicula mattis ligula in iaculis. Vestibulum venenatis sit amet elit efficitur feugiat.
                Pellentesque elementum eget nibh in tristique. Aenean vitae est quis dolor laoreet gravida eu ut
                libero. Fusce feugiat luctus dui, vel accumsan purus placerat vel. In ac tincidunt nulla, id interdum
                dolor. Sed sed massa mauris. Suspendisse vestibulum dignissim luctus. Aenean nec ante a ligula
                tristique ornare. Etiam ligula elit, interdum quis venenatis eu, tempus id mauris. Vivamus vel nulla
                ut nulla egestas pretium tincidunt nec nisi. Integer quis leo in arcu congue accumsan. Sed auctor
                lectus eu augue interdum commodo. Curabitur id dapibus eros. Phasellus tempus eros rutrum risus
                feugiat, ut gravida neque faucibus.<br>
                текст ' . $i,
                'tags' => implode(', ', $postTags),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
