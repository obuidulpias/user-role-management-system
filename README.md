Instruction for set up and run the project locally:

First Clone the Git Repository: git clone https://github.com/obuidulpias/user-role-management-system.git

Install Composer Dependencies: composer install

Create a .env file if it does not already exist. You can copy the .env.example

Set the database name: DB_DATABASE=user_role

Generate an Application Key: php artisan key:generate

Migrate the Database: php artisan migrate

For passport set up : php artisan passport:install

Finally run this command: php artisan serve 

The application will be accessible at http://127.0.0.1:8000

API Documentation and endpoints link : https://documenter.getpostman.com/view/12482884/2sAYBd67bb#intro
