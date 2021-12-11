drop database if exists ucsl_db;

CREATE DATABASE ucsl_db; 
USE ucsl_db;

CREATE TABLE INVENTORY (
    serialNumber VARCHAR(10) NOT NULL UNIQUE,
    itemName VARCHAR(50) NOT NULL,
    supplierName VARCHAR(50) NOT NULL,
    dateReceived DATE NOT NULL,
    brand VARCHAR(20)
);
/*This index is so the operations manager can assess 
which supplier should be paid first 
according to the date the item was recieved 
and the proximity to the end of their credit allowance.*/
CREATE INDEX inventory_index
  ON INVENTORY (supplierName, dateReceived);

CREATE TABLE PRICELIST (
    serialNumber VARCHAR(10) NOT NULL,
    cashPrice INT,
    twoMonths INT,
    threeMonths INT,
    fourMonths INT,
    fiveMonths INT,
    sixMonths INT,
    sevenMonths INT,
    eightMonths INT,
    nineMonths INT,
    tenMonths INT,
    elevenMonths INT,
    twelveMonths INT
);
/*Customers typically ask for prices for 4, 6, 9 and 12 months.
With this index, employees can easily pull up a summary of the pricelist
for the customers*/
CREATE INDEX pricelist_index
  ON PRICELIST (serialNumber, cashPrice, threeMonths, sixMonths, ninemonths, twelveMonths);

CREATE TABLE CUSTOMER (
    formserialNumber VARCHAR(10) NOT NULL UNIQUE,
    customerName VARCHAR(50) NOT NULL,
    contact INT NOT NULL,
    hirepurchasePrice INT,
    installmentDuration VARCHAR(10),
    serialNumber VARCHAR(10) NOT NULL,
    customerType ENUM('existing', 'new') NOT NULL
);

CREATE TABLE DUEDILIGENGE_STAGEII (
    serialNumber VARCHAR(10) NOT NULL,
    formserialNumber VARCHAR(10) NOT NULL,
    customerName VARCHAR(50) NOT NULL,
    installmentDuration VARCHAR(10) NOT NULL,
    contact INT NOT NULL,
    hirepurchasePrice INT NOT NULL,
    workStatus ENUM('working', 'unemployeed') NOT NULL,
    contractStatus ENUM('accepted', 'rejected') NOT NULL
);
/*This index is so the delivery team can 
easily confirm which customer has been rejected or accepted 
before making a delivery.*/
CREATE UNIQUE INDEX ddstageIi_index
  ON DUEDILIGENGE_STAGEII (customerName, contractStatus);

CREATE TABLE LOCATION (
    GPS VARCHAR(20) NOT NULL,
    zone VARCHAR(10) NOT NULL,
    town VARCHAR(50) NOT NULL,
    landmark VARCHAR(50) NOT NULL
);

CREATE TABLE DELIVERY (
    serialNumber VARCHAR(10) NOT NULL,
    formserialNumber VARCHAR(10),
    customerName VARCHAR(50) NOT NULL,
    GPS VARCHAR(20) NOT NULL,
    firstinstallmentDate DATE NOT NULL,
    PRIMARY KEY(serialNumber)
);
 
CREATE TABLE RECOLLECTION (
    formserialNumber VARCHAR(10) NOT NULL,
    customerName VARCHAR(50) NOT NULL,
    firstinstallmentDate DATE NOT NULL,
    means VARCHAR(20) NOT NULL,
    staffName VARCHAR(50),
    amountCollected INT NOT NULL,
    amountDue INT NOT NULL,
    report ENUM('on time', 'defaulting'),
    GPS VARCHAR(20)
);

CREATE TABLE MOBILEMONEY (
    formserialNumber VARCHAR(10) NOT NULL,
    customerName VARCHAR(50) NOT NULL,
    accountFrom ENUM('Personal Account', 'Vendor Account') NOT NULL,
    network ENUM('Vodafone', 'MTN', 'AirtelTigo') NOT NULL,
    accountName VARCHAR(50),
    mobilemoneyNumber INT,
    amountCollected INT,
    vendorName VARCHAR(50)
);
     
CREATE TABLE CASH (
    formserialNumber VARCHAR(10) NOT NULL,
    customerName VARCHAR(50) NOT NULL,
    amountCollected INT NOT NULL,
    GPS VARCHAR(20) NOT NULL,
    pickupLocation ENUM('home', 'work place') NOT NULL
);

