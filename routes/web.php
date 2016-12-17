<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return \App\Article::all();
});

Route::get('search', function (\Elasticsearch\Client $search) {
    $instance = new \App\Article();

    $searchResult = $search->search([
        'index' => $instance->getSearchIndex(),
        'type' => $instance->getSearchType(),
        'body' => [
            'query' => [
                'multi_match' => [
                    'query' => request('query'),
                    'fields' => ['title', 'body'],
                ],
            ],
        ],
    ]);

    $ids = array_pluck($searchResult['hits']['hits'], '_id');

    if (empty($ids)) {
        return response()->json([]);
    }

    return \App\Article::find($ids);
});
