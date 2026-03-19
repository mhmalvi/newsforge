# NewsForge

A full-featured news portal built with Laravel, featuring a robust admin panel for publishing and categorizing news content with comment and tagging support.

## Features

- **News Publishing** — Create, edit, and manage news articles with rich content
- **Category System** — Organize articles with categories and subcategories
- **Tagging** — Flexible tag-based content organization
- **Comments** — Reader comment system on articles
- **User Roles** — Role-based access control with activation workflow
- **Admin Dashboard** — Comprehensive backend for site and content management
- **SEO-Friendly URLs** — Automatic slug generation via Eloquent Sluggable
- **Authentication** — Full auth flow with registration, login, password reset, and email verification (Laravel Breeze)

## Tech Stack

- **Framework:** Laravel 8
- **PHP:** 7.3+ / 8.0+
- **Slugs:** cviebrock/eloquent-sluggable
- **Auth Scaffolding:** Laravel Breeze
- **Frontend:** Blade templates with admin dashboard
- **Database:** MySQL

## Getting Started

```bash
# Clone the repository
git clone https://github.com/mhmalvi/newsforge.git
cd newsforge

# Install dependencies
composer install

# Configure environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Start the development server
php artisan serve
```

## Project Structure

```
app/
├── Http/Controllers/
│   ├── Admin/          # Category, News, Site management
│   └── Auth/           # Authentication controllers (Breeze)
├── Http/Resources/     # Category, Settings API resources
├── Models/             # News, Category, SubCategory, Comment, Tags, Role, User
└── Providers/
resources/views/
├── admin/              # Admin panel views
└── frontend/           # Public-facing news views
```

## License

MIT
