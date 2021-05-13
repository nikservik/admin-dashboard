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

## Использование

Чтобы пакет можно было добавить как модуль в админ-панель,
он должен соответствовать нескольким требованиям:
1. В его конфигурации должен быть ключ `route`. 
   Этот путь будет использоваться для перехода к модулю.
2. В локализации пакета должен быть файл `admin.php`, содержащий строки
   `dashboard-name` и `dashboard-description`.
3. В оформлении должны использоваться стили из admin.css.

## Тестирование

```bash
phpunit
```

## История изменений



## TODO

