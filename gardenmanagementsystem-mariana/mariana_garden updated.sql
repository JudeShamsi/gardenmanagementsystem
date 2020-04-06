DROP TABLE GrowthRate;
DROP TABLE PlantHas;
DROP TABLE Lighting;
DROP TABLE Need;
DROP TABLE Requires;
DROP TABLE Nutrients;
DROP TABLE EssentialMinerals;
DROP TABLE Water; 
DROP TABLE Inventory; 

CREATE TABLE Inventory (
Inventory_ID INT PRIMARY KEY ,
InventoryName CHAR(60),
Stock_Date DATE,
ExpirationDate DATE,
E_SIN INT NOT NULL); ***** NEED TO ADD FOREIGN KEY HERE


CREATE TABLE PlantHas
(P_ID INT PRIMARY KEY,
P_ScientificName CHAR (100),
P_Description CHAR (200) ,
P_CommonName CHAR (100) ,
Amount INT, 
UNIQUE(P_ScientificName, P_CommonName));


CREATE TABLE Lighting
(Light_SerialNo INT PRIMARY KEY,
Wavelength INT NOT NULL,
Bulb_TYPE CHAR (40));


CREATE TABLE Need
(PN_ID INT NOT NULL,
LN_SerialNo INT NOT NULL,
PRIMARY KEY (PN_ID,LN_SerialNo),
CONSTRAINT planhfk FOREIGN KEY (PN_ID) REFERENCES PlantHas (P_ID) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT lightfk FOREIGN KEY (LN_SerialNo) REFERENCES Lighting(Light_SerialNo) ON DELETE CASCADE ON UPDATE CASCADE);



CREATE TABLE Nutrients
(N_ID INT PRIMARY KEY,
IN_ID INT NOT NULL,
N_Name CHAR (60) ,
N_hazards CHAR (200) ,
N_Description CHAR (200),
CONSTRAINT inventorynufk FOREIGN KEY (IN_ID) REFERENCES Inventory (Inventory_ID) ON DELETE CASCADE ON UPDATE CASCADE);


CREATE TABLE Requires
(NR_ID INT NOT NULL,
PR_ID INT NOT NULL,
PRIMARY KEY (PR_ID,NR_ID),
CONSTRAINT plantprfk FOREIGN KEY (PR_ID) REFERENCES PlantHas (P_ID) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT nutrientrfk FOREIGN KEY (NR_ID) REFERENCES Nutrients(N_ID) ON DELETE CASCADE ON UPDATE CASCADE);




CREATE TABLE EssentialMinerals
(NM_ID INT PRIMARY KEY,
EM_Type CHAR (20),
EM_Concentration REAL NOT NULL,
CONSTRAINT nutrienemtfk FOREIGN KEY ( NM_ID ) REFERENCES Nutrients(N_ID) ON DELETE CASCADE ON UPDATE CASCADE );



CREATE TABLE Water
(NW_ID int PRIMARY KEY,
Temperature REAL NOT NULL,
pH REAL NOT NULL,
CONSTRAINT nutrientwtfk FOREIGN KEY(NW_ID )REFERENCES Nutrients(N_ID ) ON DELETE CASCADE ON UPDATE CASCADE);



CREATE TABLE GrowthRate
(PG_ID INT NOT NULL,
 StartDate DATE NOT NULL,
 EndDate DATE NOT NULL,
 LengthGrowth REAL NOT NULL,
 PRIMARY KEY(PG_ID, StartDate, EndDate),
 CONSTRAINT plantgrfk FOREIGN KEY (PG_ID) REFERENCES PlantHas (P_ID) ON DELETE CASCADE ON UPDATE CASCADE);



INSERT INTO Inventory VALUES (1,'Fertilizer','2019-01-01','2045-02-11',764274988);
INSERT INTO Inventory VALUES (2,'Chemicals','2019-01-11','2030-05-18',764274988);
INSERT INTO Inventory VALUES (3,'Seeds','2019-08-21','2021-05-17',764274988);
INSERT INTO Inventory VALUES (4,'Plant Grower','2019-01-21','2028-09-16',78201899);
INSERT INTO Inventory VALUES (5,'Deionized Water','2019-03-29','2020-02-26',78201899);


