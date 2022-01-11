<a href="https://codeigniter.com">
    <img src="https://cdn.upload.systems/uploads/R0qZHQM3.png" alt="CodeIgniter" style="float: left; margin: 0 10px 0 0; pointer-events: none;" align="left" height="150" width="150">
</a>

## 🌐 WPU Login CI3

Login & Dashboard Page with CodeIgniter 3

![CodeIgniter Version](https://img.shields.io/badge/CodeIgniter-v3.1.10-%23EF4223?style=for-the-badge&logo=codeigniter) ![Project License](https://img.shields.io/github/license/gifaldyazkaa/wpu-login-ci3?style=for-the-badge)

![Admin Dashboard Preview](https://cdn.upload.systems/uploads/D9TsObVa.png)

## 📹 Video Tutorial

[Membuat Sistem Login Lengkap Menggunakan CodeIgniter](https://youtube.com/playlist?list=PLFIM0718LjIXU8ul9FiN-owk04cQKtHPw) - Sandhika Galih

## ➡️ Getting Started

### 📥 Clone this Repository

```sh
# Git
$ git clone https://github.com/gifaldyazkaa/wpu-login-ci3.git

# GitHub CLI
$ gh repo clone gifaldyazkaa/wpu-login-ci3
```

### 📑 Move this Folder to Server Folder

```sh
# Windows (XAMPP)
> move wpu-login-ci3 C:\xampp\htdocs\

# Linux (Apache2)
$ sudo mkdir /var/www/html/wpu-login-ci3 && sudo cp -rv {wpu-login-ci3/*,wpu-login-ci3/.*} /var/www/html/wpu-login-ci3
```

### 🗂️ Create new database

- Open your phpMyAdmin Page
- Create a new database named `wpu_login`
- Select `wpu_login` database
- Go to Import tab
- Import database SQL File from `wpu_login.sql` (File is included in root folder of this project)
- You're done. You've created a database named `wpu_login`.

### 🔧 Configuring Database

Edit `application/config/database.php` with correct database information.

```php
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost', // Hostname
	'username' => 'admin', // Database username
	'password' => 'Admin_123', // Database password
	'database' => 'wpu_login', // Database name
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```

### 🔌 Start Apache2 Server

```
$ sudo systemctl start apache2
```

\* Windows user can start Apache server with XAMPP Control Panel.

### 🌐 View the application

Open up http://localhost/wpu-login-ci3. It should be like this.

[![Login page preview](https://cdn.upload.systems/uploads/vKbgx3t6.png)](https://i.upload.systems/vKbgx3t6)

### 👤 Login with this Login info

```
--Root (Admin)--
Email : root@localhost.net
Password : root1234

--Default (Admin)--

Email : koyorin@upload.systems
Password : 12345678

--Guest (User)--

Email : guest@localhost.net
Password : 12345678
```

### 🎉 You're done

Your application is served and working perfectly. Now, you can start editing Admin Dashboard by editing `application/views/admin/index.php`. CRUD Function is not fully implemented. If you want to adding User Roles, etc, You must do it via phpMyAdmin. Sorry for this.

## ✋ Reporting Errors

Have you find an error while following the [Getting Started Guide](#-getting-started)? You can [Create new issue](https://github.com/gifaldyazkaa/wpu-login-ci3/issues/new) and inserting Error code, description, and the error image.

## 📃 License

[wpu-login-ci3](#) is Licensed under [Apache-2.0](./LICENSE) License.
