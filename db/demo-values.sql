
INSERT INTO Spirits (name, volume, full_weight, empty_weight, desired_quantity) VALUES ('Talisker 10YO Whiskey', 700, 1200, 400, 5);
INSERT INTO Spirits (name, desired_quantity) VALUES ('Jameson Irish Whiskey', 8);

INSERT INTO Wine (name, volume, full_weight, empty_weight, desired_quantity) VALUES ('Dog Point Sauvigon Blanc', 750, 1000, 250, 24);
INSERT INTO Wine (name, desired_quantity) VALUES ('Wooing Tree Beetlejuice Pinot Noir', 12);

INSERT INTO Beer (name, desired_quantity) VALUES ('Corona', 48);
INSERT INTO Beer (name, desired_quantity) VALUES ('Peroni', 48);

INSERT INTO NonAlc (name, desired_quantity) VALUES ('Fever Tree Tonic', 48);
INSERT INTO NonAlc (name, desired_quantity) VALUES ('Angostura Bitters', 4);

INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES
	('Talisker 10YO Whiskey', 5, 2.3, 1);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES
	('Jameson Irish Whiskey',8, 8.0, 1);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES
	('Dog Point Sauvigon Blanc', 24, 12.5, 1);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES
	('Wooing Tree Beetlejuice Pinot Noir',12, 12.0, 1);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES
	('Corona', 48, 26, 1);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES
	('Peroni', 48, 47, 1);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES
	('Fever Tree Tonic', 24, 12, 1);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES
	('Angostura Bitters',12, 12, 1);

INSERT INTO StocktakeRefs VALUES ('2021-01-01 16:41:20', 1);

INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES
	('Talisker 10YO Whiskey', 5, 2.1, 2);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES
	('Jameson Irish Whiskey', 8, 7.0, 2);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES
	('Dog Point Sauvigon Blanc', 24, 13.5, 2);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES
	('Wooing Tree Beetlejuice Pinot Noir',12, 10.0, 2);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES
	('Corona', 48, 22, 2);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES
	('Peroni', 48, 41, 2);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES
	('Fever Tree Tonic', 24, 22, 2);
INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES
	('Angostura Bitters',12, 10, 2);

INSERT INTO StocktakeRefs VALUES ('2021-01-08 14:31:22', 2);