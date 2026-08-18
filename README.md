# The Coffee Corner — Cafe Website

A modern, premium cafe website built with PHP, MySQL, HTML5, CSS3, and JavaScript.

---

## Project Structure

```
the_coffee_corner/
├── index.php              # Home page
├── about.php              # About page
├── menu.php               # Menu page (dynamic from database)
├── gallery.php            # Gallery page
├── contact.php            # Contact page (stores messages in database)
│
├── admin/
│   ├── login.php           # Admin login
│   ├── dashboard.php       # Admin dashboard with statistics
│   ├── menu.php            # Add / edit / delete menu items
│   ├── messages.php        # View contact messages
│   └── logout.php          # Admin logout
│
├── includes/
│   ├── db.php              # PDO database connection
│   ├── functions.php       # Helper functions (auth, sanitization, queries)
│   ├── header.php          # Shared site header + navbar
│   ├── footer.php          # Shared site footer
│   ├── admin_header.php    # Shared admin header + sidebar
│   └── admin_footer.php    # Shared admin footer
│
├── assets/
│   ├── css/
│   │   ├── style.css       # Main website styles
│   │   └── admin.css       # Admin panel styles
│   ├── js/
│   │   ├── script.js       # Main website JavaScript
│   │   └── admin.js        # Admin panel JavaScript
│   └── images/             # (Image assets folder)
│
└── database/
    ├── schema.sql          # MySQL database schema + sample data
    └── create_admin.php   # One-time script to set admin password
```

## Database Tables

| Table              | Purpose                                        |
|--------------------|------------------------------------------------|
| `admins`           | Admin login accounts (bcrypt-hashed passwords) |
| `menu_items`       | Menu items (name, description, price, category, image) |
| `contact_messages` | Messages submitted via the contact form        |

---

## How to Run on XAMPP

### Step 1 — Install XAMPP

Download and install XAMPP from https://www.apachefriends.org. Start **Apache** and **MySQL** from the XAMPP Control Panel.

### Step 2 — Copy the Project

Copy the entire `the_coffee_corner` folder into your XAMPP htdocs directory:

```
C:\xampp\htdocs\the_coffee_corner
```

### Step 3 — Import the Database

1. Open your browser and go to http://localhost/phpmyadmin
2. Click the **Import** tab at the top
3. Click **Choose File** and select `database/schema.sql` from the project folder
4. Click **Go** to import

This will create the `the_coffee_corner` database with all tables and sample data (21 menu items + 2 sample messages).

### Step 4 — Set the Admin Password

The schema includes a placeholder password hash. To set a proper bcrypt password:

1. Open your browser and go to: http://localhost/the_coffee_corner/database/create_admin.php
2. You'll see a confirmation message that the password has been set
3. **Delete** the file `database/create_admin.php` from your project folder (for security)

### Step 5 — Open the Website

- **Website:** http://localhost/the_coffee_corner/
- **Admin Panel:** http://localhost/the_coffee_corner/admin/login.php

### Admin Login Credentials

| Field    | Value       |
|----------|-------------|
| Username | `admin`     |
| Password | `admin123`  |

---

## Features

### Public Website
- Home page with hero section, featured menu, why-choose-us, testimonials, stats, and CTA
- About page with owner story, mission, and values
- Menu page with category filtering (items loaded from database)
- Gallery page with lightbox image viewer
- Contact page with working form (messages saved to database)
- Fully responsive (mobile, tablet, desktop)
- Scroll reveal animations, hover effects, smooth scrolling
- SEO optimized with meta tags, semantic HTML, and LocalBusiness JSON-LD schema
- Sticky navbar with mobile hamburger menu

### Admin Panel
- Secure login with PHP sessions and bcrypt password hashing
- Dashboard with statistics (menu count, messages, unread count, categories)
- Full CRUD for menu items (add, edit, delete, change name/description/price/category/image)
- View contact messages, mark as read, delete
- Responsive sidebar navigation

### Security
- PDO prepared statements for all database queries
- Password hashing with `password_hash()` / `password_verify()`
- Session-based authentication
- XSS prevention with `htmlspecialchars()` output escaping
- Input validation on contact form

---

## Changing Database Credentials

If your MySQL root password is not empty, edit `includes/db.php` and update:

```php
$username = 'root';
$password = '';  // ← change this to your MySQL password
```

---

## Changing the Admin Password

To change the admin password, create a temporary PHP file with:

```php
<?php
require_once 'includes/db.php';
$hash = password_hash('your_new_password', PASSWORD_DEFAULT);
$pdo->prepare("UPDATE admins SET password = :p WHERE username = 'admin'")->execute([':p' => $hash]);
echo "Password updated. Delete this file.";
```

Run it once in your browser, then delete it.

---

## Tech Stack

- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5 (CDN)
- **Backend:** PHP 8+
- **Database:** MySQL (via PDO)
- **Fonts:** Google Fonts (Playfair Display + Poppins)
- **Icons:** Font Awesome 6
- **Images:** Pexels (stock photos, loaded via URL)

---

© The Coffee Corner — Chetan Prajapat
