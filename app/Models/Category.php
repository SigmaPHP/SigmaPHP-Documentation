<?php

namespace App\Models;

use SigmaPHP\Core\Models\BaseModel;
use App\Models\Version;
use App\Models\Page;

class Category extends BaseModel
{
    /**
     * Get this category's version.
     *
     * @return Version|null
     */
    public function version()
    {
        return $this->hasRelation(
            Version::class,
            'id',
            'version_id',
        )[0] ?? null;
    }

    /**
     * Get the documentation page in this category.
     *
     * @return Page|null
     */
    public function page()
    {
        return $this->hasRelation(
            Page::class,
            'category_id',
            'id'
        )[0] ?? null;
    }

    /**
     * Format URL name.
     *
     * @return string
     */
    public function urlName()
    {
        return str_replace(' ', '_', strtolower($this->name));
    }
}
