
CREATE TABLE IF NOT EXISTS Products(
    id int AUTO_INCREMENT PRIMARY  KEY,
    name varchar(30) UNIQUE, -- alternatively you'd have a SKU that's unique
    description text,
    category varchar(30),
    stock int DEFAULT  0,
    unit_price DECIMAL(19 , 4 ) NOT NULL, -- my cost is int because I don't have regular currency; shop people may want to record it as pennies
    image text, -- this col type can't have a default value; this isn't required for any project, I chose to add it for mine
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    is_visible TINYINT(1) default 1
    ,
    check (stock >= 0), -- don't allow negative stock; I don't allow backorders
    check (unit_price >= 0) -- don't allow negative costs
)
