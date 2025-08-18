--- DATABASE MYSQLI ---
CREATE DATABASE pos_project;

--- TABLE QUERY ---

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id VARCHAR(100),
    product_name VARCHAR(100),
    price DECIMAL(10,2)
);

INSERT INTO products (product_id, product_name, price) VALUES
('Hot Coffee', 'Caramel Macchiato', 150),
('Hot Coffee', 'Espresso', 120),
('Hot Coffee', 'Cappucino', 180),
('Hot Coffee', 'Caffe Misto', 120),

('Cold Coffee', 'Cold Brew', 120),
('Cold Coffee', 'Chocolate Cream', 170),
('Cold Coffee', 'Raspberry Cream ', 200),
('Cold Coffee', 'Salted Caramel Macchiato', 150),

('Non-Coffee', 'Lemon Tea', 150),
('Non-Coffee', 'Ice Tea', 150),
('Non-Coffee', 'Chai Latte', 180),
('Non-Coffee', 'Matcha Latte', 200);

