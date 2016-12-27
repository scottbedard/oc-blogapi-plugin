<?php namespace Bedard\BlogApi\Api;

use Bedard\BlogApi\Repositories\PostRepository;
use Illuminate\Routing\Controller;
use Response;

class PostsController extends Controller
{
    /**
     * List posts.
     *
     * @return array
     */
    public function index(PostRepository $repository)
    {
        $params = input();
        $posts = $repository->get($params);

        return Response::make($posts, 200);
    }

    /**
     * Find a post.
     *
     * @param  PostRepository               $repository
     * @param  string                       $slug
     * @return \RainLab\Blog\Models\Post
     */
    public function show(PostRepository $repository, $slug)
    {
        $params = input();
        $post = $repository->find($slug, $params);

        return Response::make($post, 200);
    }
}
