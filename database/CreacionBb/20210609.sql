create database pablogarciajc_gestionhogar;
use pablogarciajc_gestionhogar;

create TABLE register (
id INT AUTO_INCREMENT,
income_veronica DEC(10,2),
income_pablo DEC(10,2),  
income_extra DEC(10,2), 
saving_verpa DEC(10,2),  
month VARCHAR (50) NOT NULL,
year INT NULL,
constraint UQ_month_year UNIQUE (month,year),
constraint PK_register PRIMARY KEY (id)
)Engine=InnoDB;

create TABLE configuracion (
id INT AUTO_INCREMENT,
nombre VARCHAR (50) NULL,
descripcion VARCHAR (50) NULL,
gastos DEC(10,2),
fechaCorte VARCHAR (50),
status VARCHAR (50) NULL,
idRegister INT NULL,
rol INT,
constraint PK_configuracion PRIMARY KEY (id),
constraint FK_register_d FOREIGN KEY (idRegister) REFERENCES register(id)
)Engine=InnoDB;





