<?php

use SigmaPHP\DB\Seeders\Seeder;

class VersionSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->insert(
            'versions',
            [
                ['name' => '0.1.x'],
            ]
        );
    }
}
