# Token-Based Authentication.
login backend system implemented in PHP and MySQL. It follows best practices, uses Object-Oriented Programming (OOP), and is Composer compatible. The system provides token-based authentication to allow users to log in securely

----

### How it works
- Users log in with their credentials (username and password).
- Upon successful login, a token is generated and stored as an HTTP-only cookie.
- The token is included in subsequent requests automatically via the cookie.
- The middleware.php file validates the token and authorizes access to protected pages.

 ### Features
- User authentication using a username and password.
- Token-based authorization for stateless authentication.
- Generation and validation of tokens with configurable expiration time.
- Automatic deletion of old tokens when a new token is generated for the user.
- Password encryption for improved security.
- HTTP-only cookie usage to store and manage tokens on the client-side.
- Secure handling of user attributes in the database.
- Create a database if it does not exist.
- Create a necesary tables if they does not exist.
- Create a new user.
- Delete an existing user.
- Add / Modify / delete user attributes.
- Change user password.
- Set session timeout.
- Change session timeout.

### How to Use
1. Import the AuthController.php file into your project.
2. Create an instance of the AuthController class.
3. Use the login() method to authenticate a user based on their username and password. Upon successful login, a token is generated, and an HTTP-only cookie is set with the token.
4. Use the validateToken() method to validate the token when accessing protected pages or APIs.
5. Use the logout() method to log out a user, which deletes the token from the database and destroys the token cookie.

## Example Usage
```php
// Include the necesary dependencies
require_once 'src/Config/Database.php';
require_once 'src/Controllers/AuthController.php';

// Use 
use src\Controllers\AuthController;

// Instantiate the AuthController
$authController = new AuthController();

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $authController = new AuthController();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $authController->login($username, $password);

    if ($user) {
        print_r($user);
        // Successful login, token and cookie are generated.
        // Redirect to the protected page or handle the result accordingly
        header('Location: protected_page.php');
        exit();
    } else {
        // Handle login failure, show error message
        $errorMessage = 'Invalid username or password';
    }
}

// Handle user logout
if (isset($_GET['logout'])) {
    $authController->logout();
}

// Render the login form
include 'views/login.php';
```

## Methods

### Register(`$username`, `$password`, `$email `)
The `register()` method is responsible for adding a new user to the database with the provided username, password, and email.

Parameters:
- `$username` (string): The username of the new user.
- `$password` (string): The password of the new user.
- `$email` (string): The email address of the new user.

Usage:

```php
$authController = new AuthController();
$username = "newuser";
$password = "password123";
$email = "newuser@example.com";

$authController->register($username, $password, $email);
```
Upon successful insertion into the database, the method will handle success. In case of failure, appropriate actions can be taken.

### login(`$username`, `$password`)
The `register()` method is responsible for adding a new user to the database with the provided username, password, and email.

Parameters:
- `$username` (string): The username of the new user.
- `$password` (string): The password of the new user.

Usage:

```php
$authController = new AuthController();
$user = $authController->login('user123', 'password123');

if ($user) {
    // User login successful, access $user data
    // Redirect to protected page or handle success
} else {
    // User login failed, handle error (incorrect credentials)
}
```
### Logout()
The `logout()` method in the `AuthController` class allows users to log out of the system.

Usage:

```php
$authController = new AuthController();
$authController->logout();
```

Description:
- The method retrieves the user ID based on the token stored in the cookie.
- It then deletes the token from the database to ensure security.
- The token cookie is destroyed by setting an expired timestamp.
- After logging out, the user is redirected to the landing page (`Login::$LandingPageAfterLogout`).

### saveUserAttribute(`$userId`, `$key`, `$value`)

This method is used to save a new user attribute to the database.

Parameters:
- `$userId` (int): The ID of the user.
- `$key` (string): The attribute key (e.g., "email", "phone_number", etc.).
- `$value` (string): The attribute value.

Usage:
```php
$authController = new AuthController();
$userId = 123;
$key = 'email';
$value = 'user@example.com';
$authController->saveUserAttribute($userId, $key, $value);
```
### updateUserAttribute(`$userId`, `$key`, `$value`)
This method is used to update an existing user attribute in the database.

Parameters:
- `$userId` (int): The ID of the user.
- `$key` (string): The attribute key (e.g., "email", "phone_number", etc.).
- `$value` (string): The new attribute value.

Usage:
```php
$authController = new AuthController();
$userId = 123;
$key = 'email';
$newValue = 'newemail@example.com';
$authController->updateUserAttribute($userId, $key, $newValue);
```
#### Database Table
The user attributes are stored in the `user_attributes` table, which has the following structure:
| Column            | Type         | Description                                              |
|-------------------|--------------|----------------------------------------------------------|
| user_attribute_id | INT          | Primary key                                              |
| user_id           | INT          | Foreign key referencing users table (the ID of the user) |
| attribute_key     | VARCHAR(50)  | The attribute key                                        |
| attribute_value   | VARCHAR(255) | The attribute value                                      |

Please ensure that the `user_attributes` table is set up correctly to use the `saveUserAttribute()` and `updateUserAttribute()` methods.

Feel free to customize the methods and database table based on your specific requirements.

### isUserAttributeExists() Method

The `isUserAttributeExists()` method is a private function in the `AuthController` class. It is used to check if a specific attribute exists for a given user in the `user_attributes` table of the database.

Usage:

```php
$authController = new AuthController();
$authController->isUserAttributeExists($userId, $key);
```
Parameters:
- `$userId` (int): The ID of the user.
- `$key` (string): The attribute key (e.g., "email", "phone_number", etc.).

Return Value
- `true` if the attribute exists for the user.
- `false` if the attribute does not exist for the user.

### getUserById()

The `getUserById()` method is a function provided by the `AuthController` class that allows you to retrieve user information based on their user ID. This method takes a user ID as its parameter and queries the database to fetch the corresponding user's details.

Parameters
`$userId` (integer): The unique identifier of the user whose information you want to retrieve.

Return Value
The method returns an associative array containing the user's details if a matching user with the specified user ID is found in the database. The array includes information such as the user's ID, username, email, or any other attributes you may have stored in the database.

If no user with the provided user ID is found, the method returns null.

Example Usage
```php
$authController = new AuthController();
$userID = 123;

$userInfo = $authController->getUserById($userID);

if ($userInfo) {
    // User found, process the user details
    echo 'User ID: ' . $userInfo['id'] . '<br>';
    echo 'Username: ' . $userInfo['username'] . '<br>';
    echo 'Email: ' . $userInfo['email'] . '<br>';
    // ... other attributes
} else {
    echo 'User not found.';
}
```
### Dependecies
- src/Controllers/AuthController.php
- src/Config/Database.php
  - src/Models/User.php _(not to be included/required )_