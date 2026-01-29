# Учебная CRUD-система 
В этом репозитории реализована CRUD-система заметок с минимальным интерфейсом на основе Laravel & Bootstrap
Веб-сайт позволяет создать заметку, получить её, редактировать и удалить. 
После создания заметки она появится на главной странице, чтобы просмотреть/редактировать/удалить её, необходимо нажать на карту с заметкой ЛКМ.

<h2>Система аккаунтов</h2>
Система поддерживает авторизацию и регистрацию. Также в системе есть возможность доступа к админ-панели.  
Для создания пользователя-администратора необходимо ввести команду 

``` cmd
php artisan migrate --seed
```

После ввода команды в БД появится аккаунт пользователя admin. 
Данные пользователя admin по умолчанию:  
Email:      admin@admin.admin  
Password:   admin  

Для хода в админ-панель, нужно авторизоваться через аккаунт администратора и через выпадающее меню на 
никнейме пользователя зайти в админ панель  

## Для запуска c Docker-Compose используйте
1. Собрать docker-compose
```bash
docker compose up -d --build
```
2. Скопировать переменные окружения из шаблона
```bash
docker compose exec -T app cp .env.example .env
```

3. Установить зависимости Laravel
```bash
docker compose exec -T app composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-req=ext-http
```
4. Установить и скомпилировать стили Bootstrap
```bash
docker compose exec -T app npm install
```
```bash
docker compose exec -T app npm run build
```

5. Сгенерировать ключ приложения
```bash
docker compose exec -T app php artisan key:generate
```

6. Провести миграцию в БД
```bash
docker compose exec -T app php artisan migrate --seed
```

Готово. Проект будет запущен на localhost по порту 8000:
http://localhost:8000/
