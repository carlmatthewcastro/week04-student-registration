# Deployment Notes

## Local development

Use the standard Laravel flow to start the project:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan storage:link
php artisan serve
```

## Production considerations

- configure a secure environment file
- use a managed database service
- enable app-level logging and monitoring
- protect storage and upload directories
- review access controls before exposing the application publicly
