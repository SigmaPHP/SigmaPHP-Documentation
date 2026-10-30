<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Version;
use App\Models\Page;
use SigmaPHP\Core\Controllers\BaseController;
use SigmaPHP\Core\Http\Request;
use SigmaPHP\Core\Http\Response;

class DocsController extends BaseController
{
    /**
     * @var Version $versionModel
     */
    private $versionModel;

    /**
     * @var Category $categoryModel
     */
    private $categoryModel;

    /**
     * @var Page $pageModel
     */
    private $pageModel;

    /**
     * DocsController constructor.
     *
     * @param Version $versionModel
     * @param Category $categoryModel
     * @param Page $pageModel
     */
    public function __construct(
        Version $versionModel,
        Category $categoryModel,
        Page $pageModel
    ) {
        $this->versionModel = $versionModel;
        $this->categoryModel = $categoryModel;
        $this->pageModel = $pageModel;
    }

    /**
     * Docs pages.
     *
     * @param Request $request
     * @param string $version
     * @param string $category
     * @return Response
     */
    public function __invoke(Request $request, $version, $category)
    {
        $versions = $this->versionModel->all();
        $currentVersion = $this->versionModel->findBy('name', $version);

        if (empty($currentVersion)) {
            return $this->error(404);
        }

        $categories = $currentVersion->categories();

        // organize categories into hierarchy
        $hierarchy = [];

        foreach ($categories->filter(function ($category) {
            return $category->parent_id == 0;
        }) as $parentCat) {
            $hierarchy[] = $parentCat;

            foreach ($categories->filter(function ($sub) use ($parentCat)
            {
                return $sub->parent_id == $parentCat->id;
            }) as $subCategory) {
                $hierarchy[] = $subCategory;
            }
        }

        // handle search
        if ($category == 'search') {
            $searchResults = [];

            if (!$request->has('keyword')) {
                return $this->render(
                    'search',
                    compact('version', 'versions', 'hierarchy', 'searchResults')
                );
            }

            $categoryIds = $categories->map(function ($cat) {
                return $cat->id;
            });

            $categoryIds = rtrim(implode(',', $categoryIds->all()), ',');
            $keyword = $request->get('keyword');

            $statement = container('db')->query(<<<QUERY
                SELECT DISTINCT
                    c.name AS title,
                    REPLACE(LOWER(c.name), ' ', '_') AS slug,
                    LEFT(p.content, 200) AS description,
                    MATCH(p.content) AGAINST('$keyword') AS score
                FROM
                    pages AS p
                JOIN
                    categories AS c ON c.id = p.category_id
                WHERE
                    category_id IN ($categoryIds) AND
                    MATCH(p.content) AGAINST('$keyword') >= 0.9
                ORDER BY
                    score DESC;
            QUERY);

            $searchResults = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $this->render(
                'search',
                compact('version', 'versions', 'hierarchy', 'searchResults')
            );
        }

        $currentCategory = $categories->filter(function ($cat) use ($category) {
            return $cat->urlName() == $category;
        });

        if (empty($currentCategory)) {
            return $this->error(404);
        }

        $page = $currentCategory->first()->page() ?? null;

        if (empty($page)) {
            return $this->error(404);
        }

        // !! For Testing Only !!
        // $page->content = $this->renderView(
        //     'docs/v0_1_x/getting_started/configurations',
        //     compact('version', 'versions', 'hierarchy', 'page')
        // );

        $versions = $versions->all();

        return $this->render(
            'docs',
            compact('version', 'versions', 'hierarchy', 'page')
        );
    }
}
