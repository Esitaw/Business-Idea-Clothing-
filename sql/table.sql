CREATE TABLE designers (
    designer_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    date_of_birth VARCHAR (50),
    department TEXT,  -- For example: "men's wear", "casual fashion", etc.
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE purchases (
    purchase_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR (100),
    item_name VARCHAR (100),
    price DECIMAL(10, 2),
    designer_id INT,  
    date_of_purchase TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (designer_id) REFERENCES designers(designer_id)
);
