CREATE TABLE months (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    subtitle VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    tip TEXT NOT NULL,
    months_left INT NOT NULL,
    emoji VARCHAR(20) NOT NULL
);
