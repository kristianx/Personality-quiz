## Tech Stack

- Laravel 10
- Inertia JS
- Vue JS
- Pest for Unit Testing
  

## Install the app

- `cp .env.example .env`
- `composer install`
- `php artisan key:generate`
- `touch database/database.sqlite`
- `php artisan migrate --seed`
  

## Running the app in development

- `php artisan serve`
- `npm install && npm run dev`
  

## Unit testing

The application uses Pest PHP for Unit Testing.

Seeders are automatically run before each test that interacts with data. The database is refreshed before each test.

Tests are located in `tests/Unit`.

To run the tests, type the following command into the terminal:

`php artisan test`

Example response:
```
   PASS  Tests\Unit\EndpointTest
  ✓ results are returned by the controller  

   PASS  Tests\Unit\ResultTest
  ✓ outcome can be introvert     
  ✓ outcome can be extrovert    
  ✓ outcome is tied   

  Tests:    4 passed (16 assertions)
  Duration: 0.20s
```
