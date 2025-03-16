# Translation Management System

This is a Laravel-based project for managing translations, locales, and tags. It provides API endpoints for CRUD operations on translations and locales, with support for tagging translations.

## Features

- **Locales**: Manage locales (e.g., English, French, Spanish).
- **Translations**: Manage translations with keys, values, and locale associations.
- **Tags**: Tag translations for better organization (e.g., mobile, web).
- **API Endpoints**: RESTful API for managing locales and translations.
- **Testing**: Comprehensive feature tests for all API endpoints.

## Setup

- composer install
- change .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- php artisan serve