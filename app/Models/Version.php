<?php

namespace App\Models;

use SigmaPHP\Core\Models\BaseModel;
use App\Models\Category;
use SigmaPHP\Collections\Collection;

class Version extends BaseModel
{
    /**
     * Get all documentation topics in this version.
     *
     * @return Collection<Category>
     */
    public function categories()
    {
        return $this->hasRelation(
            Category::class,
            'version_id',
            'id'
        );
    }
}
