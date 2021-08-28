CREATE TABLE Products (
	name VARCHAR(50) NOT NULL,
	type VARCHAR(10) NOT NULL,
	unit VARCHAR(10) NOT NULL,
	vol DOUBLE(10, 2),
	full_weight DOUBLE(10, 5),
	empty_weight DOUBLE(10, 5), 
	desired_quantity INTEGER NOT NULL
 );

INSERT INTO Products VALUES ('Vodka', 'Spirit', 'ml', 750, 1000, 50, 10);
INSERT INTO Products (name, type, unit, desired_quantity) VALUES ('Emersons Pilsner', 'Beer', 'each', 500);

CREATE TABLE StocktakeProds (
	name VARCHAR(50) NOT NULL,
	type VARCHAR(10) NOT NULL,
	desired_quantity INTEGER NOT NULL,
	current_quantity INTEGER NOT NULL,
	stocktake_num INTEGER NOT NULL
 );

 CREATE TABLE StocktakeRefs (
	 dt DATETIME NOT NULL,
	 stock_num INTEGER NOT NULL
 );

