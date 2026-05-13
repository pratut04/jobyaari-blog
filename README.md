JobYaari 🚀

JobYaari is a modern Laravel-based blog and government job update platform built with Tailwind CSS, TinyMCE, AJAX features, authentication, dark mode, and Railway cloud deployment.

The platform allows users to:

* Read blogs and job updates
* Like and bookmark posts
* Comment on articles
* Browse categories
* Search posts
* Access admin dashboard
* Create and manage blog posts with TinyMCE editor

⸻

🌐 Live Demo

Production URL:

https://jobyaari-blog-production.up.railway.app

⸻

✨ Features

🔐 Authentication System

* User Login
* User Registration
* Logout
* Remember Me
* CSRF Protection
* Session-based Authentication

👤 User Features

* Save/Bookmark Posts
* Like Posts
* AJAX Comment System
* Dark Mode Toggle
* Responsive UI
* Search Posts
* Category Filtering
* Date Filtering

📝 Admin Features

* Admin Dashboard
* Create Posts
* Edit Posts
* Delete Posts
* Upload Featured Images
* TinyMCE Rich Text Editor
* Featured Posts
* Draft & Published Status
* Category Management

📚 Blog Features

* Related Posts
* Popular Posts
* Featured Posts
* SEO Meta Tags
* Open Graph Tags
* Twitter Meta Tags
* View Counter
* Mobile Responsive Design

⚡ AJAX Features

* AJAX Likes
* AJAX Bookmarking
* AJAX Comments
* Live Filtering

⸻

🛠️ Tech Stack

Backend

* Laravel
* PHP
* MySQL

Frontend

* Tailwind CSS
* Blade Templates
* JavaScript
* TinyMCE Editor

Deployment

* Railway
* GitHub

Database

* Railway MySQL
* MySQL Workbench

⸻

📂 Project Structure

app/
resources/
views/
routes/
public/
database/

⸻

⚙️ Installation Setup

1. Clone Repository

git clone https://github.com/pratut04/jobyaari-blog

2. Move Into Project Folder

cd jobyaari

3. Install Dependencies

composer install
npm install

4. Create Environment File

cp .env.example .env

5. Generate Application Key

php artisan key:generate

6. Configure Database

Update .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jobyaari_blog
DB_USERNAME=root
DB_PASSWORD=******

7. Run Migrations

php artisan migrate

8. Start Development Server

php artisan serve

9. Build Frontend Assets

npm run build

⸻

🚂 Railway Deployment Setup

Railway Variables

APP_ENV=production
APP_DEBUG=false
APP_URL=https://jobyaari-blog-production.up.railway.app
ASSET_URL=https://jobyaari-blog-production.up.railway.app
DB_CONNECTION=mysql
DB_HOST=mysql.railway.internal
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=******
SESSION_DRIVER=file
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=lax
CACHE_STORE=file
QUEUE_CONNECTION=sync

⸻

📦 Build Command

npm install && npm run build

▶️ Start Command

php artisan serve --host=0.0.0.0 --port=8080

⸻

🗄️ Database Import Setup

Export Local Database

Using phpMyAdmin or MySQL Workbench.

Import Into Railway MySQL

1. Open MySQL Workbench
2. Connect Railway MySQL
3. Create schema
4. Import SQL file
5. Refresh schemas

⸻

🧠 TinyMCE Setup

TinyMCE is used for rich text blog editing.

Example:

<script src="https://cdn.tiny.cloud/1/MY_API_KEY/tinymce/8/tinymce.min.js"></script>

Features:

* Headings
* Tables
* Lists
* Images
* Font Sizes
* Rich Formatting

⸻

🌙 Dark Mode

Dark mode is implemented using:

* Tailwind CSS
* Local Storage
* JavaScript Theme Toggle

⸻

📱 Responsive Design

The UI is fully responsive for:

* Mobile Devices
* Tablets
* Desktop

⸻

🔎 SEO Optimization

Implemented:

* Meta Description
* Open Graph Tags
* Twitter Cards
* SEO Friendly URLs
* Dynamic Meta Content

⸻

📌 Main Functionalities

User Side

* Browse Posts
* Search Posts
* Read Articles
* Comment
* Like
* Bookmark

Admin Side

* Create/Edit/Delete/View Posts
* Manage Content
* Upload Images
* Control Featured Posts

⸻

🔒 Security Features

* CSRF Protection
* Laravel Authentication
* Secure Sessions
* HTTPS Forced in Production

⸻

🧪 Useful Commands

Clear Cache

php artisan optimize:clear

Config Clear

php artisan config:clear

Cache Clear

php artisan cache:clear

Build Assets

npm run build

⸻

📸 Screenshots


⸻

👩‍💻 Developed By

Pratiksha Tivale

⸻

📄 License

This project is developed for learning and portfolio purposes.
