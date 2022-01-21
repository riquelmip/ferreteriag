/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : db_ferreteria

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 20/01/2022 18:09:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cargo
-- ----------------------------
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo`  (
  `idcargo` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idcargo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cargo
-- ----------------------------
INSERT INTO `cargo` VALUES (1, 'Jefe');
INSERT INTO `cargo` VALUES (5, 'Vendedor');
INSERT INTO `cargo` VALUES (8, 'Administrador');
INSERT INTO `cargo` VALUES (9, 'Asesor Comercial');
INSERT INTO `cargo` VALUES (10, 'Encargado');
INSERT INTO `cargo` VALUES (11, 'Carguero de Producto');

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idcategoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES (13, 'Equipamiento');
INSERT INTO `categoria` VALUES (14, 'Cerrajería');
INSERT INTO `categoria` VALUES (15, 'Fontanería');
INSERT INTO `categoria` VALUES (16, 'Materiales eléctricos');
INSERT INTO `categoria` VALUES (17, 'Herramientas');
INSERT INTO `categoria` VALUES (18, 'Productos manufacturados');
INSERT INTO `categoria` VALUES (19, 'Herramientas de mano');
INSERT INTO `categoria` VALUES (20, 'Componentes diversos');
INSERT INTO `categoria` VALUES (21, 'Herramientas de sujeción');
INSERT INTO `categoria` VALUES (22, 'Elementos de unión');
INSERT INTO `categoria` VALUES (23, 'Herramientas abrasivas');
INSERT INTO `categoria` VALUES (24, 'Artículos para el hogar');
INSERT INTO `categoria` VALUES (25, 'Tuberías y sus accesorios');

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `idcliente` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dui` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idcliente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (27, 'George Reece', 'Michael Richard', '12221123-3', 1, '2333-2344');
INSERT INTO `cliente` VALUES (28, 'Damian Thomas', 'Charlotte', '23342425-4', 1, '2344-2424');
INSERT INTO `cliente` VALUES (29, 'Sophie Tracy', 'Smith Murphy', '23232456-5', 1, '2356-5434');
INSERT INTO `cliente` VALUES (30, 'Madison Jessica', 'Jones O\'Kelly', '87654345-6', 1, '2345-4326');
INSERT INTO `cliente` VALUES (31, 'Sarah Jessica', 'Taylor Smith', '76543234-5', 1, '2345-6543');

-- ----------------------------
-- Table structure for compra
-- ----------------------------
DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra`  (
  `idcompra` bigint(20) NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `credito` double NULL DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `monto` double NOT NULL,
  `idproveedor` bigint(20) NOT NULL,
  `idusuario` bigint(20) NOT NULL,
  `fecha_credito` date NULL DEFAULT NULL,
  PRIMARY KEY (`idcompra`) USING BTREE,
  INDEX `fk_compraprov`(`idproveedor`) USING BTREE,
  INDEX `fk_usucompra`(`idusuario`) USING BTREE,
  CONSTRAINT `fk_compraprov` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_usucompra` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of compra
-- ----------------------------
INSERT INTO `compra` VALUES (14, 19, 1, 2022, 0, 0, 27092, 5, 17, '0000-00-00');
INSERT INTO `compra` VALUES (15, 19, 1, 2022, 12, 0, 10.17, 5, 17, '2022-01-19');

