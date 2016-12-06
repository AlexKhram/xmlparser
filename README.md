# XML parser

## Порядок установки
* Клонировать репозиторий ```git clone https://github.com/AlexKhram/xmlparser``` или скачать zip файлом и разархивировать.
* Зайти в папку проекта и выполнить команду ```composer install``` (для получения идентичных версий пакетов согласно composer.lock) или выполнить ```composer update```
* В phpMyAdmin (или аналоге) импортировать файл *tables.sql* для создание БД и таблиц с необходимыми связями.
* В файле */app/config.php* указать настройки доступа к БД (хост, логин, пароль)
* Указать Apache (или другому серверу) корневую папку проекта. (файл .htaccess со входом на index.php уже присутсвует впроекте). Либо использовать встроенный в PHP сервер ```php -S localhost:80```
* В браузере перейти по адресу *http://localhost/*

### Спасибо за внимание
![alt tag](https://raw.githubusercontent.com/AlexKhram/xmlparser/master/screen.png)
