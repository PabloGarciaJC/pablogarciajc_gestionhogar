/* Actual */
SELECT  from carrefour where id_register = 48;

SELECT * from carrefour;

SELECT description_table FROM carrefour where id_register = 48;
SELECT sum(spending_verpa)  as totalCarrefour from carrefour where id_register = 1;
SELECT sum(spending_verpa) from service where id_register = 48;
SELECT sum(spending_verpa) from debt_verpa where id_register = 48;

SELECT sum(income_veronica + income_pablo + income_extra + saving_verpa) from register where id = 1;




SELECT r.id, c.name_carrefour, c.status from register r 
    INNER JOIN carrefour c ON r.id=c.id_register where c.id_register = 1 ORDER BY id DESC LIMIT 3;

    SELECT r.id, r.month from carrefour c
    INNER JOIN register r ON c.id_register=r.id where r.id = 1 ORDER BY id DESC LIMIT 3;

use finanzas_hogar;

select * from carrefour;

SELECT * FROM register ORDER BY id DESC;

SELECT r.id, c.name_carrefour from register r 
    INNER JOIN carrefour c ON r.id=c.id_register ORDER BY id DESC LIMIT 1;

    select sum(spending_verpa) from carrefour where id=7;

select sum(spending_verpa) from service where id=1;

select sum(spending_verpa) from debt_verpa where id=1;

select seving_verpa from register WHERE id=49;

