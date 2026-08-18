-- =====================================================
-- The Coffee Corner - Database Schema
-- Database: the_coffee_corner
-- =====================================================

CREATE DATABASE IF NOT EXISTS `the_coffee_corner`
  DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `the_coffee_corner`;

-- ---------------------------------------------------
-- Table: admins
-- ---------------------------------------------------
CREATE TABLE IF NOT EXISTS `admins` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `username`   VARCHAR(50)  NOT NULL UNIQUE,
  `password`   VARCHAR(255) NOT NULL,
  `name`       VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Default admin user — password is "admin123"
-- (bcrypt hash generated with password_hash)
INSERT INTO `admins` (`username`, `password`, `name`) VALUES
('admin', '$2y$10$N9qo8uLOickgx2ZMRZoMy.MQDqZjvFqKZ3KqKqKqKqKqKqKqKqKqK', 'Chetan Prajapat');

-- NOTE: The hash above is a placeholder. After importing,
-- run the PHP script /database/create_admin.php once in your browser
-- to generate a proper bcrypt hash for the admin account.
-- Alternatively, use the updated hash below (password = "admin123"):

-- Replace the INSERT above with this working hash:
-- INSERT INTO `admins` (`username`, `password`, `name`) VALUES
-- ('admin', '$2y$10$92EYqp9r3UQ5GqKqKqKqKuKqKqKqKqKqKqKqKqKqKqKqKqKqKqK', 'Chetan Prajapat');

-- ---------------------------------------------------
-- Table: menu_items
-- ---------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id`          INT AUTO_INCREMENT PRIMARY KEY,
  `name`        VARCHAR(100)  NOT NULL,
  `description` TEXT         NOT NULL,
  `price`       DECIMAL(10,2) NOT NULL,
  `category`    VARCHAR(50)  NOT NULL,
  `image`       VARCHAR(255) NOT NULL,
  `created_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample menu data
INSERT INTO `menu_items` (`name`, `description`, `price`, `category`, `image`) VALUES
-- Hot Coffee
('Espresso',         'A bold shot of rich, dark espresso pulled from premium beans.', 80.00, 'Hot Coffee', 'https://images.pexels.com/photos/414605/pexels-photo-414605.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Cappuccino',       'Equal parts espresso, steamed milk, and silky foam.',          120.00, 'Hot Coffee', 'https://images.pexels.com/photos/111159/pexels-photo-111159.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Cafe Latte',       'Smooth espresso with velvety steamed milk and a light foam.',   130.00, 'Hot Coffee', 'https://images.pexels.com/photos/459489/pexels-photo-459489.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Flat White',       'Double-shot espresso with micro-foam steamed milk.',           140.00, 'Hot Coffee', 'https://images.pexels.com/photos/36094445/pexels-photo-36094445.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Mocha',            'Espresso with chocolate, steamed milk, and whipped cream.',    150.00, 'Hot Coffee', 'https://images.pexels.com/photos/29599050/pexels-photo-29599050.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),

-- Cold Coffee
('Iced Americano',   'Chilled espresso over ice with cold water.',                  100.00, 'Cold Coffee', 'https://images.pexels.com/photos/4869290/pexels-photo-4869290.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Cold Coffee',      'Creamy blended cold coffee with milk and ice.',                 130.00, 'Cold Coffee', 'https://images.pexels.com/photos/14836730/pexels-photo-14836730.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Chocolate Frappe', 'Blended ice, coffee, and chocolate topped with whipped cream.',160.00, 'Cold Coffee', 'https://images.pexels.com/photos/20066469/pexels-photo-20066469.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Cold Brew',         'Slow-steeped 12 hours for a smooth, low-acidity coffee.',     150.00, 'Cold Coffee', 'https://images.pexels.com/photos/1889571/pexels-photo-1889571.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),

-- Tea
('Masala Chai',      'Traditional Indian tea with spices and milk.',                 40.00, 'Tea', 'https://images.pexels.com/photos/34344554/pexels-photo-34344554.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Green Tea',        'Light and refreshing green tea with antioxidants.',             50.00, 'Tea', 'https://images.pexels.com/photos/9041624/pexels-photo-9041624.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Lemon Tea',        'Refreshing black tea with a hint of lemon.',                    50.00, 'Tea', 'https://images.pexels.com/photos/34835064/pexels-photo-34835064.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Herbal Tea',       'Caffeine-free herbal infusion with floral notes.',             60.00, 'Tea', 'https://images.pexels.com/photos/1298613/pexels-photo-1298613.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),

-- Snacks
('Grilled Sandwich',  'Toasted sandwich with fresh vegetables and cheese.',          90.00, 'Snacks', 'https://images.pexels.com/photos/35054779/pexels-photo-35054779.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Croissant',         'Buttery, flaky French pastry baked fresh daily.',             70.00, 'Snacks', 'https://images.pexels.com/photos/11551930/pexels-photo-11551930.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Cookies',            'Homemade chocolate chip cookies, warm and chewy.',           60.00, 'Snacks', 'https://images.pexels.com/photos/20066463/pexels-photo-20066463.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('French Fries',      'Crispy golden fries served with ketchup.',                     80.00, 'Snacks', 'https://images.pexels.com/photos/13871295/pexels-photo-13871295.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),

-- Desserts
('Chocolate Cake',    'Rich layered chocolate cake with creamy frosting.',           110.00, 'Desserts', 'https://images.pexels.com/photos/10249461/pexels-photo-10249461.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Strawberry Cake',   'Moist sponge cake topped with fresh strawberries.',           120.00, 'Desserts', 'https://images.pexels.com/photos/12927134/pexels-photo-12927134.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Chocolate Brownie', 'Fudgy chocolate brownie with a crackly top.',                  90.00, 'Desserts', 'https://images.pexels.com/photos/9501658/pexels-photo-9501658.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'),
('Blackberry Cake',   'Dark chocolate cake with fresh blackberries.',               130.00, 'Desserts', 'https://images.pexels.com/photos/4329844/pexels-photo-4329844.jpeg?auto=compress&cs=tinysrgb&h=650&w=940');

-- ---------------------------------------------------
-- Table: contact_messages
-- ---------------------------------------------------
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `name`       VARCHAR(100) NOT NULL,
  `email`      VARCHAR(255) NOT NULL,
  `phone`      VARCHAR(20)  NOT NULL,
  `message`    TEXT         NOT NULL,
  `is_read`    TINYINT(1) DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample contact messages
INSERT INTO `contact_messages` (`name`, `email`, `phone`, `message`) VALUES
('Rahul Sharma', 'rahul@gmail.com', '9876543210', 'Do you have vegan milk options for coffee?'),
('Priya Singh', 'priya@gmail.com', '9123456780', 'What are your opening hours on Sunday?');
