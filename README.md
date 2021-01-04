
##Backend: тестовое задание 1
Нужно написать простейший справочник по музыкальным пластинкам. 

2 экрана:  
-1й экран: список пластинок;  
-2й экран: форма редактирования данных по пластинке.

Если пластинку можно удалить — прекрасно. Если будет паджинатор на списке пластинок — прекрасно. Если будет авторизация, то еще лучше.

СУБД можно использовать любую. Сделать нужно с использованием Laravel.

Нюансы, которые не описаны в задании сделай на своё усмотрение или задай вопрос.

Требования к результату:
Исходный код в любой общедоступной системе контроля версий;
Приложение демонстрируется в рабочем виде, т.е. его нужно развернуть на любом бесплатном (или платном) хостинг

## Сервис PlatesBase
Код проекта: https://github.com/rud99/plates_base  
Демо: http://194-67-108-139.cloudvps.regruhosting.ru  
Сервис разработан для демонстрации навыков работы с фреймворком Laravel.

### Технологии
В проекте использованы следующие технологии:
1. Бекенд - Laravel 8
2. Фронт - Bootstrap 4, JS
3. БД - MySql
4. Работают функции регистрации и авторизации пользователя

### Инструкция пр развертыванию
1. git clone https://github.com/rud99/plates_base.git
2. composer install
3. cp .env.example .env и вносим необходимые изменения
4. php artisan key:generate
5. php artisan migrate --seed
6. php artisan cache:clear
7. php artisan config:clear
8. Выполняем тесты php artisan test
