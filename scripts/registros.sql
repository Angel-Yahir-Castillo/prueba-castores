use inventario;

INSERT INTO `productos` (`id`, `nombre`, `precio`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'computadora dell', '15000.00', 1, '2024-05-18 17:26:49', '2024-05-19 07:20:28'),
(2, 'laptop hp', '12000.00', 1, '2024-05-18 17:26:50', '2024-05-18 23:38:35'),
(3, 'iphone 14', '18500.00', 0, '2024-05-18 17:26:50', '2024-05-19 06:32:31');

INSERT INTO `inventario` (`id`, `idProducto`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2024-05-18 21:29:38', '2024-05-19 07:23:27'),
(2, 2, 3, '2024-05-18 21:29:39', '2024-05-18 21:29:42'),
(3, 3, 6, '2024-05-18 21:29:39', '2024-05-19 06:28:33');

INSERT INTO `roles` (`idRol`, `nombre`) VALUES
(1, 'administrador'),
(2, 'almacenista');

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `idRol`, `status`) VALUES
(3, 'Angel Yahir', 'admin@castores.com', '$2y$12$nLEhN3Jdf3nNozf9kbAuDO5aIlveWQGBUCV.mdIjRhuHBb497b5k.', '2024-05-18 09:01:05', '2024-05-18 09:01:05', 1, 1),
(4, 'Juan Perez', 'almacen@castores.com', '$2y$12$zvCEr9VkSTxT.JVLse7Qpe3TnDkFfl2WW79aZNVbNLBMpkYCODB5a', '2024-05-18 09:01:43', '2024-05-18 09:01:43', 2, 1);