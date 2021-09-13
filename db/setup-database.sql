CREATE TABLE Products (
	name VARCHAR(50) NOT NULL,
	type VARCHAR(10) NOT NULL,
	unit VARCHAR(10) NOT NULL,
	vol DOUBLE(10, 2),
	full_weight DOUBLE(10, 2),
	empty_weight DOUBLE(10, 2), 
	desired_quantity INTEGER NOT NULL
 );

 CREATE TABLE Spirits (
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	volume DOUBLE(10, 2),
	full_weight DOUBLE(10, 2),
	empty_weight DOUBLE(10, 2),
	desired_quantity INTEGER NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE Beer (
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	desired_quantity INTEGER NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE Wine (
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	volume DOUBLE(10, 2),
	full_weight DOUBLE(10, 2),
	empty_weight DOUBLE(10, 2),
	desired_quantity INTEGER NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE NonAlc (
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	desired_quantity INTEGER NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE StocktakeProds (
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	desired_quantity INTEGER NOT NULL,
	current_quantityInt INTEGER,
	current_quantityDec DOUBLE(10, 2),
	stocktake_num INTEGER NOT NULL,
	PRIMARY KEY (id)
 );

 CREATE TABLE StocktakeRefs (
	 dt DATETIME NOT NULL,
	 stock_num INTEGER NOT NULL
 );
