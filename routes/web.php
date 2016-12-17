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
    return view('articles.index', ['articles' => App\Article::paginate()]);
});

Route::get('search', function (Elasticsearch\Client $search) {
    $instance = new App\Article();

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

    $articles = empty($ids) ? collect() : App\Article::whereIn('id', $ids)->paginate();

    return view('articles.index', ['articles' => $articles]);
});
