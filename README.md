
# 🌿 Green House App

Green House is a web-based application for **plant management** and **planting planning**, built with the **Laravel** framework.

![Laravel](https://img.shields.io/badge/Laravel-8.x-red?style=flat-square&logo=laravel)
![SCSS](https://img.shields.io/badge/SCSS-40.9%25-pink?style=flat-square&logo=sass)
![Blade](https://img.shields.io/badge/Blade-Template-yellow?style=flat-square&logo=laravel)
![JavaScript](https://img.shields.io/badge/JavaScript-15.9%25-yellow?style=flat-square&logo=javascript)
![PHP](https://img.shields.io/badge/PHP-15.7%25-blue?style=flat-square&logo=php)

---

## ✨ Features

- 🔐 User Authentication (Login & Register)
- 🌾 Plant CRUD
- 📅 Planting Plan Management
- 🗂️ Seeder for Plant Data
- ⚙️ Laravel Backend with Blade Templates
- 📦 Clean and Modular Structure

---

## 📁 Main Folder Structure

| Folder        | Description                           |
|---------------|----------------------------------------|
| `app/`        | Application logic (controllers, models) |
| `routes/`     | Web routes definition (`web.php`)       |
| `resources/`  | Blade templates and frontend assets     |
| `database/`   | Migrations and seeders                  |
| `public/`     | Web root folder and entry point         |

---

## 🛠️ Installation (Local)

```bash
git clone https://github.com/IlhamNur/green-house.git
cd green-house

# Install dependencies
composer install
cp .env.example .env
php artisan key:generate

# Run migrations and seeders
php artisan migrate --seed

# Start the local server
php artisan serve
```

---

## 🧠 Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Blade, SCSS, JavaScript
- **Database**: MySQL
- **Auth**: Laravel Auth

---

## 📸 Screenshots

### 🏠 Dashboard
![Dashboard Screenshot](public/assets/img/Picture1.png)

---

## 🙋 About the Developer

**Ilham Nur Romdoni**  
🔖 Personal brand: `hmnr`  
📬 [LinkedIn](https://linkedin.com/in/ilham-nur-romdoni-167263206) • 📩 romdhoninuril@gmail.com

---

Feel free to fork or star this repository if you find it useful!