CREATE TABLE POSTDATED_CHEQUES (
    formserialNumber VARCHAR(10),
    customerName VARCHAR(50),
    accountName VARCHAR(50),
    amountCollected INT,
    dateDue DATE,
    bankName VARCHAR(20)
);
    
CREATE TABLE GUARANTOR (
    formserialNumber VARCHAR(10) NOT NULL,
    customerName VARCHAR(50) NOT NULL,
    guarantorName VARCHAR(50) NOT NULL,
    phoneNumber INT NOT NULL,
    GPS VARCHAR(20),
    customerRelationship ENUM('Family', 'Friend', 'Collegue') NOT NULL,
    guarantorStatus ENUM('Confirmed', 'In Progress', 'Denied') NOT NULL
);
    
CREATE TABLE INVESTORS (
    investorId INT NOT NULL,
    investorName VARCHAR(50) NOT NULL,
    phoneNumber INT NOT NULL,
    principal INT NOT NULL,
    interest INT NOT NULL,
    maturityDate DATE NOT NULL,
    accountName VARCHAR(50)
);
/*This index will help management decided which is investor's payment
is more prudent looking at their maturity dates*/
CREATE UNIQUE INDEX investors_index
  ON INVESTORS (investorName, maturityDate);


/*INSERTIONS*/
insert into INVENTORY values ('1245TV','40 inch television', 'Shree Balajee', '2021-04-19', 'LG');
insert into INVENTORY values ('2857WM', 'Top load washing machine', 'Starlite', '2021-01-17', 'Samsung');
insert into INVENTORY values ('5432TV', '55 inch television', 'Shree Balajee', '2021-04-19', 'Nasco');
insert into INVENTORY values ('3389AC', '2.0 Mirrorless air condition', 'Starlite', '2021-01-17', 'LG');
insert into INVENTORY values ('4536FR', '147 Top freezer Fridge', 'Fredona', '2021-02-22', 'Rainbow');
insert into INVENTORY values ('3372AC', '2.0 Mirrorless air condition', 'Goba', '2021-01-17', 'LG');
insert into INVENTORY values ('3456LT', '13 inch laptop', 'Compu Ghana', '2021-01-20', 'Asus');
insert into INVENTORY values ('1123FN', 'Rechargeable fan', 'Fredona', '2020-02-22', 'Build Freeze');
insert into INVENTORY values ('3436LT', '13 inch laptop', 'Compu Ghana', '2021-01-20', 'Asus');
insert into INVENTORY values ('2223WM', '12 kg Semi-automatic washing machine', 'Shree Balajee', '2021-04-19', 'LG');
insert into INVENTORY values ('4461TV', '32 inch television', 'Starlite', '2021-01-17', 'Skyworth');
insert into INVENTORY values ('2289FZ', '380 litres Double door Freezer', 'Fredona', '2021-02-22', 'Rainbow');
insert into INVENTORY values ('4462TV', '32 inch television', 'Starlite', '2021-01-17', 'Skyworth');
insert into INVENTORY values ('9080GC', '4 burner gas cooker', 'Fredona', '2021-02-22', 'Nasco');
insert into INVENTORY values ('1080GC', '4 burner gas cooker', 'Fredona', '2021-02-22', 'Nasco');

insert into PRICELIST values ('1245TV','1419','690','530','435','407','308','299','250','233','221','200','196');
insert into PRICELIST values ('2857WM','1004','534','375','351','309','218','201','198','165','153','149','139');
insert into PRICELIST values ('5432TV','3147','2877','1175','879','682','623','600','517','502','498','462','435');
insert into PRICELIST values ('3389AC','2454','543','642','579','421','373','356','306','283','276','255','238');
insert into PRICELIST values ('4536FR','1721','996','654','435','407','308','299','250','233','221','200','196');
insert into PRICELIST values ('3372AC','2454','543','642','579','421','373','356','306','283','276','255','238');
insert into PRICELIST values ('3456LT','5830','3876','1980','1335','1007','908','839','750','701','689','601','596');
insert into PRICELIST values ('1123FN','268','134','100','96','65','58',NULL,NULL,NULL,NULL,NULL,NULL);
insert into PRICELIST values ('3436LT','5830','3876','1980','1335','1007','908','839','750','701','689','601','596');
insert into PRICELIST values ('2223WM','2100','1056','995','890','799','721','633','601','590','510','429','315');
insert into PRICELIST values ('4461TV','1071','893','400','397','278','232','217','199','176','169','154','148');
insert into PRICELIST values ('9080GC','1486','690','555','435','407','322','301','299','250','244','221','206');
insert into PRICELIST values ('4462TV','1071','893','400','397','278','232','217','199','176','169','154','148');
insert into PRICELIST values ('1080GC','1486','690','555','435','407','322','301','299','250','244','221','206');

