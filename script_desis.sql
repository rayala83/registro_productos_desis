-- 1. Crear tabla de Bodegas
CREATE TABLE bodegas (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- 2. Crear tabla de Sucursales
CREATE TABLE sucursales (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    bodega_id INTEGER REFERENCES bodegas(id) ON DELETE CASCADE
);

-- 3. Crear tabla de Productos
CREATE TABLE productos (
    id SERIAL PRIMARY KEY,
    codigo VARCHAR(15) UNIQUE NOT NULL, 
    nombre VARCHAR(50) NOT NULL,
    bodega_id INTEGER REFERENCES bodegas(id),
    sucursal_id INTEGER REFERENCES sucursales(id),
    moneda VARCHAR(20),
    precio DECIMAL(10, 2), 
    materiales TEXT,       
    descripcion TEXT
);

-- 4. Crear tabla Monedas
CREATE TABLE monedas (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    simbolo VARCHAR(5)
);



-- 5. Insertar Datos Ficticios
INSERT INTO bodegas (nombre) VALUES ('Bodega Central'), ('Bodega Norte'), ('Bodega Sur');

-- Sucursales para Bodega Central (ID 1)
INSERT INTO sucursales (nombre, bodega_id) VALUES ('Sucursal Maipú', 1), ('Sucursal Florida', 1);
-- Sucursales para Bodega Norte (ID 2)
INSERT INTO sucursales (nombre, bodega_id) VALUES ('Sucursal Antofagasta', 2), ('Sucursal Iquique', 2);
-- Sucursales para Bodega Sur (ID 3)
INSERT INTO sucursales (nombre, bodega_id) VALUES ('Sucursal Temuco', 3);
-- Tipos de monedas
INSERT INTO monedas (nombre, simbolo) VALUES ('Peso Chileno', '$'), ('Dólar', 'USD'), ('Euro', '€');