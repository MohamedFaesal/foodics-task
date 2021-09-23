
## Matrix multiplication

Create a Laravel / Lumen application for Matrix multiplication. The app should feature a REST-API
with authentication.
<br />
The code must be pushed into a GitHub repo.

###Validation
For Matrix multiplication, the column count in the first matrix should be equal to the row count of
the second matrix. If this condition is not met, the app should throw a validation error.

###Resulting Matrix
The resulting matrix should contain characters rather than numbers, similar to excel columns.
<br/>
Examples: 1 => A, 26 => Z, 27 => AA, 28 => AB. 
<br/>
At least the calculation should be covered by tests.


### Installation

* Install <a href = "https://getcomposer.org/">composer </a>
* Clone the code
* Get inside the project
* Install dependencies
````
composer install
````
* Run testing
````
composer test
````
* Run api (check POST /api/matrix-multiplication)
````
php artisan serve
````
