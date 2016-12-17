<html>
    <head>
        <title>Articles</title>
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Articles
                    </div>
                    <div class="panel-body">
                        @forelse ($articles as $article)
                            <article>
                                <h2>{{ $article->title }}</h2>

                                <p>{{ $article->body }}</body>
                            </article>
                        @empty
                            <p>No articles found</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
