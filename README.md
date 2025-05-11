# Laravel Authentication with Role-Based Access & API

This is a Laravel project that implements user authentication, role-based access control, and API authentication using **Sanctum**. The project includes:

* User registration and login API with roles (Admin, User).
* Role-based access control for both web and API routes.
* Postman collection for API testing.

## Prerequisites

Before setting up the project locally, ensure that you have the following installed on your system:

* PHP 8.1 or higher
* Composer
* Laravel 10 or higher
* MySQL or any other supported database
* Node.js and npm (for frontend assets, if applicable)

### Install Dependencies

Clone this repository to your local machine:

```bash
git clone https://github.com/Hannanazam/authentication-task-app
cd authentication-task-app
```

### Setup Environment Variables

1. **Copy `.env.example` to `.env`**:

```bash
cp .env.example .env
```

2. **Update `.env` with your local configuration**:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

APP_KEY=base64:yourAppKey
```

> To generate the `APP_KEY`, run:

```bash
php artisan key:generate
```

### Install Composer Dependencies

Run the following command to install the required PHP dependencies:

```bash
composer install
```

### Install NPM Dependencies (Optional)

If your project includes frontend assets, install the JavaScript dependencies:

```bash
npm install
```

If you need to compile assets, run:

```bash
npm run dev
```

### Run Migrations

Run the migrations to set up the database:

```bash
php artisan migrate
```

This will create the necessary tables for users, roles, and authentication.

### Seed Database (Optional)

To populate the database with sample data, including default roles and users, you can run:

```bash
php artisan db:seed
```

---

## API Authentication Setup with Sanctum

1. **Install Sanctum**:

```bash
composer require laravel/sanctum
```

2. **Publish Sanctum's Configuration**:

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

3. **Run the Sanctum Migrations**:

```bash
php artisan migrate
```

---

## Using the Application

### API Endpoints

The following API endpoints are available:

* **POST /api/auth/register** – Register a new user.
* **POST /api/auth/login** – Login a user and receive an API token.
* **POST /api/auth/logout** – Log out and invalidate the API token.
* **GET /api/auth/user** – Retrieve the authenticated user's details.
* **GET /api/user/data** – Retrieve the user's data.
* **GET /api/user/admin** – Retrieve the admin's data.

#### Example POST Request: Register a New User

```json
POST /api/auth/register
{
  "name": "Hannan",
  "email": "hannan@gmail.com",
  "password": "12345678",
  "role": "User"
}
```

#### Example POST Request: Login a User

```json
POST /api/auth/login
{
  "email": "hannan@gmail.com",
  "password": "12345678"
}
```

---

### Postman Collection

A **Postman collection** is provided in the **foot directory** for testing the API endpoints. You can import the collection to your Postman client:

1. Open Postman.
2. Click on **Import**.
3. Select **Folder** and navigate to the `foot` directory.
4. Import the collection for testing.

---

## Role-Based Access

The system uses **Spatie Laravel Permission** to manage roles and permissions. The two roles implemented are:

* **Admin**
* **User**

Upon registration, the user is assigned the role as specified in the registration request (`role` field). Admin users have access to `/admin/dashboard`, while regular users have access to `/user/dashboard`.

### Role Middleware

Routes are protected based on roles:

* **/admin/dashboard** is protected by `role:Admin`.
* **/user/dashboard** is protected by `role:User`.

If a user tries to access a route that they are not authorized to, a `403 Forbidden` error will be returned.

---

## Running the Application Locally

1. **Start Laravel Development Server**:

```bash
php artisan serve
```

This will start the development server at `http://127.0.0.1:8000`.

2. **Access the application in your browser**:

   * For Admin Dashboard: `http://127.0.0.1:8000/admin/dashboard`
   * For User Dashboard: `http://127.0.0.1:8000/user/dashboard`

---

## Troubleshooting

* **If you face any issues with Sanctum authentication**:

  * Make sure you’re correctly sending the `Authorization` header with `Bearer <token>` for protected routes.
  * Clear the session and cookies if there's any caching issue.
  * Check your `php.ini` file to ensure `curl` is enabled for making requests.

---

## Conclusion

This project demonstrates a simple but robust authentication system using Laravel, Sanctum, and role-based access control. The included Postman collection helps in testing the API endpoints efficiently.

If you have any questions or need help, feel free to open an issue or reach out!