CREATE TABLE Products (
	name VARCHAR(50) NOT NULL,
	type VARCHAR(10) NOT NULL,
	unit VARCHAR(10) NOT NULL,
	vol DOUBLE(10, 2),
	full_weight DOUBLE(10, 2),
	empty_weight DOUBLE(10, 2), 
	desired_quantity INTEGER NOT NULL
 );

INSERT INTO Products VALUES ('Talisker 10YO Whiskey', 'Spirit', 'ml', 700, 1200, 400, 5);
INSERT INTO Products VALUES ('Jameson Irish Whiskey', 'Spirit', 'ml', 1000, 1700, 600, 8);
INSERT INTO Products VALUES ('Beefeater London Dry Gin', 'Spirit', 'ml', 1000, 1723, 613, 8);
INSERT INTO Products VALUES ('Monkey 47 Gin', 'Spirit', 'ml', 500, 923.12, 312.18, 2);
INSERT INTO Products VALUES ('Baileys', 'Spirit', 'ml', 1000, 2000.96, 812, 5);
INSERT INTO Products VALUES ('Frangelico', 'Spirit', 'ml', 1000, 1850, 750, 4);
INSERT INTO Products VALUES ('Dog Point Sauvigon Blanc', 'Wine', 'ml', 750, 1000, 250, 24);
INSERT INTO Products VALUES ('Wooing Tree Beetlejuice Pinot Noir', 'Wine', 'ml', 750, 1023, 284.2, 12);
INSERT INTO Products (name, type, unit, desired_quantity) VALUES ('Corona', 'Beer', 'each', 48);
INSERT INTO Products (name, type, unit, desired_quantity) VALUES ('Peroni', 'Beer', 'each', 48);
INSERT INTO Products (name, type, unit, desired_quantity) VALUES ('NNN Synaptic Voyage', 'Beer', 'each', 24);

CREATE TABLE StocktakeProds (
	name VARCHAR(50) NOT NULL,
	type VARCHAR(10) NOT NULL,
	desired_quantity INTEGER NOT NULL,
	current_quantityInt INTEGER,
	current_quantityDec DOUBLE(10, 2),
	stocktake_num INTEGER NOT NULL
 );

-- CREATE TABLE ProductTypes (
-- 	name VARCHAR(15) NOT NULL,
-- 	unit VARCHAR(10) NOT NULL,
-- 	decimalCountBool BIT(1) NOT NULL
-- )

-- INSERT INTO ProductTypes VALUES ('Spirit', 'ml', 1)
-- INSERT INTO ProductTypes VALUES ('Wine', 'ml', 1)


-- CREATE TABLE CountTypes (

-- )

 CREATE TABLE StocktakeRefs (
	 dt DATETIME NOT NULL,
	 stock_num INTEGER NOT NULL
 );

