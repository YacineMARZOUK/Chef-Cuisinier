alter TABLE utilisateur ADD CONSTRAINT role FOREIGN key (role) REFERENCES role(id_role) on delete CASCADE on UPDATE CASCADE ;

CREATE TABLE IF NOT EXISTS role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    nom_role VARCHAR(50) NOT NULL
);
INSERT INTO role (name) VALUES 
('Admin'),
('Utilisateur'),
('Client');