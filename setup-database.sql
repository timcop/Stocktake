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

INSERT INTO Spirits (name, volume, full_weight, empty_weight, desired_quantity) VALUES ('Talisker 10YO Whiskey', 700, 1200, 400, 5);
INSERT INTO Spirits (name, desired_quantity) VALUES ('Jameson Irish Whiskey', 8);

INSERT INTO Wine (name, volume, full_weight, empty_weight, desired_quantity) VALUES ('Dog Point Sauvigon Blanc', 750, 1000, 250, 24);
INSERT INTO Wine (name, desired_quantity) VALUES ('Wooing Tree Beetlejuice Pinot Noir', 12);

INSERT INTO Beer (name, desired_quantity) VALUES ('Corona', 48);
INSERT INTO Beer (name, desired_quantity) VALUES ('Peroni', 48);

INSERT INTO NonAlc (name, desired_quantity) VALUES ('Fever Tree Tonic', 48);
INSERT INTO NonAlc (name, desired_quantity) VALUES ('Angostura Bitters', 4);