insert into CUSTOMER values ('1234-5678','Sedinam Afenyo', 0209870987, 2352,'12 months','1245TV','Existing');
insert into CUSTOMER values ('7454-8900','Nana Afia Oppong', 0542482832, 300,'3 months','1123FN','New');
insert into CUSTOMER values ('1123-5642','Kwame Darko', 0242849953, 4326,'6 months','2223WM','New');
insert into CUSTOMER values ('1234-0909','Sonia Tettey', 0272343408, 3147,'1 month','5432TV','New');
insert into CUSTOMER values ('2345-5641','Elina Wiafe', 0202032039, 2105,'5 months','3389AC','Existing');
insert into CUSTOMER values ('5034-3400','Sophia Anderson', 0502303496, 2097,'9 months','4536FR','New');
insert into CUSTOMER values ('1234-1234','Kofi N.A Obeng', 0506785421, 1782,'12 months','9080GC','Existing');
insert into CUSTOMER values ('1230-8900','Nana Afia Birago', 0542482821, 5940,'3 months','3456LT','Existing');
insert into CUSTOMER values ('2323-5642','Arthur Tetteh', 0542649973, 1068,'2 months','2857WM','New');
insert into CUSTOMER values ('9034-0304','Dzifa Holali', 0248761232, 1592,'8 month','4461TV','Existing');
insert into CUSTOMER values ('2345-1132','Jefferson Nyame','0203123235',2224,'5 months','4461TV','New'); 
insert into CUSTOMER values ('9034-0323','Holali Kortey', 0248761232, 1592,'6 months','2223WM','Existing');
insert into CUSTOMER values ('4214-0141','Selali Doku', 0204562304, 1592,'7 months','5432TV','Existing');
insert into CUSTOMER values ('9232-0403','Sami Nunakor', 0502452341, 1592,'9 months','3456LT','New');
insert into CUSTOMER values ('8782-1109','Daniel N Anyano', 0550230110, 1592,'8 months','3389AC','Existing');
insert into CUSTOMER values ('1242-2030','Alina Fabrice', 0202401367, 1592,'5 months','9080GC','New');

insert into DUEDILIGENGE_STAGEII values ('1245TV', '1234-5678','Sedinam Afenyo', '12 months', 0209870987, 2352, 'working','accepted');  
insert into DUEDILIGENGE_STAGEII values ('1123FN', '7454-8900','Nana Afia Oppong', '3 months', 0542482832, 300, 'working','accepted'); 
insert into DUEDILIGENGE_STAGEII values ('2223WM', '1123-5642','Kwame Darko', '6 months', 0242849953, 4326, 'unemployeed','rejected'); 
insert into DUEDILIGENGE_STAGEII values ('5432TV', '1234-0909','Sonia Tettey', '1 month', 0272343408, 3147, 'unemployeed','rejected'); 
insert into DUEDILIGENGE_STAGEII values ('3389AC', '2345-5641','Elina Wiafe', '5 months', 0202032039, 2105, 'working','accepted'); 
insert into DUEDILIGENGE_STAGEII values ('4536FR', '5034-3400','Sophia Anderson', '9 months', 0502303496, 2097, 'working','accepted'); 
insert into DUEDILIGENGE_STAGEII values ('9080GC', '1234-1234','Kofi N.A Obeng', '12 months', 0506785421, 1782, 'working','accepted'); 
insert into DUEDILIGENGE_STAGEII values ('3456LT', '1230-8900','Nana Afia Birago', '3 months', 0542482821, 5940, 'working','accepted'); 
insert into DUEDILIGENGE_STAGEII values ('2857WM', '2323-5642','Arthur Tetteh', '2 months', 0542649973, 1068, 'unemployeed','rejected'); 
insert into DUEDILIGENGE_STAGEII values ('4461TV', '9034-0304','Dzifa Holali', '8 months', 0248761232, 1592, 'working','accepted'); 
insert into DUEDILIGENGE_STAGEII values ('4462TV', '2345-1132','Jefferson Nyame','5 months','0203123235',2224,'working','accepted'); 
insert into DUEDILIGENGE_STAGEII values ('2223WM','9034-0323','Holali Kortey','6 months', 0248761232, 2448,'working','accepted');
insert into DUEDILIGENGE_STAGEII values ('5432TV','4214-0141','Selali Doku','7 months', 0204562304, 4200,'working','accepted');
insert into DUEDILIGENGE_STAGEII values ('3436LT','9232-0403','Sami Nunakor','9 months', 0502452341, 6309,'working','accepted');
insert into DUEDILIGENGE_STAGEII values ('3372AC','8782-1109','Daniel N Anyano','8 months', 0550230110, 2448,'working','accepted');
insert into DUEDILIGENGE_STAGEII values ('1080GC','1242-2030','Alina Fabrice','5 months', 0202401367, 2035,'working','accepted');

