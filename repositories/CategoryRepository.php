<?php namespace Bedard\BlogApi\Repositories;

use Bedard\BlogApi\Classes\QueryStringBuilder;
use Bedard\BlogApi\Models\Settings;
use RainLab\Blog\Models\Category;

class CategoryRepository
{
    /**
     * @var \Bedard\BlogApi\Classes\QueryStringBuilder
     */
    protected $builder;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->builder = new QueryStringBuilder;
    }

    /**
     * Find a post.
     *
     * @param  stirng                                               $slug
     * @param  array                                                $params
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return \RainLab\Blog\Models\Post
     */
    public function find($slug, array $params = [])
    {
        $query = Category::whereSlug($slug);
        $this->builder->with($query, $params);
        $this->builder->select($query, $params);
        $this->builder->cache($query, Settings::cacheCategory());

        return $query->firstOrFail();
    }

    /**
     * List posts.
     *
     * @param  array    $params
     * @return array
     */
    public function get(array $params = [])
    {
        $cache = Settings::cacheCategories();

        // count the total categories
        $totalQuery = (new Category)->newQuery();
        $this->builder->cache($totalQuery, $cache);
        $total = $totalQuery->count();

        // fetch categories
        $categoriesQuery = (new Category)->newQuery();
        $this->builder->with($categoriesQuery, $params);
        $this->builder->select($categoriesQuery, $params);
        $this->builder->skip($categoriesQuery, $params);
        $this->builder->take($categoriesQuery, $params, $total);
        $this->builder->orderBy($categoriesQuery, $params);
        $this->builder->cache($categoriesQuery, $cache);
        $categories = $categoriesQuery->get();

        return [ 'total' => $total, 'categories' => $categories ];
    }
}
