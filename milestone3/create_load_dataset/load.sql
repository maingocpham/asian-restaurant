INSERT INTO RESERVATION (customer_name, phone_number, email, date, time, number_of_guest) VALUES
('John Doe', '555-1234', 'johndoe@example.com', '2024-11-24', '19:00:00', 4),
('Jane Smith', '555-2345', 'janesmith@example.com', '2024-11-25', '20:00:00', 2),
('Mark Lee', '555-3456', 'marklee@example.com', '2024-11-26', '18:30:00', 3),
('Sarah Kim', '555-4567', 'sarahkim@example.com', '2024-11-27', '21:00:00', 5),
('Michael Chan', '555-5678', 'michaelchan@example.com', '2024-11-28', '19:30:00', 6),
('Linda Wu', '555-6789', 'lindawu@example.com', '2024-11-29', '18:00:00', 2),
('David Zhang', '555-7890', 'davidzhang@example.com', '2024-12-01', '20:30:00', 4),
('Rachel Lee', '555-8901', 'rachellee@example.com', '2024-12-02', '19:45:00', 3),
('Sophia Chen', '555-9012', 'sophiachen@example.com', '2024-12-03', '21:15:00', 5),
('Brian Park', '555-0123', 'brianpark@example.com', '2024-12-04', '17:00:00', 2);

-- Inserting all menu items into the Menu table
INSERT INTO Menu (item_name, price, category, cuisine) VALUES
('Edamame', 5.50, 'Appetizer', 'Japanese'),
('Gyoza', 7.50, 'Appetizer', 'Japanese'),
('Satay Chicken Skewers', 8.99, 'Appetizer', 'Thai'),
('Pork Dumplings', 6.99, 'Appetizer', 'Chinese'),
('Fresh Spring Rolls', 7.50, 'Appetizer', 'Vietnamese'),
('Crab Rangoon', 6.99, 'Appetizer', 'Chinese'),
('Vegetable Tempura', 9.99, 'Appetizer', 'Japanese'),
('Shrimp Toast', 7.99, 'Appetizer', 'Chinese'),
('Teriyaki Chicken', 14.99, 'Entree', 'Japanese'),
('Beef Pho', 13.99, 'Entree', 'Vietnamese'),
('Kung Pao Chicken', 12.99, 'Entree', 'Chinese'),
('Massaman Curry', 14.99, 'Entree', 'Thai'),
('Shrimp Fried Rice', 11.50, 'Entree', 'Chinese'),
('General Tso''s Chicken', 13.50, 'Entree', 'Chinese'),
('Spicy Tuna Roll', 12.99, 'Entree', 'Japanese'),
('Pad See Ew', 13.50, 'Entree', 'Thai'),
('Miso Soup', 3.99, 'Soup', 'Japanese'),
('Tom Yum Soup', 8.99, 'Soup', 'Thai'),
('Hot and Sour Soup', 6.99, 'Soup', 'Chinese'),
('Egg Drop Soup', 5.50, 'Soup', 'Chinese'),
('Seaweed Soup', 7.50, 'Soup', 'Japanese'),
('Chicken Coconut Soup', 9.50, 'Soup', 'Thai'),
('Mango Sticky Rice', 6.50, 'Dessert', 'Thai'),
('Fried Banana with Honey', 5.99, 'Dessert', 'Thai'),
('Sesame Balls', 4.50, 'Dessert', 'Chinese'),
('Mochi Ice Cream', 4.99, 'Dessert', 'Japanese'),
('Red Bean Pancake', 5.50, 'Dessert', 'Chinese'),
('Green Tea Cheesecake', 6.50, 'Dessert', 'Japanese'),
('Taro Custard', 5.99, 'Dessert', 'Thai');


-- Insert data into the ADMIN table
INSERT INTO ADMIN (username, password, email) VALUES
('admin_rockstar', 'SecurePass123!', 'rockstar_admin@company.com'),
('superboss', 'Adm1nMaster!', 'superboss@companydomain.com'),
('chef_in_charge', 'KitchensAreSecure!', 'chef_in_charge@restaurant.com'),
('tech_guru', 'TechyAdmin42!', 'tech_guru@techworld.com'),
('account_wizard', 'MoneyMagic789!', 'account_wizard@finances.com'),
('creative_mind', 'ThinkOutLoud2024!', 'creative.mind@designs.com'),
('marketing_maven', 'Marketer1234!', 'marketing.maven@brand.com'),
('operations_king', 'OpsKing2024!', 'operations_king@workplace.com'),
('admin_jedi', 'ForceAdmin2024!', 'admin.jedi@galaxy.com'),
('security_sensei', 'GuardiansOfData123!', 'security_sensei@security.com');

-- Insert data into the STAFF table
INSERT INTO STAFF (staff_name, staff_shift, email, phone_number, staff_username, password) VALUES
('Michael Scott', 'Morning', 'michael.scott@email.com', '555-1111', 'mscott', 'password1'),
('Dwight Schrute', 'Afternoon', 'dwight.schrute@email.com', '555-2222', 'dschrute', 'password2'),
('Jim Halpert', 'Evening', 'jim.halpert@email.com', '555-3333', 'jhalpert', 'password3'),
('Pam Beesly', 'Morning', 'pam.beesly@email.com', '555-4444', 'pbeesly', 'password4'),
('Angela Martin', 'Afternoon', 'angela.martin@email.com', '555-5555', 'amartin', 'password5'),
('Ryan Howard', 'Evening', 'ryan.howard@email.com', '555-6666', 'rhoward', 'password6'),
('Stanley Hudson', 'Morning', 'stanley.hudson@email.com', '555-7777', 'shudson', 'password7'),
('Phyllis Vance', 'Afternoon', 'phyllis.vance@email.com', '555-8888', 'pvance', 'password8'),
('Creed Bratton', 'Evening', 'creed.bratton@email.com', '555-9999', 'cbratton', 'password9'),
('Oscar Martinez', 'Morning', 'oscar.martinez@email.com', '555-0000', 'omartinez', 'password10');

-- Insert data into the ORDERS table
INSERT INTO ORDERS (reservation_id, staff_no, item_id, quantity, order_type) VALUES
(1, 1, 1, 2, 'Dine-In'),
(2, 2, 2, 1, 'Takeout'),
(3, 3, 3, 3, 'Dine-In'),
(4, 4, 4, 1, 'Takeout'),
(5, 5, 5, 2, 'Dine-In'),
(6, 6, 6, 4, 'Dine-In'),
(7, 7, 7, 1, 'Takeout'),
(8, 8, 8, 2, 'Dine-In'),
(9, 9, 9, 3, 'Takeout'),
(10, 10, 10, 2, 'Dine-In');

-- Insert data into the PAYMENT table
INSERT INTO PAYMENT (reservation_id, amount_paid, payment_method) VALUES
(1, 23.96, 'Credit Card'),
(2, 18.99, 'Cash'),
(3, 38.97, 'Credit Card'),
(4, 7.49, 'Cash'),
(5, 74.95, 'Credit Card'),
(6, 39.96, 'Cash'),
(7, 23.98, 'Credit Card'),
(8, 68.97, 'Cash'),
(9, 19.98, 'Credit Card'),
(10, 8.99, 'Cash');

