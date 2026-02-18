<?php

use SigmaPHP\DB\Seeders\Seeder;

class PageSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->insert(
            'pages',
            [
                [
                    'category_id' => 9,
                    'content' => require(
                        'content/getting_started/introduction.php'
                    ),
                    'tags' => ''
                ],
            ]
        );
    }
}
