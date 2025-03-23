# Asian Restaurant Database  

## Overview  
- A restaurant database for managers, staffs and customers.
- This schema defines the structure for an **Asian restaurant reservation and ordering system**, including tables for **reservations, menu items, staff, orders, payments, and administrators**.  

## Tables  

### 1. RESERVATION (Stores customer reservations)  

| Column Name       | Data Type      | Constraints         | Description                      |
|------------------|--------------|--------------------|----------------------------------|
| reservation_id   | INT          | PRIMARY KEY, AUTO_INCREMENT | Unique ID for each reservation |
| customer_name    | VARCHAR(100) |                    | Name of the customer           |
| phone_number     | VARCHAR(20)  |                    | Contact number                  |
| email           | VARCHAR(100) |                    | Customer email                  |
| date            | DATE         |                    | Reservation date                |
| time            | TIME         |                    | Reservation time                |
| number_of_guest | INT          |                    | Number of guests                |

### 2. MENU (Stores menu items)  

| Column Name  | Data Type      | Constraints         | Description                      |
|-------------|--------------|--------------------|----------------------------------|
| item_id     | INT          | PRIMARY KEY, AUTO_INCREMENT | Unique ID for each menu item |
| item_name   | VARCHAR(100) | NOT NULL           | Name of the dish               |
| price       | DECIMAL(10,2) | NOT NULL           | Price of the dish              |
| category    | VARCHAR(50)  | NOT NULL           | Category (e.g., appetizer)      |
| cuisine     | VARCHAR(50)  | NOT NULL           | Type of cuisine (e.g., Japanese)|

### 3. ADMIN (Stores admin login details)  

| Column Name | Data Type      | Constraints         | Description                      |
|------------|--------------|--------------------|----------------------------------|
| admin_id   | INT          | PRIMARY KEY, AUTO_INCREMENT | Unique ID for each admin |
| username   | VARCHAR(100) | NOT NULL, UNIQUE   | Admin username (must be unique) |
| password   | VARCHAR(255) | NOT NULL           | Admin password (hashed)         |
| email      | VARCHAR(100) |                    | Contact email                    |

### 4. STAFF (Stores staff details)  

| Column Name    | Data Type      | Constraints         | Description                      |
|---------------|--------------|--------------------|----------------------------------|
| staff_id      | INT          | PRIMARY KEY, AUTO_INCREMENT | Unique ID for each staff member |
| staff_name    | VARCHAR(100) |                    | Name of the staff member       |
| staff_shift   | VARCHAR(50)  |                    | Shift schedule (morning/evening) |
| email        | VARCHAR(100) |                    | Staff email                     |
| phone_number  | VARCHAR(20)  |                    | Contact number                   |
| staff_username | VARCHAR(50)  | NOT NULL, UNIQUE   | Unique username                  |
| password      | VARCHAR(255) |                    | Staff password (hashed)         |

### 5. ORDERS (Stores customer orders linked to reservations)  

| Column Name     | Data Type      | Constraints         | Description                      |
|---------------|--------------|--------------------|----------------------------------|
| order_id      | INT          | PRIMARY KEY, AUTO_INCREMENT | Unique ID for each order |
| reservation_id | INT          | FOREIGN KEY (RESERVATION) | Linked to `RESERVATION` |
| staff_no      | INT          | FOREIGN KEY (STAFF) | Staff member handling order |
| item_id       | INT          | FOREIGN KEY (MENU) | Ordered menu item |
| quantity      | INT          |                    | Number of items ordered |
| order_type    | VARCHAR(10)  |                    | Dine-in or Takeout |

### 6. PAYMENT (Stores payment details)  

| Column Name     | Data Type      | Constraints         | Description                      |
|---------------|--------------|--------------------|----------------------------------|
| payment_id    | INT          | PRIMARY KEY, AUTO_INCREMENT | Unique ID for each payment |
| reservation_id | INT          | FOREIGN KEY (RESERVATION) | Linked to `RESERVATION` |
| amount_paid   | DECIMAL(10,2) |                    | Total amount paid |
| payment_method | VARCHAR(50)  |                    | Payment type (e.g., credit card) |

## Relationships  
- `RESERVATION` is linked to `ORDERS` and `PAYMENT`.  
- `ORDERS` connects `RESERVATION`, `MENU`, and `STAFF`.  
- `STAFF` has unique usernames and manages orders.  
- `ADMIN` has unique credentials for managing the system.  
