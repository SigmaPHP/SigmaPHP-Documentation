<?php

use SigmaPHP\DB\Seeders\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $version = 1;
        $index = 1;

        // Exception for the 80 characters line length !!
        $this->insert(
            'categories',
            [
                ['name' => 'Getting Started', 'version_id' => $version, 'parent_id' => 0],
                ['name' => 'Routing', 'version_id' => $version, 'parent_id' => 0],
                ['name' => 'HTTP', 'version_id' => $version, 'parent_id' => 0],
                ['name' => 'Views', 'version_id' => $version, 'parent_id' => 0],
                ['name' => 'Database', 'version_id' => $version, 'parent_id' => 0],
                ['name' => 'ORM', 'version_id' => $version, 'parent_id' => 0],
                ['name' => 'Dependency Injection', 'version_id' => $version, 'parent_id' => 0],
                ['name' => 'Misc', 'version_id' => $version, 'parent_id' => 0],

                // Getting Started
                ['name' => 'Introduction', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Installation', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Configurations', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Directory Structure', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Deployment', 'version_id' => $version, 'parent_id' => $index],

                // Routing
                ['name' => 'Basic Routes', 'version_id' => $version, 'parent_id' => ++$index],
                ['name' => 'Middlewares', 'version_id' => $version, 'parent_id' => $index],

                // HTTP
                ['name' => 'Controllers', 'version_id' => $version, 'parent_id' => ++$index],
                ['name' => 'Cookies', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Session', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Files', 'version_id' => $version, 'parent_id' => $index],

                // Views
                ['name' => 'Rendering View', 'version_id' => $version, 'parent_id' => ++$index],
                ['name' => 'Template Syntax', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Static Assets', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Shared Variables', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Custom Directive', 'version_id' => $version, 'parent_id' => $index],

                // Database
                ['name' => 'Query Builder', 'version_id' => $version, 'parent_id' => ++$index],
                ['name' => 'Migrations', 'version_id' => $version, 'parent_id' => $index],
                ['name' => 'Seeders', 'version_id' => $version, 'parent_id' => $index],

                // ORM
                ['name' => 'Models', 'version_id' => $version, 'parent_id' => ++$index],
                ['name' => 'Relations', 'version_id' => $version, 'parent_id' => $index],

                // Dependency Injection
                ['name' => 'Service Providers', 'version_id' => $version, 'parent_id' => ++$index],

                // Misc
                ['name' => 'Helpers', 'version_id' => $version, 'parent_id' => ++$index],
                ['name' => 'CLI', 'version_id' => $version, 'parent_id' => $index],
            ]
        );
    }
}