INSERT INTO PlantHas VALUES (1,'Lactuca sativa','Lettuce is an annual plant of the daisy family, Asteraceae. It is most often grown as a leaf vegetable, but sometimes for its stem and seeds', 'Lettuce', 50);
INSERT INTO PlantHas VALUES (2,'Solanum lycopersicum','The tomato is the edible, often red, berry. The species originated in western South America and Central America', 'Tomatoes', 20);
INSERT INTO PlantHas VALUES (3,'Fragaria×ananassa','The garden strawberry is a widely grown hybrid species of the genus Fragaria', 'Strawberries', 70);
INSERT INTO PlantHas VALUES (4,'Spinacia oleracea','Spinach is a leafy green flowering plant native to central and western Asia', 'Spinach', 60);
INSERT INTO PlantHas VALUES (5,'Coriandrum sativum','Coriander is an annual herb in the family Apiaceae', 'Cilantro', 200);

INSERT INTO Lighting VALUES (1, 380, 'LED');
INSERT INTO Lighting VALUES (2, 560, 'Linear Fluorescent');
INSERT INTO Lighting VALUES (3, 420, 'Halogen');
INSERT INTO Lighting VALUES (4, 340, 'HID');
INSERT INTO Lighting VALUES (5, 380, 'LED');

INSERT INTO Need VALUES (1,1);
INSERT INTO Need VALUES (2,1);
INSERT INTO Need VALUES (3,5);
INSERT INTO Need VALUES (4,4);
INSERT INTO Need VALUES (4,2);


INSERT INTO Nutrients VALUES (1,5,'Nitrogen','Excessive inhalation can cause dizziness, nausea, vomiting, loss of consciousness','Nitrogen is very important and needed for plant growth');
INSERT INTO Nutrients VALUES (2,4, 'Potassium','Inhalation of dust or mists can irritate the eyes, nose, throat, lungs with sneezing, coughing and sore throat.','Potassium regulates the opening and closing of stomata, and therefore regulates CO2 uptake. ');
INSERT INTO Nutrients VALUES (3,3, 'Phosphorous','Too much phosphorus can cause increased growth of algae and large aquatic plants','Phosphorus plays a major role in the growth of new tissue and division of cells');
INSERT INTO Nutrients VALUES (4,2, 'Molybdenum','Acidic if touches skin, wear gloves','Molybdenum is essential for nitrogen-fixing. it is used to synthesize amino acids within the plant');
INSERT INTO Nutrients VALUES (5,1, 'Sulfur','Dust particles may be irritating to eye, nose, throat, and skin','sulfur is essential for nitrogen-fixing nodules on legumes, and necessary in the formation of chlorophyll');


INSERT INTO Requires VALUES (1,1);
INSERT INTO Requires VALUES (2,1);
INSERT INTO Requires VALUES (3,1);
INSERT INTO Requires VALUES (4,3);
INSERT INTO Requires VALUES (5,4);


INSERT INTO EssentialMinerals VALUES (1, 'Non-Metal',0.001 );
INSERT INTO EssentialMinerals VALUES (2, 'Macronutrient',0.0079 );
INSERT INTO EssentialMinerals VALUES (3, 'Macronutrient', 1.4);
INSERT INTO EssentialMinerals VALUES (4, 'Metal', 0.003);
INSERT INTO EssentialMinerals VALUES (5, 'Macronutrient', 1.99);

INSERT INTO Water VALUES (1,88.8 ,0.5);
INSERT INTO Water VALUES (2,92.5, 0.001);
INSERT INTO Water VALUES (3,5 , 0.23);
INSERT INTO Water VALUES (4,24.8 , 0.779);
INSERT INTO Water VALUES (5,14 ,1.99 );


INSERT INTO GrowthRate VALUES (1,'2019-01-1','2019-01-31',10.1);
INSERT INTO GrowthRate VALUES (2,'2019-01-2','2019-02-1',5.2);
INSERT INTO GrowthRate VALUES (3,'2019-01-3','2019-02-3',3.6);
INSERT INTO GrowthRate VALUES (4,'2019-01-1','2019-02-2',7.9);
INSERT INTO GrowthRate VALUES (5,'2019-01-2','2019-02-4',5.5);


