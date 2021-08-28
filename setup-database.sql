CREATE TABLE Products (
	name VARCHAR(50) NOT NULL,
	type VARCHAR(10) NOT NULL,
	desired_quantity INTEGER NOT NULL
 );

INSERT INTO Products VALUES ('Vodka', 'Spirit', 10);
INSERT INTO Products VALUES ('Emersons Pilsner', 'Beer', 500);

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

INSERT INTO StocktakeProds VALUES ('a', 'a', 10, 10, 1);
INSERT INTO StocktakeProds VALUES ('b', 'b', 10, 10, 2);
