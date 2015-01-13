## Laravel PHP Framework

#Apache configuration
    <VirtualHost *:80>
        ServerAdmin admin@jobsitychallenge.com
        DocumentRoot var/www/jobsitychallenge/diegognt/public
        ServerName diegognt.jobsitychallenge.com
    </VirtualHost>

## Instalation

###Clone the repository
Clone the repository:
  
    git clone https://github.com/diegognt/laravel-challenge.git
    
Rename the folder to `diegognt`

###Install Laravel an dependencies
Change to the project folder (`diegognt`) and execute composer:

    composer install

In addition, clear the cache files:

    php artisan cache:clear
        
###migrate the database

Edit `app/config/database.php` and put the correct value for the database

Use the follow artisan command to create the create the database tables a dummy data
    
    php artisan migrate --seed
        
     

###Install assets

For CSS and JS libraries

After that you should go to public/ folder and make sure to have [node.js](http://nodejs.org/) and [Bower](http://bower.io/#install-bower) installed, after that execute

    bower install

If you have a problem, contact me
### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
