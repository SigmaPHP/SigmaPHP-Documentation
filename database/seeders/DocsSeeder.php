<?php

require __DIR__ . '/v0.1.x/VersionSeeder.php';
require __DIR__ . '/v0.1.x/CategorySeeder.php';
require __DIR__ . '/v0.1.x/PageSeeder.php';

use SigmaPHP\DB\Seeders\Seeder;

class DocsSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        (new VersionSeeder($this->db()))->run();
        (new CategorySeeder($this->db()))->run();
        (new PageSeeder($this->db()))->run();
    }
}
