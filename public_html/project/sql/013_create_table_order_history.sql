CREATE TABLE IF NOT EXISTS OrderItems(
    id int AUTO_INCREMENT PRIMARY KEY,
    order_id int,
    item_id int,
    quantity int,
    user_id int,
    cost DECIMAL(19 , 4 ) ,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (order_id) REFERENCES Orders(id),
    FOREIGN KEY (item_id) REFERENCES Products(id),
    check(quantity > 0)
)