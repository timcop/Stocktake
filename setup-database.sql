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
	name VARCHAR(50) NOT NULL,
	volume DOUBLE(10, 2),
	full_weight DOUBLE(10, 2),
	empty_weight DOUBLE(10, 2),
	desired_quantity INTEGER NOT NULL
);

CREATE TABLE Beer (
	name VARCHAR(50) NOT NULL,
	desired_quantity INTEGER NOT NULL
);

CREATE TABLE Wine (
	name VARCHAR(50) NOT NULL,
	volume DOUBLE(10, 2),
	full_weight DOUBLE(10, 2),
	empty_weight DOUBLE(10, 2),
	desired_quantity INTEGER NOT NULL
);

CREATE TABLE NonAlc (
	name VARCHAR(50) NOT NULL,
	desired_quantity INTEGER NOT NULL
);

CREATE TABLE StocktakeProds (
	name VARCHAR(50) NOT NULL,
	type VARCHAR(10) NOT NULL,
	desired_quantity INTEGER NOT NULL,
	current_quantityInt INTEGER,
	current_quantityDec DOUBLE(10, 2),
	stocktake_num INTEGER NOT NULL
 );

 CREATE TABLE StocktakeRefs (
	 dt DATETIME NOT NULL,
	 stock_num INTEGER NOT NULL
 );

INSERT INTO Spirits VALUES ('Talisker 10YO Whiskey', 700, 1200, 400, 5);
INSERT INTO Spirits (name, desired_quantity) VALUES ('Jameson Irish Whiskey', 8);

INSERT INTO Wine VALUES ('Dog Point Sauvigon Blanc', 750, 1000, 250, 24);
INSERT INTO Wine (name, desired_quantity) VALUES ('Wooing Tree Beetlejuice Pinot Noir', 12);

INSERT INTO Beer VALUES ('Corona', 48);
INSERT INTO Beer VALUES ('Peroni', 48);

INSERT INTO NonAlc VALUES ('Fever Tree Tonic', 48);
INSERT INTO NonAlc VALUES ('Angostura Bitters', 4);

