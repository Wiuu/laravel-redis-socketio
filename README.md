## SocketIO + REDIS (pubsub) + Laravel 8 

This project uses a simple Laravel stack coupled with mysql database and docker containers.


<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Documentation](https://laravel.com/docs)
- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## About Redis

Redis is a 'on memory' cache system, very fast and reliable, it also has pubsub features that we will be using here.

## About Socket.io

Socket.io is a node package that provides everything you need to host a websocket event server, here we will be using redis pubsub to ensure the socket.io scalability.

## Pre-requisites

- Docker installed:
    - Linux - apt install docker
    - MacOS - installation [link](https://store.docker.com/editions/community/docker-ce-desktop-mac)
    - Windows - Only Pro Os supported, [link](https://store.docker.com/editions/community/docker-ce-desktop-windows) 

- Docker Compose
    - Linux - apt install docker-compose
    - Other Os - installation [link](https://docs.docker.com/compose/install/)
    
- PHP / Composer
    - Linux - apt install the following packages:
        - php
        - php-common
        - php-mysql
        - php-xml
        - php-mbstring
        - composer
        
- Make sure there is nothing else running on port 80 on your system:
    - Linux - # netstat -tulpn | grep :80
        - service apache2 stop will kill the builtin apache on ubuntu
    - Windows - netstat -aon | findstr :80.
    - MacOS - sudo lsof -i -n -P | grep TCP

## Installation

- Clone the this repository to your machine.
- CD to backend folder:
    - $ composer install
    - docker-compose up
    - edit/create your .env file to match the enviroment you are using.
    - after redis and redis-commander is up:
        - php artisan serve (this will startup laravel on port 8000 => localhost:8000)

- CD to server folder:
    - $ npm install
    - $ npm start
        
        
- CD to client folder:
    - open index.html on any browser you want.
        
## Running application 

Using postman, or any other request sender application, send a POST request to the following enpoint:

    - localhost:8000/send/event
        - Params should be json as follows:
            ``` 
            {
                "event": "NAME OF THE EVENT YOU WANT",
                "data": [
                    {
                        "teste": 132,
                        "new_data": "example of wathever"
                    }
                ]
            }
            ```

This event should show up on the client example built using VUE.js 