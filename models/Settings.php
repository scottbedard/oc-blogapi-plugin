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
            'cache' => 'integer|min:0',
        ];

    /**
     * Minutes to cache results.
     *
     * @return integer|boolean
     */
    public static function cache()
    {
        $cache = trim(self::get('cache'), '');

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