insert into LOCATION values ('GA-543-0125', 'Zone A','Lashibi','Vivian Farm');
insert into LOCATION values ('GA-123-2341', 'Zone B','Tema','A1 Racway Go Karting');
insert into LOCATION values ('GA-443-5230', 'Zone C','Spintex','Unique Child School');
insert into LOCATION values ('GA-980-2312', 'Zone A','Ashiaman','Ecobank Ashiaman Branch');
insert into LOCATION values ('GA-124-9394', 'Zone B','Nungua','Nungua Police Barrier');
insert into LOCATION values ('VR-214-2348', 'Zone D','Ho','Calvary Baptist Church');
insert into LOCATION values ('GA-342-9350', 'Zone C','Nungua','Royal Ravico');
insert into LOCATION values ('VR-221-0987', 'Zone D','Keta','NHIS Office');
insert into LOCATION values ('GA-344-0239', 'Zone A','Nungua','St Michael JHS');
insert into LOCATION values ('GA-554-9420', 'Zone C','East Legon','Citrus Restaurant and Lounge');
insert into LOCATION values ('GA-501-8425', 'Zone B','Nungua','Royal Ravico');
insert into LOCATION values ('VR-141-0223', 'Zone A','Lashibi','St James School');
insert into LOCATION values ('GA-523-2399', 'Zone B','Tema','Papaye');
insert into LOCATION values ('VR-345-5218', 'Zone C','Spintex','First Choice Hair & Beauty');
insert into LOCATION values ('GA-984-4443', 'Zone A','Ashiaman','Ashiaman District Court');
insert into LOCATION values ('GA-111-9325', 'Zone B','Nungua','Junction Mall');

insert into DELIVERY values ('1245TV', '1234-5678','Sedinam Afenyo','GA-543-0125','2021-01-23'); 
insert into DELIVERY values ('1123FN', '7454-8900','Nana Afia Oppong','GA-123-2341','2021-01-09'); 
insert into DELIVERY values ('3389AC', '2345-5641','Elina Wiafe','GA-124-9394','2021-01-12');
insert into DELIVERY values ('4536FR', '5034-3400','Sophia Anderson','VR-214-2348','2021-03-10');
insert into DELIVERY values ('9080GC', '1234-1234','Kofi N.A Obeng','GA-342-9350','2020-11-25'); 
insert into DELIVERY values ('3456LT', '1230-8900','Nana Afia Birago','VR-221-0987','2020-12-29'); 
insert into DELIVERY values ('4461TV', '9034-0304','Dzifa Holali','GA-554-9420','2021-01-20'); 
insert into DELIVERY values ('4462TV', '2345-1132','Jefferson Nyame','GA-501-8425','2021-02-15'); 
insert into DELIVERY values ('2223WM','9034-0323','Holali Kortey','VR-141-0223','2021-04-02');
insert into DELIVERY values ('5432TV','4214-0141','Selali Doku','GA-523-2399','2020-12-27');
insert into DELIVERY values ('3436LT','9232-0403','Sami Nunakor','VR-345-5218','2021-01-28');
insert into DELIVERY values ('3372AC','8782-1109','Daniel N Anyano','GA-984-4443','2021-04-25');
insert into DELIVERY values ('1080GC','1242-2030','Alina Fabrice','GA-111-9325','2020-09-24');

