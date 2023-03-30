# Welcome

Complated test task

### Main Features

 - List of branches
 - Add new branch
 - Assign stuff at branch
 - Lists branch and stuff details based on Branch ID (ASC by occupation)

### How to use it

1. `git clone https://github.com/just-Luka/test-task.git`
2. Go to the folder and execute `composer install && cp .env.example .env`
3. Set up `.env` configuration for your database
4. Run `php artisan migrate` (Optionaly you can also use `php artisan db:seed` to seed data)
5. For preapeared data, go to README folder and upload `test_task.sql` to your database
6. Go to README and use `swagger.yml` for endpoints
