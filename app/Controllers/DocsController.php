<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Version;
use App\Models\Page;
use SigmaPHP\Core\Controllers\BaseController;

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
     * @param string $version
     * @param string $category
     * @return Response
     */
    public function __invoke($version, $category)
    {
        $versions = $this->versionModel->all();
        $currentVersion = $this->versionModel->findBy('name', $version);

        if (empty($currentVersion)) {
            return $this->render('errors.404', [], 404);
        }

        $categories = $currentVersion->categories();
        $currentCategory = array_filter($categories,
            function ($cat) use ($category) {
                return $cat->urlName() == $category;
            });

        if (empty($currentCategory)) {
            return $this->render('errors.404', [], 404);
        }

        $page = array_values($currentCategory)[0]->page() ?? null;

        // organize categories into hierarchy
        $hierarchy = [];

        foreach (array_filter($categories, function ($category) {
            return $category->parent_id == 0;
        }) as $category) {
            $hierarchy[] = $category;

            foreach (array_filter($categories, function ($sub) use ($category) {
                return $sub->parent_id == $category->id;
            }) as $subCategory) {
                $hierarchy[] = $subCategory;
            }
        }

        return $this->render('docs', compact('versions', 'hierarchy', 'page'));
    }
}
