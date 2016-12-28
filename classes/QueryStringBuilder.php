<?php namespace Bedard\BlogApi\Classes;

use October\Rain\Database\Builder;

/**
 * Construct a database query from query string parameters
 */
class QueryStringBuilder
{
    /**
     * Cache a query.
     *
     * @param  \October\Rain\Database\Builder   $query
     * @param  int|bool                         $cache
     * @return void
     */
    public function cache(Builder &$query, $cache)
    {
        if ($cache) {
            $query->remember($cache);
        }
    }

    /**
     * Order a query.
     *
     * @param  \October\Rain\Database\Builder   $query
     * @param  array                            $params
     * @return void
     */
    public function orderBy(Builder &$query, array $params)
    {
        if (array_key_exists('order', $params)) {
            $order = explode(',', $params['order']);
            $column = $order[0];
            $direction = count($order) > 1 ? $order[1] : null;

            $query->orderBy($column, $direction);
        }
    }

    /**
     * Select columns.
     *
     * @param  \October\Rain\Database\Builder   $query
     * @param  array                            $params
     * @return void
     */
    public function select(Builder &$query, array $params)
    {
        if (array_key_exists('select', $params)) {
            $query->select(explode(',', $params['select']));
        }
    }

    /**
     * Skip rows.
     *
     * @param  \October\Rain\Database\Builder   $query
     * @param  array                            $params
     * @return void
     */
    public function skip(Builder &$query, array $params)
    {
        if (array_key_exists('skip', $params)) {
            $query->skip($params['skip']);
        }
    }

    /**
     * Take rows.
     *
     * @param  \October\Rain\Database\Builder   $query
     * @param  array                            $params
     * @param  int|string                       $total
     * @return void
     */
    public function take(Builder &$query, array $params, $total)
    {
        if (array_key_exists('take', $params)) {
            $query->take($params['take']);
        } else {
            $query->take($total);
        }
    }

    /**
     * Eager load relationships.
     *
     * @param  \October\Rain\Database\Builder   $query
     * @param  array                            $params
     * @return void
     */
    public function with(Builder &$query, array $params)
    {
        if (array_key_exists('with', $params)) {
            $query->with(explode(',', $params['with']));
        }
    }
}
