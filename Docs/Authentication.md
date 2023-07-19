# Token-Based Authentication.
login backend system implemented in PHP and MySQL. It follows best practices, uses Object-Oriented Programming (OOP), and is Composer compatible. The system provides token-based authentication to allow users to log in securely

----

### How it works
- Users log in with their credentials (username and password).
- Upon successful login, a token is generated and stored as an HTTP-only cookie.
 -The token is included in subsequent requests automatically via the cookie.
 -The middleware.php file validates the token and authorizes access to protected pages.

 ### Features
- Create a database if it does not exist.
- Create a necesary tables if they does not exist.
- Create a new user.
- Delete an existing user.
- Add / Modify user attributes.
- Change user password.
- Set session timeout.
- Change session timeout.
- Token based auth.