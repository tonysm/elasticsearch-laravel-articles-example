<?php

namespace App\Search;

trait Searchable
{
    public static function bootSearchable()
    {
        // We could check some config to see if elasticsearch is enabled
        // here. It is useful when in test mode or using some kind of
        // feature flags and you have to turn off your ES cluster.
        static::observe(app(ElasticsearchObserver::class));
    }

    public function getSearchIndex()
    {
        return $this->getTable();
    }

    public function getSearchType()
    {
        if (property_exists($this, 'useSearchType')) {
            return $this->useSearchType;
        }

        return $this->getTable();
    }

    public function toSearchArray()
    {
        return $this->toArray();
    }
}
