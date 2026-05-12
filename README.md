# Laravel Blog System

Một hệ thống blog cá nhân hoàn chỉnh được xây dựng bằng **Laravel 11** + **Blade** + **MySQL**.  
Dự án này giúp mình học sâu về **MVC, Authentication, Authorization, Eloquent Relationships** và các tính năng thực tế của một Web Application.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

## ✨ Tính năng

### 👤 Người dùng
- Đăng ký / Đăng nhập
- Quên mật khẩu & Xác thực email
- Tạo, sửa, xóa **bài viết của mình**
- Like / Unlike bài viết
- Bình luận bài viết
- Xem dashboard tất cả bài viết
- Xem profile cá nhân

### 🛠 Admin
- Dashboard quản trị
- Thống kê hệ thống (User, Post, Comment, Like)
- Xem danh sách Users & Posts
- Quản lý nội dung (đang phát triển)

## 🛠 Công nghệ sử dụng

- **Backend**: Laravel 11
- **Frontend**: Blade + Tailwind CSS (Laravel Breeze)
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Build Tool**: Vite

## 🚀 Cài đặt & Chạy

### 1. Clone & vào thư mục
git clone <link-repo-cua-ban>
cd blog
2. Cài đặt
Bashcomposer install
npm install && npm run dev
3. Cấu hình .env
Bashcp .env.example .env
Sửa phần Database trong .env:
envDB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
4. Migrate database
Bashphp artisan migrate
5. Tạo tài khoản Admin (tùy chọn)
Bashphp artisan tinker
PHPUser::create([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('123456'),
    'role' => 'admin'
]);
6. Chạy server
Bashphp artisan serve
Truy cập: http://localhost:8000
📌 Tính năng đã hoàn thành

 Authentication đầy đủ (Breeze)
 CRUD Bài viết + Authorization
 Bình luận
 Like / Unlike
 Admin Dashboard cơ bản
 Upload Avatar
 Pagination + Search
 Quản lý User/Comment bởi Admin

👨‍💻 Tác giả
Bapnuong
Laravel Blog Project
