## Strong Minds Form Generator

### About Project
This is a form generator built with PHP in the backend and Javascript on the frontend  

I have used the Laravel framework to handle the backend and vue.js to hand frontend interactivity 

### Requirements to install and run this project
1. PHP >= 8.0
2. Node >= 16.17
3. Composer >=2.5
4. npm >= 8.15

### Steps to install/deploy

- Clone this repository [allandereal / strongminds-test](https://github.com/allandereal/strongminds-test.git)
- Then run the following commands
1. `cd strongminds-test`
2. `composer update`
3. `npm update`
4. `cp .env.exaple .env`
5. Create a database named strongminds
6. Chang the `DB_DATABASE` and `DB_PASSWORD` to match your new database credentials
7. `php artisan migrate --seed`
8. `php artisan serve`

Finally, visit [http://127.0.0.1:8000](http://127.0.0.1:8000) to view the application
