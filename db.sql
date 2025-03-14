DROP DATABASE IF EXISTS barbershop;
CREATE DATABASE barbershop;
USE barbershop;

CREATE TABLE IF NOT EXISTS usuarios(
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_name VARCHAR(20) NOT NULL UNIQUE,
  email VARCHAR(50) NOT NULL UNIQUE,
  admin BOOLEAN NOT NULL DEFAULT FALSE,
  password VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS servicios(
  id INT PRIMARY KEY AUTO_INCREMENT,
  descripcion VARCHAR(20) NOT NULL,
  precio DECIMAL(6,2) NOT NULL
);

CREATE TABLE IF NOT EXISTS citas(
  id INT PRIMARY KEY AUTO_INCREMENT,
  fecha DATETIME NOT NULL,
  servicio INT,
  usuario INT,
  FOREIGN KEY(servicio) REFERENCES servicios(id)
  ON DELETE SET NULL 
  ON UPDATE CASCADE,
  FOREIGN KEY (usuario) REFERENCES usuarios(id)
  ON DELETE SET NULL 
  ON UPDATE CASCADE
);


-- Inserciones en la tabla 'usuarios'
INSERT INTO usuarios (user_name, email, admin, password) VALUES 
('admin', 'admin@barbershop.com', TRUE, 'admin123'),
('juanperez', 'juan.perez@gmail.com', FALSE, 'clavejuan'),
('mariolopez', 'mario.lopez@yahoo.com', FALSE, 'mariopass'),
('luciarod', 'lucia.rod@gmail.com', FALSE, 'lucia123'),
('carlosm', 'carlos.mendoza@hotmail.com', FALSE, 'carlos789');

-- Inserciones en la tabla 'servicios'
INSERT INTO servicios (descripcion, precio) VALUES 
('Corte de cabello', 150.00),
('Afeitado clásico', 100.00),
('Corte y barba', 200.00),
('Tinte de cabello', 250.00),
('Masaje capilar', 180.00);

-- Inserciones en la tabla 'citas'
INSERT INTO citas (fecha, servicio, usuario) VALUES 
('2024-03-15 10:00:00', 1, 2), -- Juan Pérez - Corte de cabello
('2024-03-16 11:30:00', 3, 3), -- Mario López - Corte y barba
('2024-03-17 09:00:00', 2, 4), -- Lucía Rodríguez - Afeitado clásico
('2024-03-18 14:45:00', 5, 5), -- Carlos Mendoza - Masaje capilar
('2024-03-19 16:00:00', 4, 2); -- Juan Pérez - Tinte de cabello
