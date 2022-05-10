SELECT * FROM register r INNER JOIN configuracion c ON r.id = c.idRegister WHERE r.id = 634;

select SUM(income_veronica + income_pablo + income_extra) from register r WHERE r.id= 634;

SELECT SUM(c.Gastos) FROM register r INNER JOIN configuracion c ON r.id = c.idRegister WHERE c.idRegister = 633;

SELECT SUM(c.Gastos) FROM configuracion c where c.idRegister = 633 and c.nombre= 'Carrefour';

DELETE FROM configuracion c where c.id = 10;


DELETE FROM configuracion where id = 13 and rol = 1;

SELECT * FROM configuracion WHERE id= 11 AND rol = 1;


SELECT * FROM configuracion ORDER BY nombre;

SELECT * FROM configuracion c ORDER BY c.id DESC;

SELECT * FROM configuracion c WHERE (idRegister = 3 or rol = 0);

 SELECT * FROM configuracion c WHERE idRegister = 1 ORDER BY FIELD (nombre,'Carrefour','Servicios','Deudas') ASC;

 SELECT SUM(c.Gastos) as gastosDeudas FROM configuracion c where c.idRegister = 23 or rol = 0 and c.nombre= 'Deudas';

SELECT * FROM configuracion c;

  SELECT * from configuracion c where (idRegister = 19 or rol = 0) and c.nombre= 'servicios';

