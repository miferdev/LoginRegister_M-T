CREATE TABLE CLIENTE (
    id_cliente SERIAL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    contrasenia VARCHAR(255) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    telefono VARCHAR(13),
    direccion_envio VARCHAR(255),
    ciudad VARCHAR(100),
    codigo_postal VARCHAR(20) 
);