insert into RECOLLECTION values ('1234-5678','Sedinam Afenyo','2021-01-23','Cash','Richard Dake',196,196,'on time','GA-543-0125');
insert into RECOLLECTION values ('7454-8900','Nana Afia Oppong','2020-06-09','Mobile Money',null,100,330,'defaulting','GA-123-2341');
insert into RECOLLECTION values ('8782-1109','Daniel N Anyano','2021-04-25','Post-dated Cheques',null, 283, 283,'on time','GA-984-4443');
insert into RECOLLECTION values ('1242-2030','Alina Fabrice','2020-09-24','Post-dated Cheques',null, 235, 407,'defaulting','GA-111-9325');
insert into RECOLLECTION values ('2345-5641','Elina Wiafe','2021-01-12','Mobile Money',null,421,421,'on time','GA-124-9394');
insert into RECOLLECTION values ('1230-8900','Nana Afia Birago','2021-04-29','Cash','Kofi Amphonsah',1980,6000,'defaulting','VR-221-0987');
insert into RECOLLECTION values ('5034-3400','Sophia Anderson','2021-03-10','Cash','Richard Dake',233, 233,'on time','VR-214-2348');
insert into RECOLLECTION values ('1234-1234','Kofi N.A Obeng','2020-11-25','Mobile Money',null,148,148,'on time','GA-342-9350');
insert into RECOLLECTION values ('9034-0304','Dzifa Holali','2021-01-20','Mobile Money',null,199,199,'on time','GA-554-9420');
insert into RECOLLECTION values ('2345-1132','Jefferson Nyame','2021-02-15','Mobile Money',null,278,278,'on time','GA-501-8425');
insert into RECOLLECTION values ('9034-0323','Holali Kortey','2021-05-02','Post-dated Cheques',null, 721, 721,'on time','VR-141-0223');
insert into RECOLLECTION values ('4214-0141','Selali Doku','2020-12-27','Post-dated Cheques',null, 600, 600,'on time','GA-523-2399');
insert into RECOLLECTION values ('9232-0403','Sami Nunakor','2021-01-28','Post-dated Cheques',null, 701, 701,'on time','VR-345-5218');


insert into MOBILEMONEY values ('7454-8900','Nana Afia Oppong','Personal Account','Vodafone','Nana Afia Oppong','0502433832',100,null);
insert into MOBILEMONEY values ('2345-5641','Elina Wiafe','Vendor Account','MTN',null,null,421,'GTS Coldstore');
insert into MOBILEMONEY values ('1234-1234','Kofi N.A Obeng','Personal Account','Vodafone','Kofi Obeng','0506785421',148,null);
insert into MOBILEMONEY values ('9034-0304','Dzifa Holali','Personal Account','MTN','Dzifa Adzoa Holali','0248761232',199,null);
insert into MOBILEMONEY values ('2345-1132','Jefferson Nyame','Vendor Account','MTN',null,null,278,'GEMPA');

insert into CASH values ('1234-5678','Sedinam Afenyo',196,'GA-543-0125','work place');
insert into CASH values ('5034-3400','Sophia Anderson',233,'VR-214-2348','home');
insert into CASH values ('1230-8900','Nana Afia Birago',1980,'VR-221-0987','work place');

insert into POSTDATED_CHEQUES values ('9034-0323','Holali Kortey','Holali Naa Kortey', 721, '2021-05-02','Absa Bank');
insert into POSTDATED_CHEQUES values ('4214-0141','Selali Doku','Selali Ama Doku', 600, '2020-12-27','Ecobank');
insert into POSTDATED_CHEQUES values ('9232-0403','Sami Nunakor','Sami Nakie Nunakor', 701, '2021-01-28','Zenith Bank');
insert into POSTDATED_CHEQUES values ('8782-1109','Daniel N Anyano','Daniel Nii Anyano', 283, '2021-04-25','ADB');
insert into POSTDATED_CHEQUES values ('1242-2030','Alina Fabrice','Alina Fabrice', 407, '2020-09-24','uniBank Ghana');

