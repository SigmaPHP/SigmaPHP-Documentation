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
    public function __construct($dbConnection) {
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
    public function getCategoryID($name) {
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
                [
                    'category_id' => $this->getCategoryID('introduction'),
                    'content' => container('view')->render(
                        'docs/v0_1_x/getting_started/introduction'
                    ),
                    'tags' => 'php framework,mvc architecture,dependency injection,web development'
                ],
            ]
        );
    }
}
