CREATE TABLE `venta` (
`idventa`  int(100) NOT NULL ,
`fecha`  date NOT NULL ,
`hora`  timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP ,
`pago`  enum('no','si') NOT NULL DEFAULT 'no' ,
`direnvio`  varchar(200) NOT NULL ,
`nombre`  varchar(200) NULL ,
PRIMARY KEY (`idventa`)
)
;

CREATE TABLE `producto` (
`idproducto`  int NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(200) NOT NULL ,
`descripcion`  varchar(200) NOT NULL ,
`precio`  decimal(200,2) NULL ,
`iva`  int(20) NULL ,
PRIMARY KEY (`idproducto`)
)
;

CREATE TABLE `detalleventa` (
`iddetalleventa`  int(200) NOT NULL AUTO_INCREMENT ,
`idventa`  int(200) NOT NULL ,
`idproducto`  int(200) NOT NULL ,
`cantidad`  int(200) NOT NULL ,
`precio`  decimal(65,2) NULL ,
`iva`  int(10) NULL ,
PRIMARY KEY (`iddetalleventa`),
CONSTRAINT `idproducto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
CONSTRAINT `idventa` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`)
)
;