insert into GUARANTOR values ('1234-5678','Sedinam Afenyo', 'Jonah Michel', 0209870987,'GA-543-0125','Friend','Confirmed');
insert into GUARANTOR values ('7454-8900','Nana Afia Oppong', 'Owureku Nettey', 0542482832,'GA-123-2341','Friend','Confirmed');
insert into GUARANTOR values ('1123-5642','Kwame Darko', 'Kwesi Asampa', 0242849953,'GA-123-2341','Family','Denied');
insert into GUARANTOR values ('1234-0909','Sonia Tettey', 'Matio Tetteh', 0272343408,'GA-123-2341','Friend','Denied');
insert into GUARANTOR values ('2345-5641','Elina Wiafe', 'Waltor Weta', 0202032039,'GA-124-9394','Collegue','Confirmed');
insert into GUARANTOR values ('5034-3400','Sophia Anderson', 'Adzoa Mensah', 0502303496,'VR-214-2348','Collegue','Confirmed');
insert into GUARANTOR values ('1234-1234','Kofi N.A Obeng', 'Kenneth Akorful', 0506785421,'GA-342-9350','Collegue','Confirmed');
insert into GUARANTOR values ('1230-8900','Nana Afia Birago', 'Rita Senanu', 0542482821,'VR-221-0987','Friend','Confirmed');
insert into GUARANTOR values ('2323-5642','Arthur Tetteh', 'Josephine Denty', 0542649973,'VR-221-0987','Family','Denied');
insert into GUARANTOR values ('9034-0304','Dzifa Holali', 'Alex Copper', 0248761232,'GA-554-9420','Friend','Confirmed');
insert into GUARANTOR values ('2345-1132','Jefferson Nyame','Elizabeth Jackson',0203123235,'GA-501-8425','Collegue','Confirmed'); 
insert into GUARANTOR values ('9034-0323','Holali Kortey', 'Lizzy Richardson', 0248761232,'VR-141-0223','Collegue','Confirmed');
insert into GUARANTOR values ('4214-0141','Selali Doku', 'Samuel Nunoo', 0204562304,'GA-523-2399','Collegue','Confirmed');
insert into GUARANTOR values ('9232-0403','Sami Nunakor', 'James Noni', 0502452341,'VR-345-5218','Friend','Confirmed');
insert into GUARANTOR values ('8782-1109','Daniel N Anyano', 'Dina Micheals', 0550230110,'GA-984-4443','Friend','Confirmed');
insert into GUARANTOR values ('1242-2030','Alina Fabrice', 'Nana Azimah', 0202401367,'GA-111-9325','Friend','Confirmed');

insert into INVESTORS values (0001, 'Nana Ama Thomas', 0242345678, 100000, 0.15,'2021-12-20','Nana Ama Thomas');
insert into INVESTORS values (0003, 'Ama Oze', 0506795676, 200000, 0.13,'2021-06-10','Ama Naa Oze');
insert into INVESTORS values (0004, 'Artter Tesano', 0203489873, 150000, 0.25,'2021-11-25','Artter Tesano');
insert into INVESTORS values (0005, 'Victoria Addo', 0552345689, 30000, 0.12,'2021-07-30','Victoria Addo and Ben Addo');
insert into INVESTORS values (0006, 'Beatrice Donko', 0276761231, 280000, 0.10,'2021-05-26','Kevin Donko');
insert into INVESTORS values (0010, 'Jalil Jefferson', 0241111114, 200000, 0.10,'2021-08-18','Jalil Jefferson');


/*QUERIES*/
SELECT 
    i.itemName,
    i.serialNumber,
    p.cashPrice,
    p.threeMonths,
    p.sixMonths,
    p.nineMonths,
    p.twelveMonths
FROM
    INVENTORY i
        INNER JOIN
    PRICELIST p USE INDEX (PRICELIST_INDEX) ON p.serialNumber = i.serialNumber;

SELECT 
    *
FROM
    CUSTOMER
        INNER JOIN
    GUARANTOR ON CUSTOMER.formserialNumber = GUARANTOR.formserialNumber;

SELECT 
    *
FROM
    RECOLLECTION
WHERE
    report = 'defaulting'
ORDER BY amountDue DESC;

SELECT 
    SUM(amountCollected) AS 'Total Default Collected',
    SUM(amountDue) AS 'Total Default Owed'
FROM
    RECOLLECTION
WHERE
    amountCollected < amountDue;

SELECT 
    *
FROM
    DUEDILIGENGE_STAGEII
WHERE
    contractStatus = 'rejected'
ORDER BY customerName;

SELECT 
    *
FROM
    DELIVERY
WHERE
    GPS LIKE 'VR%';


