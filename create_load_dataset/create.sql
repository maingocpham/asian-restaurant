-- Drop the existing database if it exists and create a new one
DROP DATABASE IF EXISTS asianrestaurant;
CREATE DATABASE asianrestaurant;
USE asianrestaurant;

-- Create Reservation table with auto-increment for reservation_id and email column
CREATE TABLE RESERVATION (
    reservation_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    phone_number VARCHAR(20),
    email VARCHAR(100),
    date DATE,
    time TIME,
    number_of_guest INT
);

-- Create Menu table
CREATE TABLE MENU (
    item_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    category VARCHAR(50) NOT NULL,
    cuisine VARCHAR(50) NOT NULL
);

-- Create Admin table 
CREATE TABLE ADMIN (
    admin_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100)
);

-- Create Staff table with additional columns as specified
CREATE TABLE STAFF (
    staff_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    staff_name VARCHAR(100),
    staff_shift VARCHAR(50),  -- Added column for shift
    email VARCHAR(100),  -- Added email column
    phone_number VARCHAR(20),  -- Added phone number column
    staff_username VARCHAR(50) NOT NULL UNIQUE,  -- Added username column
    password VARCHAR(255)  -- Added password column
);

-- Create Orders table
CREATE TABLE ORDERS (
    order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    staff_no INT NOT NULL,
    item_id INT NOT NULL,
    quantity INT,
    order_type VARCHAR(10),
    FOREIGN KEY (reservation_id) REFERENCES RESERVATION(reservation_id) ON DELETE CASCADE,
    FOREIGN KEY (staff_no) REFERENCES STAFF(staff_id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES MENU(item_id) ON DELETE CASCADE
);

-- Create Payment table
CREATE TABLE PAYMENT (
    payment_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    amount_paid DECIMAL(10,2),
    payment_method VARCHAR(50),
    FOREIGN KEY (reservation_id) REFERENCES RESERVATION(reservation_id) ON DELETE CASCADE
);
