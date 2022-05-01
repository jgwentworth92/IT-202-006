CREATE TABLE IF NOT EXISTS Ratings(
    id int AUTO_INCREMENT PRIMARY  KEY,
    product_id int,
    user_id int DEFAULT  0,
    raitng int, -- my cost is int because I don't have regular currency; shop people may want to record it as pennies
    comment text, -- this col type can't have a default value; this isn't required for any project, I chose to add it for mine
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    check (rating>= 1),
    check (rating <= 5)

)
