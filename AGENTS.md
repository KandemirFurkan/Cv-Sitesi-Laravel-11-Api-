# AGENTS.md - Laravel 11 CV/Portfolio API Project

## Commands
- **Test all**: `php artisan test` or `vendor/bin/phpunit`
- **Test single file**: `php artisan test tests/Feature/SomeTest.php`
- **Test single method**: `php artisan test --filter testMethodName`
- **Code style**: `vendor/bin/pint` (Laravel Pint formatter)
- **Build frontend**: `npm run build`
- **Dev server**: `npm run dev` (Vite)
- **Laravel server**: `php artisan serve`

## Architecture
- **Framework**: Laravel 11 with Sanctum authentication API
- **Database**: Eloquent ORM with migrations in `database/migrations/`
- **API Routes**: `routes/api.php` - RESTful endpoints for About, Contact, Career, User auth
- **Web Routes**: `routes/web.php` - Auth::routes() and home dashboard
- **Controllers**: `app/Http/Controllers/` and `app/Http/Controllers/Api/` for API endpoints
- **Models**: `app/Models/` - Eloquent models (About, Career, Contact, etc.)
- **Frontend**: Vite + Tailwind CSS + Bootstrap in `resources/`
- **Key Packages**: eloquent-sluggable, eloquent-viewable, intervention/image, laravel/ui

## Code Style
- **PSR-4 autoloading**: `App\` namespace for `app/` directory
- **Naming**: PascalCase for classes, camelCase for methods/variables, snake_case for DB columns
- **Models**: Use `$fillable` for mass assignment, extend `Illuminate\Database\Eloquent\Model`
- **Controllers**: Extend base `Controller`, use dependency injection for services
- **Types**: PHP 8.2+, use type hints for parameters and return types
- **Error handling**: Use Laravel's exception handling, validate requests with FormRequests
