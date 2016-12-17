<?php

namespace App\Search;

use Elasticsearch\Client;

class ElasticsearchObserver
{
    /**
     * @var \Elasticsearch\Client
     */
    private $search;

    public function __construct(Client $client)
    {
        $this->search = $client;
    }

    public function saved($model)
    {
        $this->search->index([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->id,
            'body' => $model->toArray(),
        ]);
    }

    public function deleted($model)
    {
        $this->search->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->id,
        ]);
    }
}