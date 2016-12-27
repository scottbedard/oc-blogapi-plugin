<?php namespace Bedard\BlogApi\Repositories;

use Bedard\BlogApi\Classes\QueryStringBuilder;
use Bedard\BlogApi\Models\Settings;
use RainLab\Blog\Models\Post;

class PostRepository
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
     * Cache a query.
     *
     * @param  $query
     * @return void
     */
    protected function cache(&$query)
    {
        $cache = Settings::cache();

        if ($cache !== false) {
            $query->remember($cache);
        }
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
        $query = Post::isPublished()->whereSlug($slug);
        $this->builder->with($query, $params);
        $this->builder->select($query, $params);
        $this->cache($query);

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
        // count the total posts
        $totalQuery = Post::isPublished();
        $this->cache($totalQuery);
        $total = $totalQuery->count();

        // fetch posts
        $postsQuery = Post::isPublished();
        $this->builder->with($postsQuery, $params);
        $this->builder->select($postsQuery, $params);
        $this->builder->skip($postsQuery, $params);
        $this->builder->take($postsQuery, $params, $total);
        $this->builder->orderBy($postsQuery, $params);
        $this->cache($postsQuery);
        $posts = $postsQuery->get();

        return [ 'total' => $total, 'posts' => $posts ];
    }
}