-- ----------------------------
-- Table structure for detallecompra
-- ----------------------------
DROP TABLE IF EXISTS `detallecompra`;
CREATE TABLE `detallecompra`  (
  `iddetalle` bigint(20) NOT NULL AUTO_INCREMENT,
  `idcompra` bigint(20) NOT NULL,
  `idproducto` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciocompra` double NOT NULL,
  `precioventa` double NOT NULL,
  PRIMARY KEY (`iddetalle`) USING BTREE,
  INDEX `fk_compra`(`idcompra`) USING BTREE,
  INDEX `fk_productocompra`(`idproducto`) USING BTREE,
  CONSTRAINT `fk_compra` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_compraprod` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detallecompra
-- ----------------------------
INSERT INTO `detallecompra` VALUES (11, 14, 8, 100, 1.49, 1.639);
INSERT INTO `detallecompra` VALUES (12, 14, 9, 100, 4.55, 5.005);
INSERT INTO `detallecompra` VALUES (13, 14, 10, 100, 10, 11);
INSERT INTO `detallecompra` VALUES (14, 14, 11, 100, 15, 16.5);
INSERT INTO `detallecompra` VALUES (15, 14, 12, 100, 18.9, 20.79);
INSERT INTO `detallecompra` VALUES (16, 14, 13, 100, 19.2, 21.12);
INSERT INTO `detallecompra` VALUES (17, 14, 14, 100, 3.5, 3.85);
INSERT INTO `detallecompra` VALUES (18, 14, 15, 100, 4.5, 4.95);
INSERT INTO `detallecompra` VALUES (19, 14, 16, 100, 6.5, 7.15);
INSERT INTO `detallecompra` VALUES (20, 14, 17, 100, 2.5, 2.75);
INSERT INTO `detallecompra` VALUES (21, 14, 18, 100, 3.79, 4.169);
INSERT INTO `detallecompra` VALUES (22, 14, 19, 100, 2.55, 2.805);
INSERT INTO `detallecompra` VALUES (23, 14, 20, 100, 1.44, 1.584);
INSERT INTO `detallecompra` VALUES (24, 14, 21, 100, 50.5, 55.55);
INSERT INTO `detallecompra` VALUES (25, 14, 22, 100, 123, 135.3);
INSERT INTO `detallecompra` VALUES (26, 14, 23, 100, 3.5, 3.85);
INSERT INTO `detallecompra` VALUES (27, 15, 8, 9, 1.13, 1.243);

-- ----------------------------
-- Table structure for detalleventa
-- ----------------------------
DROP TABLE IF EXISTS `detalleventa`;
CREATE TABLE `detalleventa`  (
  `iddetalle` bigint(20) NOT NULL AUTO_INCREMENT,
  `idventa` bigint(20) NOT NULL,
  `idproducto` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle`) USING BTREE,
  INDEX `fk_productoventa`(`idventa`) USING BTREE,
  INDEX `fk_ventaprod`(`idproducto`) USING BTREE,
  CONSTRAINT `fk_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ventaprod` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalleventa
-- ----------------------------
INSERT INTO `detalleventa` VALUES (24, 18, 8, 12);
INSERT INTO `detalleventa` VALUES (25, 18, 11, 15);
INSERT INTO `detalleventa` VALUES (26, 19, 10, 14);
INSERT INTO `detalleventa` VALUES (27, 19, 16, 15);
INSERT INTO `detalleventa` VALUES (28, 20, 11, 56);
INSERT INTO `detalleventa` VALUES (29, 21, 10, 5);
INSERT INTO `detalleventa` VALUES (30, 21, 15, 15);
INSERT INTO `detalleventa` VALUES (31, 22, 9, 44);
INSERT INTO `detalleventa` VALUES (32, 23, 14, 14);
INSERT INTO `detalleventa` VALUES (33, 23, 21, 22);
INSERT INTO `detalleventa` VALUES (34, 24, 23, 13);
INSERT INTO `detalleventa` VALUES (35, 24, 19, 14);

-- ----------------------------
-- Table structure for empleado
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado`  (
  `idempleado` bigint(20) NOT NULL AUTO_INCREMENT,
  `dui` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nit` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `idcargo` bigint(20) NOT NULL,
  PRIMARY KEY (`idempleado`) USING BTREE,
  INDEX `fk_cargo`(`idcargo`) USING BTREE,
  CONSTRAINT `fk_cargo` FOREIGN KEY (`idcargo`) REFERENCES `cargo` (`idcargo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of empleado
-- ----------------------------
INSERT INTO `empleado` VALUES (1, '01667277-6', 'Super Admin', 'Ferreteria', '0000-010103-100-1', 'Calle El matadragon', '2333-3333', 10, 12, 2003, 1, 1);
INSERT INTO `empleado` VALUES (2, '01777374-7', 'William Antonio', 'Del Cid Mejia', '0001-012781-300-3', 'Reparto Las Naranjas', '2333-3223', 17, 12, 2003, 1, 5);
INSERT INTO `empleado` VALUES (21, '01112221-2', 'Oliver Jake', 'Noah James', '1222-122231-212-1', '1959 NE 153 ST', '7666-5656', 10, 10, 2003, 1, 8);
INSERT INTO `empleado` VALUES (22, '42222222-3', 'Jack Connor', 'Liam John', '3323-331222-123-1', '3160 W Fox Run WaySan Diego, CA 92111', '2333-1333', 16, 9, 2000, 1, 9);
INSERT INTO `empleado` VALUES (23, '31222222-2', 'Harry Callum', 'Mason Michael', '1214-245436-622-2', '2800 Hitching Post LnOrlando, FL 32822', '2333-2323', 10, 2, 2000, 1, 10);
INSERT INTO `empleado` VALUES (24, '43233333-3', 'Charlie Kyle', 'William David', '2333-242444-424-2', '4532 Brian Head StLas Vegas, NV 89122', '2222-3454', 13, 12, 1998, 1, 11);

-- ----------------------------
-- Table structure for imagen
-- ----------------------------
DROP TABLE IF EXISTS `imagen`;
CREATE TABLE `imagen`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_imagenprod`(`productoid`) USING BTREE,
  CONSTRAINT `fk_imagenprod` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of imagen
-- ----------------------------
INSERT INTO `imagen` VALUES (13, 8, 'pro_c4fe1c240cc291a20e68bd03af24e22d.jpg');
INSERT INTO `imagen` VALUES (15, 9, 'pro_de56f6533ca964f4223cf46ef9e3826b.jpg');
INSERT INTO `imagen` VALUES (16, 10, 'pro_875a92ded6530f89afbc9c10899ba615.jpg');
INSERT INTO `imagen` VALUES (17, 11, 'pro_89dfd2b781a0b73b933bcacb57debda1.jpg');
INSERT INTO `imagen` VALUES (18, 12, 'pro_56e1a346bdaa336cf2378b6e797b0876.jpg');
INSERT INTO `imagen` VALUES (19, 13, 'pro_a443d6c6b20debc05051fc345e9d5778.jpg');
INSERT INTO `imagen` VALUES (21, 14, 'pro_110e910588480f1f4ef0be4f78e9e9d1.jpg');
INSERT INTO `imagen` VALUES (22, 15, 'pro_ebf309fb260c1aff77916120044a66d7.jpg');
INSERT INTO `imagen` VALUES (23, 16, 'pro_b2c8a6ad3bef5bf919cb0bd5dce59e4c.jpg');
INSERT INTO `imagen` VALUES (24, 17, 'pro_19693c12f00a85b084f49b64a931f1c0.jpg');
INSERT INTO `imagen` VALUES (25, 18, 'pro_46a90749ea87b80c1b54c845daaf756e.jpg');
INSERT INTO `imagen` VALUES (26, 19, 'pro_0f06ccec30e5e430101b5e478129ce56.jpg');
INSERT INTO `imagen` VALUES (27, 20, 'pro_45f4aa9a1a7da0a471badc2abdb9b2c2.jpg');
INSERT INTO `imagen` VALUES (28, 21, 'pro_d6b1215f0d012056b84b05967fbf5e75.jpg');
INSERT INTO `imagen` VALUES (29, 22, 'pro_05d8dd631718ca608b9b9d6f940fe1c0.jpg');
INSERT INTO `imagen` VALUES (30, 23, 'pro_467af36ed59c49a2582e5cf0cba7b1b7.jpg');

-- ----------------------------
-- Table structure for marca
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca`  (
  `idmarca` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`idmarca`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of marca
-- ----------------------------
INSERT INTO `marca` VALUES (39, 'Truper', 1);
INSERT INTO `marca` VALUES (40, 'Urrea', 1);
INSERT INTO `marca` VALUES (41, 'Nacobre', 1);
INSERT INTO `marca` VALUES (42, 'Bosch', 1);
INSERT INTO `marca` VALUES (43, 'IUSA', 1);
INSERT INTO `marca` VALUES (44, 'DeWalt', 1);
INSERT INTO `marca` VALUES (45, 'Rotoplas', 1);
INSERT INTO `marca` VALUES (46, 'Austromex', 1);
INSERT INTO `marca` VALUES (47, 'Phillips', 1);
INSERT INTO `marca` VALUES (48, 'Makita', 1);

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo`  (
  `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idmodulo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES (1, 'Inicio', 'Pantalla Principal', 1);
INSERT INTO `modulo` VALUES (2, 'Usuarios', 'Usuarios del sistema', 1);
INSERT INTO `modulo` VALUES (3, 'Roles de Usuario', 'Roles de Usuario del Sistema', 1);
INSERT INTO `modulo` VALUES (4, 'Empleados', 'Registrar, Editar y/o Eliminar empleados', 1);
INSERT INTO `modulo` VALUES (5, 'Compras', 'Compras', 1);
INSERT INTO `modulo` VALUES (6, 'Inventario', 'Inventario', 1);
INSERT INTO `modulo` VALUES (7, 'Ventas', 'Ventas', 1);
INSERT INTO `modulo` VALUES (8, 'Clientes', 'Clientes', 1);
INSERT INTO `modulo` VALUES (9, 'Productos', 'Productos', 1);
INSERT INTO `modulo` VALUES (10, 'Proveedores', 'Proveedores', 1);
INSERT INTO `modulo` VALUES (11, 'Marca', 'Marca de los productos', 1);
INSERT INTO `modulo` VALUES (12, 'Unidad de Medida', 'Unidad de Medida', 1);
INSERT INTO `modulo` VALUES (13, 'Categoria', 'Cateoria', 1);
INSERT INTO `modulo` VALUES (14, 'Cargos', 'Cargos', 1);

-- ----------------------------
-- Table structure for permisos
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos`  (
  `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `leer` int(11) NOT NULL DEFAULT 0,
  `escribir` int(11) NOT NULL DEFAULT 0,
  `actualizar` int(11) NOT NULL DEFAULT 0,
  `eliminar` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idpermiso`) USING BTREE,
  INDEX `rolid`(`rolid`) USING BTREE,
  INDEX `moduloid`(`moduloid`) USING BTREE,
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 307 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES (181, 1, 1, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (182, 1, 2, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (183, 1, 3, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (184, 1, 4, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (185, 1, 5, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (186, 1, 6, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (187, 1, 7, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (188, 1, 8, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (189, 1, 9, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (190, 1, 10, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (191, 1, 11, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (192, 1, 12, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (193, 1, 13, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (194, 1, 14, 1, 1, 1, 1);
INSERT INTO `permisos` VALUES (293, 14, 1, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (294, 14, 2, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (295, 14, 3, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (296, 14, 4, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (297, 14, 5, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (298, 14, 6, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (299, 14, 7, 0, 0, 0, 0);
INSERT INTO `permisos` VALUES (300, 14, 8, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (301, 14, 9, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (302, 14, 10, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (303, 14, 11, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (304, 14, 12, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (305, 14, 13, 1, 0, 0, 0);
INSERT INTO `permisos` VALUES (306, 14, 14, 1, 0, 0, 0);

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `idproducto` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigobarra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idmarca` bigint(20) NOT NULL,
  `idcategoria` bigint(20) NOT NULL,
  `idunidadmedida` bigint(20) NOT NULL,
  `precio` double NULL DEFAULT NULL,
  PRIMARY KEY (`idproducto`) USING BTREE,
  INDEX `fk_marcaprod`(`idmarca`) USING BTREE,
  INDEX `fk_unidadmprod`(`idunidadmedida`) USING BTREE,
  INDEX `fk_categoria`(`idcategoria`) USING BTREE,
  CONSTRAINT `fk_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_marcaprod` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`idmarca`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_unidadmprod` FOREIGN KEY (`idunidadmedida`) REFERENCES `unidadmedida` (`idunidad`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES (8, '00001', 'ESMERIL ANGULAR 4-1/2 PULG 780W BDEG400', 1, 97, '', 39, 13, 15, 1.639);
INSERT INTO `producto` VALUES (9, '00002', 'TALADRO PERCUTOR 1/2 PULG 680W 5374-20', 1, 56, '', 39, 19, 15, 5.005);
INSERT INTO `producto` VALUES (10, '00003', 'SIERRA CALADORA 400W BOSCH GST 65 BE', 1, 81, '', 39, 13, 15, 11);
INSERT INTO `producto` VALUES (11, '00004', 'TRIMMER ELÉCTRICO GL300 DE 9 PULG CONEXIÓN 120 V', 1, 29, '', 39, 13, 15, 16.5);
INSERT INTO `producto` VALUES (12, '00005', 'MARTILLO CABEZA PLÁSTICA 35MM', 1, 100, '', 39, 17, 15, 20.79);
INSERT INTO `producto` VALUES (13, '00006', 'MARTILLO DE HULE 1-1/4 LB', 1, 100, '', 39, 17, 8, 21.12);
INSERT INTO `producto` VALUES (14, '00007', 'MARTILLO DE HULE 16 OZ MANGO DE FIBRA', 1, 86, '', 39, 17, 15, 3.85);
INSERT INTO `producto` VALUES (15, '00008', 'TACTIX - JUEGO DE TARRAJA PARA PERNOS 6/32-5/16 PULG 13 PIEZAS', 1, 85, '', 47, 17, 9, 4.95);
INSERT INTO `producto` VALUES (16, '00009', 'TACTIX - JUEGO DE TARRAJA PARA PERNOS 3-8MM 13 PIEZAS', 1, 85, '', 47, 17, 9, 7.15);
INSERT INTO `producto` VALUES (17, '00010', 'SUPER EGO - CABEZAL PARA TARRAJA 1 PULG', 1, 100, '', 47, 17, 9, 2.75);
INSERT INTO `producto` VALUES (18, '00011', 'STANLEY - CUBO 7MM MANDO 1/4 PULG 6 PUNTOS', 1, 100, '', 42, 15, 16, 4.169);
INSERT INTO `producto` VALUES (19, '00012', 'STANLEY - CUBO 8MM MANDO 1/4 PULG 6 PUNTOS', 1, 86, '', 39, 13, 16, 2.805);
INSERT INTO `producto` VALUES (20, '00013', 'STANLEY - CUBO 9MM MANDO 1/4 PULG 6 PUNTOS', 1, 100, '', 41, 15, 16, 1.584);
INSERT INTO `producto` VALUES (21, '00014', 'FLOTEC - TANQUE DE PRESIÓN 220 GAL', 1, 78, '', 41, 15, 16, 55.55);
INSERT INTO `producto` VALUES (22, '00015', 'FLOTEC - TANQUE DE PRESIÓN 42 GAL', 1, 100, '', 41, 15, 16, 135.3);
INSERT INTO `producto` VALUES (23, '00016', 'YALE - CERRADURA PRINCIPAL MANCHESTER LLAVE-LLAVE', 1, 87, '', 41, 14, 16, 3.85);

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor`  (
  `idproveedor` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contacto_vendedor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idproveedor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
INSERT INTO `proveedor` VALUES (5, 'YALE S.A de C.V', 'CROMO SATINADO PLATEADO', 1, '2333-2333', 'ADRIANA CAROLINA HERNANDEZ MONTERROZA');
INSERT INTO `proveedor` VALUES (6, 'AZO ENGINEERED SYSTEMS, S.A. DE C.V.', 'SAN SALVADOR LA PALMA GUADALUPE VICTORIA', 1, '2323-3233', 'ADRIANA MARCELA REY SANCHEZ');
INSERT INTO `proveedor` VALUES (7, 'CONTROLES, INGENIERÍA Y MEDICIÓN, S.A. DE C.V.', 'SAN SALVADOR SAN MIGUEL ACAMBAY MELCHOR OCAMPO', 1, '2333-2333', 'ANDREA CATALINA ACERO CARO');
INSERT INTO `proveedor` VALUES (8, 'FLUIDOS TECNICOS, S.A. DE C.V.', 'SAN SALVADOR SAN ANTONIO CASA GRANDE FELIPE ANGELES', 1, '2333-2323', 'ANGELICA LISSETH BLANCO CONCHA');

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `idrol` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idrol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'Administrador', 'Administrador', 1);
INSERT INTO `rol` VALUES (14, 'Vendedor', 'Este Rol sera para los vendedores de la Ferreteria Granadeño', 1);
INSERT INTO `rol` VALUES (15, 'Jefe', 'Jefe de area encargado de revisar y permitir los demas usos de los roles, asignación y verificación de material', 1);
INSERT INTO `rol` VALUES (16, 'Encargado', 'Encargado de area para evaluación y revisar el desempeño realizado', 1);
INSERT INTO `rol` VALUES (17, 'Carguero de Producto', 'Carguero de Producto, se especializara en cargar y descargar los cambiones de productos', 1);
INSERT INTO `rol` VALUES (18, 'Asesor Comercial', 'Miembros del sistema que traen y muestran el catalogo de productos', 1);

-- ----------------------------
-- Table structure for unidadmedida
-- ----------------------------
DROP TABLE IF EXISTS `unidadmedida`;
CREATE TABLE `unidadmedida`  (
  `idunidad` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idunidad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unidadmedida
-- ----------------------------
INSERT INTO `unidadmedida` VALUES (8, 'Kilogramo');
INSERT INTO `unidadmedida` VALUES (9, 'Caja');
INSERT INTO `unidadmedida` VALUES (10, 'Metro');
INSERT INTO `unidadmedida` VALUES (11, 'Pulgada');
INSERT INTO `unidadmedida` VALUES (12, 'Litro');
INSERT INTO `unidadmedida` VALUES (13, 'Onza');
INSERT INTO `unidadmedida` VALUES (14, 'Gramo');
INSERT INTO `unidadmedida` VALUES (15, 'Unidad');
INSERT INTO `unidadmedida` VALUES (16, 'Pieza');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `idusuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `contrasena` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `idempleado` bigint(20) NULL DEFAULT NULL,
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime(0) NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idusuario`) USING BTREE,
  INDEX `rolid`(`rolid`) USING BTREE,
  INDEX `fk_empleado`(`idempleado`) USING BTREE,
  CONSTRAINT `fk_empleado` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'ferreteriagradanenio12@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, '', 1, '2021-08-11 16:22:35', 1);
INSERT INTO `usuario` VALUES (17, '12', '75b3897ea5239a738b3ba1061e19e052c6181043d248d0f099d5b09a8dee8ba7', 2, '', 1, '2021-11-02 15:42:21', 1);

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta`  (
  `idventa` bigint(20) NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `monto` double NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `idcliente` bigint(20) NOT NULL,
  `idusuario` bigint(20) NOT NULL,
  `subtotal` double NULL DEFAULT NULL,
  `iva` double NULL DEFAULT NULL,
  PRIMARY KEY (`idventa`) USING BTREE,
  INDEX `fk_clienteventa`(`idcliente`) USING BTREE,
  INDEX `fk_usuventa`(`idusuario`) USING BTREE,
  CONSTRAINT `fk_clienteventa` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_usuventa` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of venta
-- ----------------------------
INSERT INTO `venta` VALUES (18, 19, 1, 2022, 301.91, 1, 27, 17, 267.18, 34.73);
INSERT INTO `venta` VALUES (19, 19, 1, 2022, 295.21, 1, 28, 17, 261.25, 33.96);
INSERT INTO `venta` VALUES (20, 19, 1, 2022, 1044.12, 1, 30, 17, 924, 120.12);
INSERT INTO `venta` VALUES (21, 18, 1, 2022, 146.05, 1, 28, 17, 129.25, 16.8);
INSERT INTO `venta` VALUES (22, 19, 1, 2022, 248.6, 1, 27, 17, 220, 28.6);
INSERT INTO `venta` VALUES (23, 21, 1, 2022, 1441.88, 1, 31, 17, 1276, 165.88);
INSERT INTO `venta` VALUES (24, 20, 2, 2022, 101.01, 1, 29, 17, 89.39, 11.62);

SET FOREIGN_KEY_CHECKS = 1;
