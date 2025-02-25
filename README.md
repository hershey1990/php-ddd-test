# PHP DDD Application

This is a PHP application built using Domain-Driven Design (DDD) principles. The application implements a user registration feature using Doctrine for database management.

## Project Structure

```
php-ddd-app
├── src
│   ├── Application
│   │   └── User
│   │       ├── Command
│   │       │   └── RegisterUserRequest.php
│   │       └── Handler
│   │           └── RegisterUserUseCase.php
│   ├── Domain
│   │   └── User
│   │       ├── Event
│   │       │   └── UserRegisteredEvent.php
│   │       ├── User.php
│   │       ├── UserRepositoryInterface.php
│   │       └── ValueObject
│   │           ├── Email.php
│   │           ├── Name.php
│   │           ├── Password.php
│   │           └── UserId.php
│   ├── Infrastructure
│   │   └── Doctrine
│   │       └── User
│   │           └── DoctrineUserRepository.php
│   ├── Presentation
│   │   └── User
│   │       └── RegisterUserController.php
│   └── bootstrap.php
├── tests
│   ├── Application
│   │   └── User
│   │       └── Handler
│   │           └── RegisterUserUseCaseTest.php
│   ├── Domain
│   │   └── User
│   │       ├── UserTest.php
│   │       └── ValueObjectsTest.php
│   ├── Infrastructure
│   │   └── Doctrine
│   │       └── User
│   │           └── DoctrineUserRepositoryTest.php
├── config
│   ├── doctrine.php
│   └── config.php
├── public
│   └── index.php
├── vendor
├── composer.json
├── Dockerfile
├── docker-compose.yml
├── Makefile
└── README.md
```

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   ```

2. Navigate to the project directory:
   ```
   cd php-ddd-app
   ```

3. Install dependencies using the Makefile:
   ```
   make install
   ```

4. Configure your database settings in `config/doctrine.php`.

## Usage

To register a new user, send a POST request to the `/register` endpoint with the following JSON payload:

```json
{
  "name": "John Doe",
  "email": "john.doe@example.com",
  "password": "securepassword"
}
```

## Running Tests

The tests are automatically executed when the Docker container is built. You can check the test results in the container logs.

## License

This project is licensed under the MIT License. See the LICENSE file for details.