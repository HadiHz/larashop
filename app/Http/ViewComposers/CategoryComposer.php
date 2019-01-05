<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public $categoryList = [];
    /**
     * Create a category composer.
     *
     * @return void
     */
    public function __construct()
    {
        $categories = Category::all()->groupBy('parent_id');
        $categories['root'] = $categories[''];
        unset($categories['']);
        $this->categoryList = $categories;
//        dd($this->categoryList);
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categoryList);
    }
}