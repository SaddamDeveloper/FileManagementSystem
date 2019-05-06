## File Management System Final

run the project by following steps
1. git clone https://github.com/SaddamDeveloper/FileManagementSystemFinal.git
2. cd FileManagementSystemFinal
3. npm install
4. composer update
5. rename .env.example file as .env file
6. open .env file change the dbname as 'fms', username 'root', password leave blank
7. run command 'php artisan key:generate'
8. open phpmyadmin by going https://localhost/phpmyadmin create database 'fms'
9. import the 'fms.sql' file
10. run command 'php artisan serve'

## 3 End Level
1. Receiption-end: https://localhost:8000/login, username: user@mail.com, password: password
2. Admin-end: https://localhost:8000/admin/login, username: admin@mail.com, password: password
3. Employee-end: https://localhost:8000/employee/login, username: shubhendu@m.com, password: password



















## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
