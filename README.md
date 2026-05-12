# 🚀 Laravel Blog System

Một hệ thống blog cá nhân hoàn chỉnh được xây dựng bằng **Laravel 11**, **Blade** và **MySQL**.
Dự án này được tạo ra để luyện tập và hiểu sâu hơn về:

* MVC Architecture
* Authentication & Authorization
* Eloquent Relationships
* CRUD Operations
* Middleware & Role Management
* Xây dựng Web Application thực tế bằng Laravel

---

## ✨ Features

### 👤 User Features

* Đăng ký / Đăng nhập
* Quên mật khẩu & Xác thực email
* Tạo bài viết
* Chỉnh sửa / Xóa bài viết của mình
* Like / Unlike bài viết
* Bình luận bài viết
* Xem Dashboard bài viết
* Xem Profile cá nhân
* Upload Avatar

---

### 🛠 Admin Features

* Admin Dashboard
* Thống kê hệ thống
* Quản lý Users
* Quản lý Posts
* Quản lý Comments
* Xóa bài viết của người dùng
* Phân quyền Admin/User

---

## 🛠 Tech Stack

### Backend

* Laravel 11
* PHP 8+

### Frontend

* Blade
* Tailwind CSS
* Laravel Breeze

### Database

* MySQL

### Build Tool

* Vite

---

## 📸 Screenshots

> (Thêm ảnh giao diện tại đây)

---

## 🚀 Installation

### 1. Clone repository

```bash
git clone <your-repository-link>
cd blog
```

---

### 2. Install dependencies

```bash
composer install
npm install
npm run dev
```

---

### 3. Setup environment

```bash
cp .env.example .env
```

Cấu hình database trong file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

---

### 4. Generate app key

```bash
php artisan key:generate
```

---

### 5. Run migrations

```bash
php artisan migrate
```

---

### 6. Create Admin Account (Optional)

```bash
php artisan tinker
```

```php
User::create([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('123456'),
    'role' => 'admin'
]);
```

---

### 7. Run server

```bash
php artisan serve
```

Truy cập:

```text
http://localhost:8000
```

---

## ✅ Completed Features

* Authentication (Laravel Breeze)
* CRUD Posts
* Authorization
* Comments System
* Like / Unlike System
* Admin Dashboard
* Upload Avatar
* Pagination
* Search Posts
* User Management
* Comment Management

---

## 🔥 Future Improvements

* Rich Text Editor
* Dark Mode
* Realtime Notifications
* REST API
* React / Vue Frontend
* Image Upload for Posts

---

## 👨‍💻 Author

### Bapnuong

Laravel Blog Project — built for learning fullstack web development with Laravel.
