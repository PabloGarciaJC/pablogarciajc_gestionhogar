create TABLE register (
id INT AUTO_INCREMENT,
income_veronica INT NULL,
income_pablo INT NULL,  
income_extra INT NULL, 
saving_verpa INT NULL,  
month VARCHAR (50) NOT NULL,
year INT NULL,
constraint UQ_month_year UNIQUE (month,year),
constraint PK_register PRIMARY KEY (id)
)Engine=InnoDB;

create TABLE carrefour (
id INT AUTO_INCREMENT,
name_carrefour VARCHAR (50) NULL,
description_table VARCHAR (50) NULL,
spending_verpa INT NULL,
curt_day VARCHAR (50),
status VARCHAR (50) NULL,
id_register INT NULL,
constraint PK_carrefour PRIMARY KEY (id),
constraint FK_register_c FOREIGN KEY (id_register) REFERENCES register(id)
)Engine=InnoDB;

create TABLE service (
id INT  AUTO_INCREMENT,
name_service VARCHAR (50) NULL,
description_table VARCHAR (50) NULL,
spending_verpa INT NULL,
curt_day VARCHAR (50),
status VARCHAR (50) NULL,
id_register INT NULL,
constraint PK_service PRIMARY KEY (id),
constraint FK_register_s FOREIGN KEY (id_register) REFERENCES register(id)
)Engine=InnoDB;

create TABLE debt_verpa (
id INT  AUTO_INCREMENT,
name_debt VARCHAR (50) NULL,
description_table VARCHAR (50) NULL,
spending_verpa INT NULL,
curt_day VARCHAR (50),
status VARCHAR (50) NULL,
id_register INT NULL,
constraint PK_debt PRIMARY KEY (id),
constraint FK_register_d FOREIGN KEY (id_register) REFERENCES register(id)
)Engine=InnoDB;



