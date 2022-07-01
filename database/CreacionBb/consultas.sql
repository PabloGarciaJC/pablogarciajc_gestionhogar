SELECT * FROM register r INNER JOIN configuracion c ON r.id = c.idRegister WHERE r.id = 634;

select SUM(income_veronica + income_pablo + income_extra) from register r WHERE r.id= 634;

SELECT SUM(c.Gastos) FROM register r INNER JOIN configuracion c ON r.id = c.idRegister WHERE c.idRegister = 633;

SELECT SUM(c.Gastos) FROM configuracion c where c.idRegister = 633 and c.nombre= 'Carrefour';

SELECT * FROM configuracion c where c.idRegister = 2;


INSERT INTO configuracion (nombre,descripcion,gastos,fechaCorte,status,idRegister,rol) VALUES ('Carrefour','mercado padres pablo pepe', 130.00, '21 de casa mes', 'PAGADO', 2, 1);


SELECT * FROM configuracion where idRegister = 2;


SELECT c.nombre, c.descripcion FROM register r INNER JOIN configuracion c ON r.id = c.idRegister WHERE c.idRegister = 2;

SELECT
c.id,
r.id,  
income_veronica,
income_pablo,
income_extra,
saving_verpa,
month,
year,
nombre, 
descripcion,
gastos,
fechaCorte,
status,
idRegister
FROM register r INNER JOIN configuracion c ON r.id = c.idRegister WHERE c.idRegister = 2;




SELECT * FROM configuracion WHERE id= 11 AND rol = 1;


SELECT * FROM configuracion ORDER BY nombre;

SELECT * FROM configuracion c ORDER BY c.id DESC;

SELECT * FROM configuracion c WHERE (idRegister = 3 or rol = 0);

 SELECT * FROM configuracion c WHERE idRegister = 1 ORDER BY FIELD (nombre,'Carrefour','Servicios','Deudas') ASC;

 SELECT SUM(c.Gastos) as gastosDeudas FROM configuracion c where c.idRegister = 23 or rol = 0 and c.nombre= 'Deudas';

SELECT * FROM configuracion c;

  SELECT * from configuracion c where (idRegister = 19 or rol = 0) and c.nombre= 'servicios';

