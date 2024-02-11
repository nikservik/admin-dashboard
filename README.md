# Админ-панель с подключаемыми модулями


## Установка

Добавить в `composer.json`
```bash
    "require": {
        ...
        "nikservik/admin-dashboard": "^1.0",
        ...
    },
    "config": {
        ...
        "github-oauth": {
            "github.com": "токен доступа (создается в настройках)"
        }
    },
    "repositories" : [
        {
            "type": "vcs",
            "url" : "git@github.com:nikservik/admin-dashboard"
        },
        {
            "type": "vcs",
            "url" : "git@github.com:nikservik/users"
        }
    ]
```
После этого выполнить 
```bash
composer update
```

Опубликовать файл конфигурации:
```bash
php artisan vendor:publish  --tag="admin-dashboard-config"
```
Опубликовать стили:
```bash
php artisan vendor:publish  --tag="admin-dashboard-assets"
```
Можно опубликовать стили sass, чтобы подключить их к общим стилям 
и собирать классы только для используемых пакетов.
```bash
php artisan vendor:publish  --tag="admin-dashboard-sass" --force
```
Они будут скопированы в папку `resources/css/vendor/admin-dashboard`
После этого их можно подключить в общий sass с помощью `@import './vendor/admin-dashboard.admin.sass';`

## Использование

Чтобы пакет можно было добавить как модуль в админ-панель,
он должен соответствовать нескольким требованиям:
1. В его конфигурации должен быть ключ `route`. 
   Этот путь будет использоваться для перехода к модулю.
2. В локализации пакета должен быть файл `admin.php`, содержащий строки
   `dashboard-name`, `dashboard-description`, `dashboard-icon-path`(svg path).
3. В оформлении должны использоваться стили из admin.css.

### Общие стили (css) для всех модулей

Чтобы сгенерировать общий файл css нужно выполнить команду `composer build`. 
Все неиспользуемые в модулях классы css будут удалены из сгенерированного файла.

Для разработки можно генерировать неоптимизированный файл командой `composer dev`. 
В итоговом файле останутся все классы tailwindcss, это удобно для быстрой отладки отображения.
Но сам файл получается больше 6Мб.

После генерации стилей, их нужно опубликовать в основном приложении.
Сначала нужно загрузить обновленную версию пакета `admin-dashboard` командой `composer update`.
После этого опубликовать файл стилей командой `php artisan vendor:publish --tag=admin-dashboard-assets --force`.
Можно еще поменять строку подключения стилей в `resources/views/layout.blade.php`

## Тестирование

```bash
phpunit
```

## История изменений

### 1.2
- добавлена Blade-директива @nl2br()

### 1.1
- генерация таблицы стилей для всех модулей

## TODO

- автоматически обновлять цифру в строке подключения стилей в resources/views/layout.blade.php
