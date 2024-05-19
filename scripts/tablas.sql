use inventario;

CREATE TABLE `inventario` (
  `id` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `idProducto` int(6) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);


CREATE TABLE `movimientoinventario` (
  `id` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `idInventario` int(6) NOT NULL,
  `cantidadAntes` int(6) NOT NULL,
  `cantidadDespues` int(6) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idUsuario` int(6) NOT NULL
);


CREATE TABLE `productos` (
  `id` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(20,2) NOT NULL,
  `activo` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);


CREATE TABLE `roles` (
  `idRol` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombre` varchar(100) NOT NULL
);


CREATE TABLE `users` (
  `id` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idRol` int(6) NOT NULL,
  `status` int(1) DEFAULT 1
);


ALTER TABLE `movimientoinventario`
  ADD KEY `idUsuario` (`idUsuario`);

ALTER TABLE `users`
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `idRol` (`idRol`);


ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_inventario_productos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`);

ALTER TABLE `movimientoinventario`
  ADD CONSTRAINT `FK_movimientoinventario_inventario` FOREIGN KEY (`idInventario`) REFERENCES `inventario` (`id`),
  ADD CONSTRAINT `FK_movimientoinventario_users` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`);

ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

