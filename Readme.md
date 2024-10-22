# Микросервис для CRUD

В docker-compose инициализируется контейнер с самим микросервисом, а так же контейнер с БД. 
PHP 8.0 | MariaDB 10.6 | PhpMyAdmin (просто для удобной визуализации данных)

# API routes
##### Все запросы являются POST. 
 - /create - создать запись гостя с переданными данными. Запрос имеет вид: ```{
    "name": name,
    "surname": surname,
    "email": email,
    "phone": phone,
    "country": country
    }```
 - /update - изменить данные в записи гостя по ID. Запрос имеет вид: ```{
    "id": id
    "name": name,
    "surname": surname,
    "email": email,
    "phone": phone,
    "country": country
    }```
    Все параметры, кроме ID, по сути, необязательны. Запрос может состоять из id и, например, surname. Тогда в записи измениться только surname гостя.
 - /delete - удалить запись гостя по ID. Запрос имеет вид: ```{ "id": id }```
 - /getAllUsers - получить все записи гостей. Пустой запрос.

##### NumerifyAPI
Для получения страны по коду номера телефона, я использовал API Numerify. Если при создании записи гостя страна не указана, метод получает название страны по коду из номера телефона через данный API.

# Запуск
Для запуска проекта нужно создать `.env` файл в корне, который будет содержать переменные для создания контейнеров:
```.env
PHP_PORT=Порт для запуска сервиса
SQL_PORT=Порт для запуска phpmyadmin
SQL_ROOT_PASSWORD=Пароль к БД
```
Затем, нужно выполнить `docker compose up --build`. 
`docker-compose.yml` уже содержит в себе всё необходимое.
Если БД будет пуста, скрипт самостоятельно создаст таблицу и переключится на неё для работы.