## How To Use

-   Clone the repository with git clone
-   Copy **.env.example** file to **.env** and edit database credentials there
-   Run **composer install**
-   Run **php artisan key:generate**
-   In '\vendor\laravel\framework\src\Illuminate\Foundation\helpers.php' prepend "public/" to the \$path variable in asset() function.

```php
function  asset($path, $secure  =  null)

{

	return  app('url')->asset("public/".$path,  $secure);

}
```

-   Run **php artisan migrate**
-   Run **npm install**
-   Run **npm run dev**
-   That's it - load the homepage, use Register link and get goin

```

```
