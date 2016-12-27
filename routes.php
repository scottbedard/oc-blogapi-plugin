<?php

Route::group(['middleware' => '\Bedard\BlogApi\Classes\ApiMiddleware'], function () {

    Route::resource('api/rainlab/blog/posts', 'Bedard\BlogApi\Api\PostsController');

});
