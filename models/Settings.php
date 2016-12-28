<?php namespace Bedard\BlogApi\Models;

use Model;

/**
 * Api Settings Model.
 */
class Settings extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var array   Behaviors
     */
    public $implement = ['System.Behaviors.SettingsModel'];

    /**
     * @var string  Settings code
     */
    public $settingsCode = 'bedard_blog_api';

    /**
     * @var string  Settings fields
     */
    public $settingsFields = 'fields.yaml';


    /**
     * @var array Validation
     */
    public $rules = [
        'cache_categories' => 'integer|min:0',
        'cache_category' => 'integer|min:0',
        'cache_post' => 'integer|min:0',
        'cache_posts' => 'integer|min:0',
    ];

    /**
     * Get the minutes to cache a list of categories.
     *
     * @return int|boolean
     */
    public static function cacheCategories()
    {
        return self::getCache('cache_categories');
    }

    /**
     * Get the minutes to cache a category.
     *
     * @return int|boolean
     */
    public static function cacheCategory()
    {
        return self::getCache('cache_category');
    }

    /**
     * Get the minutes to cache a post.
     *
     * @return int|boolean
     */
    public static function cachePost()
    {
        return self::getCache('cache_post');
    }

    /**
     * Get the minutes to cache a list of posts.
     *
     * @return int|boolean
     */
    public static function cachePosts()
    {
        return self::getCache('cache_post');
    }

    /**
     * Get a cache value.
     *
     * @return integer|boolean
     */
    protected static function getCache($field)
    {
        $cache = trim(self::get($field), '');

        return strlen($cache) > 0 ? (int) $cache : false;
    }

    /**
     * Determine if the API is enabled.
     *
     * @return boolean
     */
    public static function isEnabled()
    {
        return self::get('is_enabled', false);
    }
}
