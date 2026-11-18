-- ============================================================
-- Base de datos de Crescendo (MySQL / MariaDB)
-- 5 tablas: categorias, productos, testimonios, beneficios, mensajes
--
-- XAMPP: en phpMyAdmin, pestaña "Importar" y elige este archivo.
-- IONOS: la base ya la creas en el panel con su propio nombre;
--        borra las 2 líneas de CREATE DATABASE y USE antes de importar.
-- ============================================================

SET NAMES utf8mb4;

DROP TABLE IF EXISTS mensajes;
DROP TABLE IF EXISTS testimonios;
DROP TABLE IF EXISTS productos;
DROP TABLE IF EXISTS categorias;
DROP TABLE IF EXISTS beneficios;

-- 1) Categorías de la sección "Compra por categoría"
CREATE TABLE categorias (
  id           INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre       VARCHAR(60)  NOT NULL,
  descripcion  VARCHAR(120) NOT NULL,
  clase_color  VARCHAR(20)  NOT NULL COMMENT 'Clase CSS del fondo: morado, azul-fondo, verde, naranja',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2) Productos destacados
CREATE TABLE productos (
  id             INT UNSIGNED NOT NULL AUTO_INCREMENT,
  categoria_id   INT UNSIGNED NOT NULL,
  nombre         VARCHAR(80)  NOT NULL,
  tipo           VARCHAR(40)  NOT NULL COMMENT 'Texto que se muestra sobre el nombre',
  etiqueta       VARCHAR(30)  NOT NULL COMMENT 'Nuevo, Más vendido, Oferta',
  clase_etiqueta VARCHAR(20)  NOT NULL COMMENT 'Clase CSS: violeta, rosa, azul',
  imagen_url     VARCHAR(255) NOT NULL,
  alt_imagen     VARCHAR(160) NOT NULL COMMENT 'Texto alternativo de la imagen',
  estrellas      TINYINT UNSIGNED NOT NULL DEFAULT 5,
  resenas        INT UNSIGNED NOT NULL DEFAULT 0,
  precio         DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_productos_categoria FOREIGN KEY (categoria_id)
    REFERENCES categorias (id) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3) Testimonios del carrusel
CREATE TABLE testimonios (
  id           INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre       VARCHAR(80)  NOT NULL,
  detalle      VARCHAR(80)  NOT NULL,
  estrellas    TINYINT UNSIGNED NOT NULL DEFAULT 5,
  comentario   TEXT         NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4) Beneficios de la franja inferior (envío gratis, pago seguro...)
CREATE TABLE beneficios (
  id           INT UNSIGNED NOT NULL AUTO_INCREMENT,
  titulo       VARCHAR(60)  NOT NULL,
  descripcion  VARCHAR(120) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5) Mensajes del formulario de contacto
CREATE TABLE mensajes (
  id         INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre     VARCHAR(80)  NOT NULL,
  telefono   VARCHAR(30)  NULL,
  correo     VARCHAR(120) NOT NULL,
  producto   VARCHAR(80)  NOT NULL,
  mensaje    TEXT         NOT NULL,
  creado_en  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------- Datos iniciales (los mismos de la página) ----------------
INSERT INTO categorias (nombre, descripcion, clase_color) VALUES
  ('Parlantes',  'Sonido potente y claro', 'morado'),
  ('Audífonos',  'Comodidad y calidad',    'azul-fondo'),
  ('Accesorios', 'Todo lo que necesitas',  'verde'),
  ('Cargadores', 'Carga con estilo',       'naranja');

INSERT INTO productos (categoria_id, nombre, tipo, etiqueta, clase_etiqueta, imagen_url, alt_imagen, estrellas, resenas, precio) VALUES
  (2, 'Earbud Y168A',  'Audífonos',  'Nuevo',       'violeta', 'https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?auto=format&fit=crop&w=700&q=85', 'Auriculares inalámbricos', 5, 128, 270.00),
  (2, 'Pro X168A',     'Headphones', 'Más vendido', 'rosa',    'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=700&q=85', 'Audífonos grandes',        5,  99, 250.00),
  (1, 'Speaker P168A', 'Parlantes',  'Oferta',      'azul',    'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?auto=format&fit=crop&w=700&q=85', 'Altavoz',                  5,  74, 240.00);

INSERT INTO testimonios (nombre, detalle, estrellas, comentario) VALUES
  ('Laura Martínez',      'Compró Earbud Y168A',   5, 'La batería me dura todo el día y el sonido es muy claro. No se salen cuando salgo a correr.'),
  ('Carlos Gómez',        'Compró Pro X168A',      5, 'Son cómodos incluso después de varias horas de uso y el bajo se escucha potente.'),
  ('Daniela Rojas',       'Compró Speaker P168A',  4, 'Suena mucho más fuerte de lo que esperaba por el precio. Lo uso en reuniones con amigos.'),
  ('Andrés Pardo',        'Cliente de Crescendo',  5, 'El envío llegó antes de lo prometido y el empaque venía muy bien cuidado.'),
  ('Camila Torres',       'Cliente de Crescendo',  5, 'Tuve una duda con la garantía y me respondieron el mismo día. Muy buena atención.'),
  ('Juan Sebastián Díaz', 'Cliente de Crescendo',  4, 'Cambié unos audífonos que no me quedaron y el proceso de devolución fue sencillo.');

INSERT INTO beneficios (titulo, descripcion) VALUES
  ('Envío gratis',         'En compras superiores a $50.'),
  ('Pago seguro',          'Tu información está protegida.'),
  ('Devoluciones fáciles', '30 días para devolver.'),
  ('Garantía de 1 año',    'En todos los productos.');
