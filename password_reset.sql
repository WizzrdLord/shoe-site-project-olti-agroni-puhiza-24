CREATE TABLE passwordreset (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    selector TEXT NOT NULL,
    token VARCHAR(255) NOT NULL, 
    expires_at DATETIME NOT NULL

    
);