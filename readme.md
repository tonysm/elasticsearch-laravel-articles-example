## Introduction

This repo is part of this [blog post](https://blog.madewithlove.be/post/integrating-elasticsearch-with-your-laravel-app/).

### Running

- run `docker-compose up -d` (wait for elasticsearch to boot, you can check localhost:9200 to see if its up)
- run `docker-compose run cli /bin/bash` to get the shell
- run `cd /usr/src/myapp` inside the CLI container shell
- run `touch database/database.sqlite` to create the sqlite file
- run `php artisan migrate --seed` inside the CLI container shell
- open your browser in `localhost:8000` and you will see a list of all the posts
- open your browser in `localhost:8000/search?query=rerum` and you will see a list of all the posts with "rerum" in the title or body