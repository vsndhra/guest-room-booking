# Guest Room Booking

This is a Laravel project for managing guest room bookings for house owners.

## Execution

1. Prerequisites
   - PHP (version 8.2.0)
   - Composer (version 2.5.5)
   - Web server (e.g., Apache)
   - MySQL

2. Installation
   - Clone the repository or download the project source code.
   - Configure the environment variables by copying the `.env.example` file to `.env`:
     ```
     cp .env.example .env
     ```
     Update the necessary values in the `.env` file, such as database credentials and application settings.

3. Install Dependencies
   - Run the following command in the project root directory:
     ```
     composer install
     ```

4. Generate Application Key
   - Run the following command in the project root directory:
     ```
     php artisan key:generate
     ```

5. Database Migration
   - Run the database migrations to create the required database schema:
     ```
     php artisan migrate
     ```

6. Database Seeding (Optional)
   - If you want to seed the database with sample data, run the following command:
     ```
     php artisan db:seed
     ```

7. Start the Development Server
   - Run the following command to start the development server:
     ```
     php artisan serve
     ```
   - The application will be accessible at the specified URL (e.g., http://localhost:8000).

## Deployment

1. Set up Web Server
   - Configure your web server (e.g., Apache, Nginx) to host the Laravel application.
   - Set the document root to the `public` directory of your Laravel project.

2. Environment Configuration
   - Set up the necessary environment variables for your production environment in the `.env` file.

3. Optimize and Cache
   - Generate optimized and cached versions of the application assets and configuration:
     ```
     php artisan optimize
     php artisan config:cache
     ```

4. Database Configuration
   - Set up a database server and configure the database connection in the `.env` file.

5. Additional Configuration
   - Configure any necessary caching mechanisms, such as Redis or Memcached, to improve performance.
   - Set up any required background tasks, such as queue workers or scheduled tasks.

6. Deployment
   - Deploy the codebase to your production environment, ensuring file permissions are set correctly.

7. Monitor and Test
   - Monitor the application for any errors or issues.
   - Perform thorough testing to ensure proper functionality in the production environment.

