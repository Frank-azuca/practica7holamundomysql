-- Se ejecuta automáticamente la primera vez que arranca el contenedor de MySQL
CREATE TABLE IF NOT EXISTS saludos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texto VARCHAR(255) NOT NULL
);

INSERT INTO saludos (texto) VALUES ('Hola Mundo desde MySQL');
