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
('Hot Coffe', 'Caramel Macchiato', 150),
('Hot Coffe', 'Espresso', 120),
('Hot Coffe', 'Cappucino', 180),
('Hot Coffe', 'Caffe Misto', 120),

('Cold Coffe', 'Cold Brew', 120),
('Cold Coffe', 'Chocolate Cream', 170),
('Cold Coffe', 'Raspberry Cream ', 200),
('Cold Coffe', 'Salted Caramel Macchiato', 150),

('Non-Coffe', 'Lemon Tea', 150),
('Non-Coffe', 'Ice Tea', 150),
('Non-Coffe', 'Chai Latte', 180),
('Non-Coffe', 'Matcha Latte', 200);

