# Simple-APIRESTFUL-Symfony
# Symfony simple APIRESTFUL with JWT

This project is a simple API REST using symfony and JWT

This project is using 3 entities, User for loging,Surveys and Question, is just a simple example but you can do whatever you want. The code is not optimized and you can see some bad code on the controller, please in a real world dont do that, the good and clean code is important, but this example is just a way tho show how simple is make an APIREST

## Installation

First you need install [composer](https://getcomposer.org/download/).


## Usage

1-Clone the project or download from .zip

```
https://github.com/gamboitaygb/apirestful-jwt-symfony.git
```

2-Install dependencies 
```
composer install 
```
3-Make sure to install MySQL and edit .env file
```
DATABASE_URL=mysql://dbuser:'dbpassword'@host_or_ip:3306/dbname
```
4-Execute the migrate command to create you database table from entity
```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```
It will create 3 table on you database, User,Survey and Question.

That's all Folks

now can use it (making reuqest with postman for example)


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)

