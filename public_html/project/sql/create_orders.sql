CREATE TABLE IF NOT EXISTS Orders(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    total   DECIMAL(19 , 4 ) NOT NULL,
     money_recieved  DECIMAL(19 , 4 ) NOT NULL,
       payment_method varchar(30),
    address text,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
  
)