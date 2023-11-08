
## Requirements
- Composer is required to initialize the application. You need to clone the repository and execute the following command in the root directory of the application:

~~~
composer install
~~~

## Execution
- Update your .env file with the necessary configurations (e.g. database and XML path to be downloaded). Sample XMLs are available below:

~~~
XML Demo URL 1: https://www.zzgtech.com/demo_data/products_2022_06_01.xml  
XML Demo URL 2: https://www.zzgtech.com/demo_data/products_2022_06_02.xml
~~~

- Execute the following command to make migrations in root directory of the project

~~~
php artisan migrate
~~~

- Execute the following command to download XML file

~~~
php artisan xml:download
~~~

- Execute the following command to sync data between XML file and database

~~~
php artisan xml:sync
~~~

## Future Work
Unit tests
