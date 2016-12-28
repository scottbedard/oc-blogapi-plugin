<?php namespace Bedard\BlogApi\Api;

use Bedard\BlogApi\Repositories\CategoryRepository;
use Illuminate\Routing\Controller;
use Response;

class CategoriesController extends Controller
{
    /**
     * List categories.
     *
     * @param  CategoryRepository           $repository
     * @return array
     */
    public function index(CategoryRepository $repository)
    {
        $params = input();
        $posts = $repository->get($params);

        return Response::make($posts, 200);
    }

    /**
     * Find a category.
     *
     * @param  CategoryRepository           $repository
     * @param  string                       $slug
     * @return \RainLab\Blog\Models\Post
     */
    public function show(CategoryRepository $repository, $slug)
    {
        $params = input();
        $post = $repository->find($slug, $params);

        return Response::make($post, 200);
    }
}
