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
	current_quantity INTEGER NOT NULL
 );
