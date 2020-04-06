--> SELECT QUERIES ON PLANTS

--> search by plant scientific names
select PlantHas.P_ID AS PlantID, P_ScientificName AS ScientificName, P_Description AS Description,P_CommonName AS CommonName, Amount AS InventoryAmount,GrowthRate.LengthGrowth
from PlantHas,GrowthRate
where P_ScientificName like '%$where_cols%' AND GrowthRate.PG_ID = PlantHas.P_ID 
--> '%$where_cols%' is the user input

--> search by plant common name
select PlantHas.P_ID AS PlantID, P_ScientificName AS ScientificName, P_Description AS Description,P_CommonName AS CommonName, Amount AS InventoryAmount,GrowthRate.LengthGrowth
from PlantHas,GrowthRate
where P_CommonName like '%$where_cols2%' AND GrowthRate.PG_ID = PlantHas.P_ID
-- '%$where_cols2%' is the user input

--> PROJECT QUERY
-- advance search using plant common name
select $cust_cols 
from PlantHas 
--> '$cust_cols' any column or columns user picks 

--> INSERT QUERIES ON PLANTS

--> insert a plant
INSERT 
INTO PlantHas (P_ID, P_ScientificName, P_Description, P_CommonName,Amount )
VALUES ('$plant_id','$plant_sname','$plant_descrip','$plant_cname','$plant_amt')
--> where all the values are inserted by the user.

--> insert the plant's growth rate
INSERT 
INTO GrowthRate(PG_ID, StartDate,EndDate, LengthGrowth)
VALUES ('$id', '$start','$end','$growthrate')
--> where all the values are inserted by the user, except the id which is selected by drop down menu

--> insert the plant's required nutrients
INSERT 
INTO Requires(NR_ID, PR_ID)
VALUES('$nid','$pid')
--> where the user selects plant common name and nutrient name and the ids are matched to the corresponding plant and nutrients

--> insert the plant's required light
INSERT 
INTO Need(PN_ID, LN_SerialNo ) 
VALUES('$pid','$lid')
--> where the user selects plant common name and light type and the ids are matched to the corresponding plant and light


--> INSERT QUERIES ON NUTRIENTS

--> insert a nutrient
INSERT 
INTO Nutrients (N_ID, IN_ID, N_Name,N_hazards,N_Description )
VALUES ('$nutrient_id','$id','$nutrient_cname','$nutrient_hazar','$nutrient_descrip')
--> where the user inserts all the values and the inventory id is matched to the actual inventory

--> insert the essential minerals that will be part of a nutrient
INSERT 
INTO EssentialMinerals (NM_ID, EM_Type,EM_Concentration)
VALUES ('$nid','$em_type','$em_con')
--> where the user inserts all the values and the nutrient id is matched to the actual nutrient

--> insert the water requierements 
INSERT 
INTO Water (NW_ID, Temperature,pH)
VALUES ('$wid','$temp','$ph')
--> where the user inserts all the values and the nutrient id is matched to the actual nutrient

--> insert the lighting information
INSERT 
INTO Lighting (Light_SerialNo, Wavelength,Bulb_TYPE )
VALUES ('$ligth','$wave','$bulb')
--> where the user inserts all the values

--> UPDATE PLANTS QUERIES 

--> update the plant description
update PlantHas 
set P_Description = '$descrp' 
where P_ID = '$id'
--> user inputs '$descrp' and '$id' is used to access the plant to be updated

--> UPDATE NUTRIENTS QUERIES

-->update the nutrients hazards
update Nutrients 
set N_hazards = '$descrp' 
where N_ID = '$id'
--> user inputs '$descrp'

--> update the hazards of the nutrients using the nutrient id
update EssentialMinerals 
set EM_Concentration = '$concen' 
where NM_ID = '$id'
--> user inputs '$concen' 

--> update the water temperature
update Water 
set Temperature = '$temp' 
where NW_ID = '$id'

--> update the light bulb type
update Lighting 
set Bulb_TYPE = '$bulb' 
where Light_SerialNo = '$id'


--> DELETE PLANT QUERY

--> deletes the plant from PlantHas as well as GrowthRate
delete 
from PlantHas 
where P_ID = '$id'
--> user deletes the plant by picking the common name from a drop down menu

--> AGGREAGTED QUERY

--> calculates the avg growth rate for the plants that use a specific nutrient 
select DISTINCT nutrients.N_Name, AVG(growthrate.LengthGrowth)
from planthas, requires,nutrients, growthrate
where nutrients.N_ID = '$id' AND  growthrate.PG_ID = planthas.P_ID 
AND  nutrients.N_ID = requires.NR_ID AND planthas.P_ID = requires.PR_ID
group by nutrients.N_ID, nutrients.N_Name
--> user select the name of the nutrient


