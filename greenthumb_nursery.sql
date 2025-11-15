-- Create the database
DROP DATABASE IF EXISTS greenthumb_nursery;
CREATE DATABASE IF NOT EXISTS greenthumb_nursery;
USE greenthumb_nursery;

-- Table for Users
CREATE TABLE IF NOT EXISTS users (
    user_id VARCHAR(50) PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Staff', 'Customer') NOT NULL
);


-- Table for Customers (inherits from Users, or linked by user_id)
-- Decided to keep customer details separate for more specific attributes
CREATE TABLE IF NOT EXISTS customers (
    customer_id VARCHAR(50) PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL UNIQUE,
    address VARCHAR(255),
    phone VARCHAR(20),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Table for Plants
CREATE TABLE IF NOT EXISTS plants (
    plant_id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(100),
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    description TEXT
);

-- Table for Orders
CREATE TABLE IF NOT EXISTS orders (
    order_id VARCHAR(50) PRIMARY KEY,
    customer_id VARCHAR(50) NOT NULL,
    order_date DATETIME NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled', 'Returned') NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);


-- Table for Order Items
CREATE TABLE IF NOT EXISTS order_items (
    order_item_id VARCHAR(50) PRIMARY KEY,
    order_id VARCHAR(50) NOT NULL,
    plant_id VARCHAR(50) NOT NULL,
    quantity INT NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (plant_id) REFERENCES plants(plant_id)
);

-- Sample Data for Users
INSERT INTO users (user_id, username, password, role) VALUES
('user001', 'admin', 'admin123', 'Admin'),
('user002', 'staff1', 'staff123', 'Staff'),
('user003', 'customer1', 'customer123', 'Customer'),
('user004', 'customer2', 'custpass2', 'Customer');


-- Sample Data for Customers
INSERT INTO customers (customer_id, user_id, address, phone) VALUES
('cust001', 'user003', '123 Green St, Plantville', '555-1234
'),
('cust002', 'user004', '456 Bloom Ave, Flower City', '555-5678
');

-- Sample Data for Plants
INSERT INTO plants (plant_id, name, type, price, quantity, description) VALUES
('plant001', 'Rose Bush', 'Flower', 25.00, 50, 'Beautiful red rose bush, perfect for gardens.
'),
('plant002', 'Fiddle Leaf Fig', 'Indoor', 60.00, 20, 'Popular indoor plant with large, violin-shaped leaves.
'),
('plant003', 'Lavender', 'Herb', 15.00, 100, 'Fragrant herb known for its calming properties.
'),
('plant004', 'Sunflower', 'Flower', 10.00, 75, 'Tall, bright yellow flower that tracks the sun.
');

-- Sample Data for Orders
INSERT INTO orders (order_id, customer_id, order_date, total_amount, status) VALUES
('order001', 'cust001', '2025-07-28 10:30:00', 85.00, 'Delivered'),
('order002', 'cust001', '2025-07-29 14:00:00', 60.00, 'Pending');


-- Sample Data for Order Items
INSERT INTO order_items (order_item_id, order_id, plant_id, quantity, subtotal) VALUES
('item001', 'order001', 'plant001', 2, 50.00),
('item002', 'order001', 'plant003', 1, 15.00),
('item003', 'order001', 'plant004', 2, 20.00),
('item004', 'order002', 'plant002', 1, 60.00);
