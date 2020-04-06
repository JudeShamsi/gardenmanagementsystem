DROP TABLE GrowthRate;
DROP TABLE PlantHas;
DROP TABLE Lighting;
DROP TABLE Need;
DROP TABLE Requires;
DROP TABLE Nutrients;
DROP TABLE EssentialMinerals;
DROP TABLE Water; 
DROP TABLE Inventory; 
DROP TABLE Supplier;
DROP TABLE Provides;
DROP TABLE ​Employee​;
DROP TABLE Task;
DROP TABLE Has;
DROP TABLE Schedule;
DROP VIEW IF EXISTS plants_more_than_two;


CREATE VIEW 
plants_more_than_two (NN_Name, NN_ID, numberofplants) AS (
    select Nutrients.N_Name, Nutrients.N_ID,count(*) as numberofplants
    from PlantHas, Requires, Nutrients
    where PlantHas.P_ID = Requires.PR_ID and Requires.NR_ID = Nutrients.N_ID
    GROUP BY Nutrients.N_Name
    HAVING count(*) >= 2)

CREATE TABLE Employee(
E_SIN int PRIMARY KEY AUTO_INCREMENT,
E_fname CHAR(50),
E_lname CHAR(50),
E_phone CHAR(20),
E_address CHAR(100),
E_Type CHAR(50)
);

CREATE TABLE Task (
TaskNum INT PRIMARY KEY AUTO_INCREMENT,
Task_Type CHAR(20),
Task_Name CHAR(30),
T_notes CHAR(255)
);


