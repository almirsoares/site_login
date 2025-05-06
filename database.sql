CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_login DATETIME,
    is_active BOOLEAN DEFAULT TRUE
);

INSERT INTO users (username, password_hash, email, created_at, last_login, is_active) VALUES
('admin', '$2y$10$eImiTXuWVxfM37uY4W8jOe1g8H5g1Q5W1g1g1g1g1g1g1g1g1g1', 'admin@example.com', NOW(), NULL, TRUE),
('user', '$2y$10$eImiTXuWVxfM37uY4W8jOe1g8H5g1Q5W1g1g1g1g1g1g1g1g1g1', 'user@example.com', NOW(), NULL, TRUE);