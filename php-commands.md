## I. Migration

##### 1. Create 

.$ php artisan make:migration add_uuid_to_users  


##### 2. Running

.$ php artisan migrate

.$ php artisan migrate:refresh
 
##### 3. Refresh the database and run all database seeds...
.$ php artisan migrate:refresh --seed

.$ php artisan migrate:refresh
 
/* Refresh the database and run all database seeds... */
.$ php artisan migrate:refresh --seed

##### 4. Rolling Back Migrations

.$ php artisan migrate --force

.$ php artisan migrate:rollback

.$ php artisan migrate:rollback --step=5

.$ php artisan migrate:reset


##### 5. Roll Back & Migrate Using A Single Command

.$ php artisan migrate:refresh
 
// Refresh the database and run all database seeds...
.$ php artisan migrate:refresh --seed




## II. Seeding

##### 1. Writing Seeders

.$ php artisan make:seeder UserSeeder

.$ php artisan db:seed --class=UserSeeder

.$ php artisan db:seed --force



## III. Middleware


##### 1. Defining Middleware

.$ php artisan make:middleware AuthMiddleware


## IV. Validation

##### 1. Form Request Validation

.$ php artisan make:request UpdateUserRequest