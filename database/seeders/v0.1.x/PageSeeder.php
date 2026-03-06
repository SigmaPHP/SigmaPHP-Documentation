<?php

use SigmaPHP\DB\Seeders\Seeder;

class PageSeeder extends Seeder
{
    /**
     * @var array $categories
     */
    private $categories;

    /**
     * PageSeeder Constructor
     *
     * @param \PDO $dbConnection
     */
    public function __construct($dbConnection)
    {
        parent::__construct($dbConnection);

        $currentVersion = "'0.1.x'";
        $versionDetails = $this->fetch(
            'SELECT * FROM versions WHERE name = ' . $currentVersion
        );

        if (empty($versionDetails)) {
            throw new \Exception("Version {$currentVersion} is not found !");
        }

        $version = $versionDetails['id'];

        $this->categories = $this->fetchAll(<<<QUERY
            SELECT
                id, name
            FROM
                categories
            WHERE
                version_id = {$version}
            QUERY
        );
    }

    /**
     * Get category's id by name.
     *
     * @param string $name
     * @return int
     */
    public function getCategoryID($name)
    {
        return array_values(
            array_filter($this->categories, function ($category) use ($name) {
                return $category['name'] ==
                    ucwords(str_replace('_', ' ', $name));
            })
        )[0]['id'] ?? null;
    }

    /**
     * @return void
     */
    public function run()
    {
        // Exception for the 80 characters line length rule !!
        $this->insert(
            'pages',
            [
                // Getting Started
                [
                    'category_id' => $this->getCategoryID('introduction'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/getting_started/introduction'
                    ),
                    'tags' => 'sigmaphp,php framework,mvc architecture,dependency injection,web development'
                ],
                [
                    'category_id' => $this->getCategoryID('installation'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/getting_started/installation'
                    ),
                    'tags' => 'sigmaphp,php framework,composer,getting started,installation'
                ],
                [
                    'category_id' => $this->getCategoryID('configurations'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/getting_started/configurations'
                    ),
                    'tags' => 'sigmaphp,php framework,getting started,configurations'
                ],
                [
                    'category_id' => $this->getCategoryID('directory_structure'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/getting_started/directory_structure'
                    ),
                    'tags' => 'sigmaphp,php framework,getting started,directory_structure'
                ],
                [
                    'category_id' => $this->getCategoryID('deployment'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/getting_started/deployment'
                    ),
                    'tags' => 'sigmaphp,php framework,getting started,deployment,apache,nginx'
                ],

                // Routing
                [
                    'category_id' => $this->getCategoryID('basic_routes'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/routing/basic_routes'
                    ),
                    'tags' => 'sigmaphp,php framework,routing,middlewares'
                ],
                [
                    'category_id' => $this->getCategoryID('middlewares'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/routing/middlewares'
                    ),
                    'tags' => 'sigmaphp,php framework,routing,middlewares'
                ],

                // HTTP
                [
                    'category_id' => $this->getCategoryID('controllers'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/http/controllers'
                    ),
                    'tags' => 'sigmaphp,php framework,http,controllers,request,response'
                ],
                [
                    'category_id' => $this->getCategoryID('cookies'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/http/cookies'
                    ),
                    'tags' => 'sigmaphp,php framework,http,cookies'
                ],
                [
                    'category_id' => $this->getCategoryID('sessions'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/http/sessions'
                    ),
                    'tags' => 'sigmaphp,php framework,http,sessions'
                ],
                [
                    'category_id' => $this->getCategoryID('files'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/http/files'
                    ),
                    'tags' => 'sigmaphp,php framework,http,files'
                ],

                // Views
                [
                    'category_id' => $this->getCategoryID('creating_templates'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/views/creating_templates'
                    ),
                    'tags' => 'sigmaphp,php framework,views,templates,html,creating templates'
                ],
                [
                    'category_id' => $this->getCategoryID('template_syntax'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/views/template_syntax'
                    ),
                    'tags' => 'sigmaphp,php framework,views,templates,html,templates syntax,for,if,blocks'
                ],
                [
                    'category_id' => $this->getCategoryID('static_assets'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/views/static_assets'
                    ),
                    'tags' => 'sigmaphp,php framework,views,templates,html,static assets,css,js,javascript,files,images'
                ],
                [
                    'category_id' => $this->getCategoryID('shared_variables'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/views/shared_variables'
                    ),
                    'tags' => 'sigmaphp,php framework,views,templates,html,shared variables'
                ],
                [
                    'category_id' => $this->getCategoryID('custom_directives'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/views/custom_directives'
                    ),
                    'tags' => 'sigmaphp,php framework,views,templates,html,custom directives'
                ],
                [
                    'category_id' => $this->getCategoryID('error_pages'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/views/error_pages'
                    ),
                    'tags' => 'sigmaphp,php framework,views,templates,html,error pages,404,500'
                ],

                // Routing
                [
                    'category_id' => $this->getCategoryID('basic_routes'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/routing/basic_routes'
                    ),
                    'tags' => 'sigmaphp,php framework,routing,middlewares'
                ],
                [
                    'category_id' => $this->getCategoryID('middlewares'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/routing/middlewares'
                    ),
                    'tags' => 'sigmaphp,php framework,routing,middlewares'
                ],

                // Database
                [
                    'category_id' => $this->getCategoryID('query_builder'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/database/query_builder'
                    ),
                    'tags' => 'sigmaphp,php framework,database,query builder,sql'
                ],

                [
                    'category_id' => $this->getCategoryID('migrations'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/database/migrations'
                    ),
                    'tags' => 'sigmaphp,php framework,database,migrations,schema'
                ],

                [
                    'category_id' => $this->getCategoryID('seeders'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/database/seeders'
                    ),
                    'tags' => 'sigmaphp,php framework,database,seeders,data seeding'
                ],


                // ORM
                [
                    'category_id' => $this->getCategoryID('models'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/orm/models'
                    ),
                    'tags' => 'sigmaphp,php framework,orm,models,active record'
                ],

                [
                    'category_id' => $this->getCategoryID('relations'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/orm/relations'
                    ),
                    'tags' => 'sigmaphp,php framework,orm,relations,model relationships'
                ],


                // Dependency Injection
                [
                    'category_id' => $this->getCategoryID('service_providers'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/dependency_injection/service_providers'
                    ),
                    'tags' => 'sigmaphp,php framework,dependency injection,service providers,container'
                ],


                // Misc
                [
                    'category_id' => $this->getCategoryID('helpers'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/misc/helpers'
                    ),
                    'tags' => 'sigmaphp,php framework,helpers,utility functions'
                ],

                [
                    'category_id' => $this->getCategoryID('cli'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/misc/cli'
                    ),
                    'tags' => 'sigmaphp,php framework,cli,command line,console'
                ],
            ]
        );
    }
}
