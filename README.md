## File Management System Final

run the project by following steps
1. git clone https://github.com/SaddamDeveloper/FileManagementSystemFinal.git
2. cd FileManagementSystemFinal
3. npm install
4. composer update
5. rename .env.example file as .env file
6. open .env file change the dbname as 'fms', username 'root', password leave blank
7. run command 'php artisan key:generate'
8. open phpmyadmin by going http://localhost/phpmyadmin create database 'fms'
9. import the 'fms.sql' file
10. run command 'php artisan serve'

11. run 'php artisan jwt:secret' and 'php artisan cache:clear' if any error of login








### important links 
https://medium.com/@ripoche.b/create-a-spa-with-role-based-authentication-with-laravel-and-vue-js-ac4b260b882f





## Screenshot
![FileManagementSytem](https://user-images.githubusercontent.com/36893768/60245567-7ed9b480-98da-11e9-843c-fb7c49bb3cf0.JPG)


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
