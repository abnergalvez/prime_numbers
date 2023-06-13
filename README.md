# Descending Prime Numbers API 🏷️ [1.0.0]

API developed in Lumen PHP, which returns prime numbers up to 2 (descending) from a given integer parameter, which must be equal to or greater than 3 .

This application is partly made by applying hexagonal architecture.It is developed from the domain including a service (core\Domain\Service). This will allow decoupling of the logic and run unit testing.

**QUICK USAGE** : desc_prime_numbers/{ maxNumber }

## 📦 Installation

There are two ways to run the application:

**A) Server integrated in Application:**

- Download the complete directory.

- With Composer installed run the following command (inside the application directory):
    ```bash
    composer install
    ```

- Run the application with the following command:
    ```bash
    php -S localhost:8000 -t public
    ```

- Access http://localhost:8000/



**B) Run a Docker Container**

- Download the complete directory.

- With Docker installed run the following commands (inside the application directory):
    ```bash
    docker-compose up
    ```

- Access http://localhost:8000/


## 💻 Usage

The interaction is through an API and also the error information.


| **Method** | **Route** | **Description** |
|:----------|:----------|:----------|
| GET | desc_prime_numbers/{ maxNumber } | In the Parameter "maxNumber" you must enter an integer from 3, which will give as a result the list of numbers found in JSON.  |

- The format of the response is: {numbers: [2, 3, 5, ...]}
- The format of the error is: {error: "message"}

## 🧪 Teststing

The Unit tests are written in PHPunit format in the file: tests/Unit/Domain/Service/PrimeNumbersTest.php
 three were created:

- Find descending HAPPY PATH
- Find descending invalid max number UNHAPPY PATH
- Find descending number max number is lower than the minimum UNHAPPY PATH

Controller tests (N2N) were also written (test/ControllerTest.php)

- Base endpoint returns a successful status HAPPY PATH
- Endpoint when parameter is letter UNHAPPY PATH
- Endpoint without parameter or not found route
- Full HAPPY PATH

to run all tests must be executed in the project:

```bash
.\vendor\bin\phpunit --testdox 
```

## 👥 Authors

Abner Galvez C., using PHP Lumen

## 🛠️ Project status

Completed, awaiting review.