CREATE TABLE Schedule(
Schedule_Num INT PRIMARY KEY AUTO_INCREMENT,
Scheduled_Date Date,
Start_Time Char(20),
End_Time Char(20),
E_SIN INT NOT NULL, 
CONSTRAINT s FOREIGN KEY (E_SIN) REFERENCES Employee(E_SIN) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Has(
TaskNum INT NOT NULL, 
Schedule_Num INT NOT NULL,
PRIMARY KEY (TaskNum, Schedule_Num),
CONSTRAINT tnum FOREIGN KEY (TaskNum) REFERENCES Task(TaskNum) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT sched FOREIGN KEY (Schedule_Num) REFERENCES Schedule(Schedule_Num) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Supplier (
Supplier_ID INT PRIMARY KEY AUTO_INCREMENT,
s_fname CHAR(50),
s_lname CHAR(50),
s_phone CHAR(20),
s_email CHAR(100)

);

CREATE TABLE Inventory (
Inventory_ID INT PRIMARY KEY AUTO_INCREMENT,
Inventory_Category CHAR(100),
InventoryName CHAR(100),
Stock_Date DATE,
ExpirationDate DATE,
E_SIN INT NOT NULL,
CONSTRAINT esin FOREIGN KEY(E_SIN) REFERENCES Employee(E_SIN) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Provides (
Inventory_ID INT NOT NULL,
Supplier_ID INT NOT NULL,
PRIMARY KEY (Inventory_ID, Supplier_ID),
CONSTRAINT ssid FOREIGN KEY (Supplier_ID) REFERENCES Supplier(Supplier_ID) ON DELETE CASCADE ON UPDATE CASCADE, 
CONSTRAINT invid FOREIGN KEY (Inventory_ID ) REFERENCES Inventory(Inventory_ID) ON DELETE CASCADE ON UPDATE CASCADE
); 

CREATE TABLE PlantHas
(P_ID INT PRIMARY KEY AUTO_INCREMENT,
P_ScientificName CHAR (100),
P_Description CHAR (200) ,
P_CommonName CHAR (100) ,
Amount INT,
UNIQUE(P_ScientificName, P_CommonName));


CREATE TABLE Lighting
(Light_SerialNo INT PRIMARY KEY AUTO_INCREMENT,
Wavelength INT NOT NULL,
Bulb_TYPE CHAR (40));


CREATE TABLE Need
(PN_ID INT NOT NULL,
LN_SerialNo INT NOT NULL,
PRIMARY KEY (PN_ID,LN_SerialNo),
CONSTRAINT plantfk FOREIGN KEY (PN_ID) REFERENCES PlantHas (P_ID) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT lightfk FOREIGN KEY (LN_SerialNo) REFERENCES Lighting(Light_SerialNo) ON DELETE CASCADE ON UPDATE CASCADE);



CREATE TABLE Nutrients
(N_ID INT PRIMARY KEY AUTO_INCREMENT,
IN_ID INT NOT NULL,
N_Name CHAR (60) ,
N_hazards CHAR (200) ,
N_Description CHAR (200),
CONSTRAINT inventorynufk FOREIGN KEY (IN_ID) REFERENCES Inventory (Inventory_ID) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Requires
(NR_ID INT NOT NULL,
PR_ID INT NOT NULL,
PRIMARY KEY (PR_ID,NR_ID),
CONSTRAINT plantprfk FOREIGN KEY (PR_ID) REFERENCES PlantHas (P_ID) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT nutrientrfk FOREIGN KEY (NR_ID) REFERENCES Nutrients(N_ID) ON DELETE CASCADE ON UPDATE CASCADE
);




CREATE TABLE EssentialMinerals
(NM_ID INT PRIMARY KEY AUTO_INCREMENT,
EM_Type CHAR (20),
EM_Concentration REAL NOT NULL,
CONSTRAINT nutrienemtfk FOREIGN KEY (NM_ID) REFERENCES Nutrients(N_ID) ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE Water
(NW_ID int PRIMARY KEY AUTO_INCREMENT,
Temperature REAL NOT NULL,
pH REAL NOT NULL,
CONSTRAINT nutrientwtfk FOREIGN KEY(NW_ID)REFERENCES Nutrients(N_ID) ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE GrowthRate
(PG_ID INT NOT NULL AUTO_INCREMENT,
 StartDate DATE NOT NULL,
 EndDate DATE NOT NULL,
 LengthGrowth REAL NOT NULL,
 PRIMARY KEY(PG_ID, StartDate, EndDate),
 CONSTRAINT plantgrfk FOREIGN KEY (PG_ID) REFERENCES PlantHas (P_ID) ON DELETE CASCADE ON UPDATE CASCADE
 );


INSERT INTO Employee VALUES (764274988, 'John', 'Michael', '123-456-7890', '123 Rogers Street', 'Operations');
INSERT INTO Employee VALUES (764274982, 'Karen', 'Kilby', '123-456-7999', '123 Farrah Street', 'Operations');
INSERT INTO Employee VALUES (764274987, 'Alex', 'Topernick', '123-888-7890', '123 Komox Street', 'Operations');
INSERT INTO Employee VALUES (78201899, 'Patricia', 'Lee', '123-456-7823', '123 Op Street', 'Operations');
INSERT INTO Employee VALUES (764274990, 'John', 'Michael', '123-456-7890', '123 Rogers Street', 'Gardener');
INSERT INTO Employee VALUES (764274941, 'Candice', 'Simone', '123-456-7823', '123 Op Street', 'Gardener');
INSERT INTO Employee VALUES (764274923, 'Doug', 'Ford', '123-456-7823', '123 Op Street', 'Facility');
INSERT INTO Employee VALUES (764274977, 'Doug', 'Ford', '123-456-7823', '123 Op Street', 'Facility');
INSERT INTO Employee VALUES (764274925, 'Doug', 'Ford', '123-456-7823', '123 Op Street', 'Gardener');

INSERT INTO Inventory VALUES (1,'Fertilizer', 'Jobes', '2019-01-01','2045-02-11',764274982);
INSERT INTO Inventory VALUES (2,'Chemicals','Chlorine', '2019-01-11','2030-05-18',764274988);
INSERT INTO Inventory VALUES (3,'Seeds','Lactuca sativa','2019-08-21','2021-05-17',764274987);
INSERT INTO Inventory VALUES (4,'Plant Supplies','Container','2019-01-21','2028-09-16',78201899);
INSERT INTO Inventory VALUES (5,'Chemicals', 'Garbage bag','2019-03-29','2020-02-26',764274988);
INSERT INTO Inventory VALUES (6,'Chemicals', 'Garbage bag','2019-03-29','2020-02-26',764274988);

INSERT INTO Supplier VALUES (1, 'Axel', 'Doug', '123-658-0000', 'axel@supplies.com');
INSERT INTO Supplier VALUES (2, 'Kreg', 'Dufferman', '123-658-1000', 'dufferman_supplies@supplies.com');
INSERT INTO Supplier VALUES (3, 'Tailya', 'Carter', '123-658-0060', 'the_best_supplies@supplies.com');

INSERT INTO Provides VALUES (1, 1);
INSERT INTO Provides VALUES (2, 2);
INSERT INTO Provides VALUES (3, 1);
INSERT INTO Provides VALUES (4, 3);
INSERT INTO Provides VALUES (5, 2);
INSERT INTO Provides VALUES (6, 2);



INSERT INTO Task VALUES (1, 'Facility', 'Take out garbage', 'in Garden house 1');
INSERT INTO Task VALUES (2, 'Facility', 'Clean facility','double check chemical stock');
INSERT INTO Task VALUES (3, 'Gardener', 'Calculate plant growth','Water plants lactivia');
INSERT INTO Task VALUES (4, 'Gardener', 'Check seed supply','For all lactivia plants');
INSERT INTO Task VALUES (5, 'Operations', 'Update employee schedule','Change friday Karen shift');
INSERT INTO Task VALUES (6, 'Operations', 'Remove Axel from supplies','Change schedule for friday');

INSERT INTO Schedule VALUES (1, '2019-01-31', '12:00', '14:00', 764274990); 
INSERT INTO Schedule VALUES (2, '2019-01-05', '11:00', '12:00', 764274990); 
INSERT INTO Schedule VALUES (3, '2019-01-08', '09:00', '14:00', 764274988); 
INSERT INTO Schedule VALUES (4, '2019-01-31', '12:00', '14:00', 764274988); 
INSERT INTO Schedule VALUES (5, '2019-01-31', '12:00', '14:00', 764274923); 


INSERT INTO Has VALUES (1, 5);
INSERT INTO Has VALUES (2, 5);
INSERT INTO Has VALUES (3, 1);
INSERT INTO Has VALUES (4, 2);
INSERT INTO Has VALUES (5, 3);
INSERT INTO Has VALUES (6, 4);


INSERT INTO PlantHas VALUES (1,'Lactuca sativa','Lettuce is an annual plant of the daisy family, Asteraceae. It is most often grown as a leaf vegetable, but sometimes for its stem and seeds', 'Lettuce', 50);
INSERT INTO PlantHas VALUES (2,'Solanum lycopersicum','The tomato is the edible, often red, berry. The species originated in western South America and Central America', 'Tomatoes', 20);
INSERT INTO PlantHas VALUES (3,'Fragaria×ananassa','The garden strawberry is a widely grown hybrid species of the genus Fragaria', 'Strawberries', 70);
INSERT INTO PlantHas VALUES (4,'Spinacia oleracea','Spinach is a leafy green flowering plant native to central and western Asia', 'Spinach', 60);
INSERT INTO PlantHas VALUES (5,'Coriandrum sativum','Coriander is an annual herb in the family Apiaceae', 'Cilantro', 200);

INSERT INTO Lighting VALUES (1,380, 'LED');
INSERT INTO Lighting VALUES (2,560, 'Linear Fluorescent');
INSERT INTO Lighting VALUES (3,420, 'Halogen');
INSERT INTO Lighting VALUES (4,340, 'HID');
INSERT INTO Lighting VALUES (5,380, 'LED');


INSERT INTO Nutrients VALUES (1, 1, 'Nitrogen','Excessive inhalation can cause dizziness, nausea, vomiting, loss of consciousness','Nitrogen is very important and needed for plant growth');
INSERT INTO Nutrients VALUES (2, 2, 'Potassium','Inhalation of dust or mists can irritate the eyes, nose, throat, lungs with sneezing, coughing and sore throat.','Potassium regulates the opening and closing of stomata, and therefore regulates CO2 uptake. ');
INSERT INTO Nutrients VALUES (3, 3, 'Phosphorous','Too much phosphorus can cause increased growth of algae and large aquatic plants','Phosphorus plays a major role in the growth of new tissue and division of cells');
INSERT INTO Nutrients VALUES (4, 4, 'Molybdenum','Acidic if touches skin, wear gloves','Molybdenum is essential for nitrogen-fixing. it is used to synthesize amino acids within the plant');
INSERT INTO Nutrients VALUES (5, 5, 'Sulfur','Dust particles may be irritating to eye, nose, throat, and skin','sulfur is essential for nitrogen-fixing nodules on legumes, and necessary in the formation of chlorophyll');
INSERT INTO Nutrients VALUES (6, 6, 'Sulfphite','Sulphite is toxic and can hurt the eye, nose, throat, and skin','sulfur is essential for nitrogen-fixing nodules on legumes, and necessary in the formation of chlorophyll');


INSERT INTO EssentialMinerals VALUES (1,'Non-Metal',0.001 );
INSERT INTO EssentialMinerals VALUES (2,'Macronutrient',0.0079 );
INSERT INTO EssentialMinerals VALUES (3,'Macronutrient', 1.4);
INSERT INTO EssentialMinerals VALUES (4,'Metal', 0.003);
INSERT INTO EssentialMinerals VALUES (5,'Macronutrient', 1.99);

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

INSERT INTO Need VALUES (1,1);
INSERT INTO Need VALUES (2,1);
INSERT INTO Need VALUES (3,5);
INSERT INTO Need VALUES (4,4);

INSERT INTO Requires VALUES (1,1);
INSERT INTO Requires VALUES (2,1);
INSERT INTO Requires VALUES (3,1);
INSERT INTO Requires VALUES (4,3);
INSERT INTO Requires VALUES (5,4);
INSERT INTO Requires VALUES (1,2);
INSERT INTO Requires VALUES (1,4);
INSERT INTO Requires VALUES (1,5);
INSERT INTO Requires VALUES (2,5);