--> NESTED AGGREGATED QUERY
--> calculates the average growth rate for a number of plants >=2
SELECT plants_more_than_two.NN_Name, AVG(growthrate.LengthGrowth) as average
FROM plants_more_than_two, growthrate, planthas, requires
WHERE plants_more_than_twO.NN_ID = requires.NR_ID AND requires.PR_ID = planthas.P_ID AND growthrate.PG_ID = planthas.P_ID
GROUP BY plants_more_than_two.NN_Name




-->ZOE'S QUERIES

--> find Employee Schedule from Employee id
SELECT Year,Month,Day,Start_Time,End_Time 
FROM Schedule
WHERE E_SIN=$E_SIN
--> $E_SIN is the user input

--> find when a certain task happens
SELECT Year,Month,Day
FROM Has 
WHERE TaskNum=$TaskNum
--> $TaskNum is the user input


--> get the tasks an empolyee has
SELECT COUNT  Day
FROM Schedule 
WHERE E_SIN="$E_SIN"
--> $E_SIN is the user input

--> get the  employee tasks 
SELECT Task_Type
FROM Has 
WHERE Year = $row["Year"] AND Month = $row["Month"] AND Day = $row["Day"];
--> $row is the a row of the results from the earlier find Employee Schedule from Employee id query

-->JUDES'S QUERIES

--> INSERT SUPPLIER TO TABLE
INSERT INTO Supplier(s_email, s_fname, s_lname, s_phone) 
VALUES('$s_email', '$s_fname','$s_lname', '$s_phone');

--> SELECT EMPLOYEE AND SUPPLIER FOR DROP DOWN
SELECT E_fname, E_SIN FROM Employee WHERE E_Type = 'Operations';
SELECT s_fname, Supplier_ID FROM Supplier;

--> DELETE SUPPLIER
DELETE FROM Supplier WHERE Supplier_ID = $id;

--> DIVISON
SELECT s.s_fname, s.s_lname, s.s_email, s.s_phone 
    FROM Supplier s WHERE NOT EXISTS (
        (SELECT I1.Inventory_ID
            FROM Inventory I1
            WHERE I1.Inventory_Category = '$Inventory_Category') 
        EXCEPT 
        (SELECT P.Inventory_ID 
FROM Provides P, Inventory I2
WHERE P.Supplier_ID=s.Supplier_ID AND P.Inventory_ID=I2.Inventory_ID 
AND I2.Inventory_Category = '$Inventory_Category'));

--> INSERT INTO EMPLOYEE TABLE
INSERT INTO Employee (E_SIN,E_fname, E_lname, E_phone, E_address, E_Type)
VALUES ($E_SIN, '$E_fname', '$E_lname', '$E_phone', '$E_address', '$E_Type');

--> INSERT INTO INVENTORY TABLE
INSERT INTO Inventory(Inventory_Category, InventoryName, `Stock_Date`, `ExpirationDate`, `E_SIN`) 
VALUES('$Inventory_Category', '$InventoryName', '$Stock_Date', '$ExpirationDate', '$employee_name');
INSERT INTO Provides(Inventory_ID, Supplier_ID) VALUES('$id', '$suppliers');

--> INSERT SCHEDULE
INSERT INTO Schedule(`Scheduled_Date`, Start_Time, End_Time, `E_SIN`) VALUES ('$Schedule_Date', '$Start_Time', '$End_Time', '$E_SIN');
INSERT INTO Task(Task_Type, Task_Name, T_notes) VALUES ('$Task_Type', '$Task_Name', '$T_notes');
INSERT INTO Has() VALUES('$task_num', '$Task_Type', '$schedule_num');

--> JOIN TABLES
SELECT * FROM Supplier AS s, Inventory AS i, Provides AS p 
    WHERE s.Supplier_ID = p.Supplier_ID 
    AND i.Inventory_ID = p.Inventory_ID  
    AND i.Inventory_Category = '$Inventory_Category';

--> SEARCH EMPLOYEE
SELECT * FROM Employee;
SELECT * FROM Employee WHERE E_SIN = '$key' ;
DELETE FROM Employee WHERE E_SIN = '$key'

-->SEARCH INVENTORY
SELECT * FROM Inventory;
SELECT * FROM Inventory WHERE Inventory_ID = '$key';
DELETE FROM Inventory WHERE Inventory_ID = '$key';

-->SEARCH SCHEDULE
SELECT * FROM Schedule AS s, Has AS h, Task AS t WHERE h.TaskNum = t.TaskNum 
    AND s.Schedule_Num = h.Schedule_NUM AND s.E_SIN = '$E_SIN';

-->SEARCH SUPPLIER
SELECT * FROM Supplier;
SELECT * FROM Supplier WHERE Supplier_ID = '$key';
DELETE FROM Supplier WHERE Supplier_ID = '$key' ;

--> SELECT SCHEDULE BY EMPLOYEE TYPE
SELECT DISTINCT * FROM Schedule AS s, Has AS h, Task AS t, Employee AS e WHERE h.TaskNum = t.TaskNum 
    AND s.Schedule_Num = h.Schedule_NUM AND e.E_Type = '$E_Type' AND e.E_SIN = s.E_SIN;
