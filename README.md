# Store Randomuser Api Responses

This is a Laravel 8 project which periodically receiving random user and storing it to database with models.

### Usage

In this project we're using Queue and Schedule features. For this you need two different terminals and you must execute these commands in each terminal:

```
php artisan queue:work       # terminal 1
php artisan schedule:work    # terminal 2
```

You need redis server and php-redis extension for using queue.

Example screenshot:

![](https://image.nixarsoft.com/di/R4JQ/Screen_Shot_2021-01-15_at_17.png)


