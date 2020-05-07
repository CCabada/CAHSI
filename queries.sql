
CREATE TABLE Participant (
Username CHAR(50) NOT NULL,
Password CHAR(50) NOT NULL ,
FName CHAR(50),
LName CHAR(50),
PRIMARY KEY (Username)
) Engine=InnoDB;

CREATE TABLE Admin (
AUsername CHAR(50) NOT NULL,
Password CHAR(50) NOT NULL ,
FName CHAR(50),
LName CHAR(50),
PRIMARY KEY (AUsername),
FOREIGN KEY (AUsername) REFERENCES Participant (Username)  ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;

CREATE TABLE Student (
SUsername CHAR(50) NOT NULL,
SID int NOT NULL auto_increment,
INDEX(SID),
Password CHAR(50) NOT NULL ,
FName CHAR(50),
LName CHAR(50),
Advocate boolean,
Classification CHAR(50) NOT NULL,
Ethnicity CHAR(50) NOT NULL,
Employment_Status CHAR(50) NOT NULL,
Nationality CHAR(50) NOT NULL,
Gender CHAR(50) NOT NULL,
Age int NOT NULL,
PRIMARY KEY (SUsername),
FOREIGN KEY (SUsername) REFERENCES Participant (Username)  ON UPDATE CASCADE ON DELETE CASCADE

) Engine=InnoDB;


CREATE TABLE Events (
AUsername CHAR(50) NOT NULL,
EventID int NOT NULL auto_increment,
INDEX(EventID),
Dates date NOT NULL,
Name CHAR(255) NOT NULL,
Type CHAR(255),
PRIMARY KEY (EventID),
FOREIGN KEY (AUsername) REFERENCES Admin (AUsername)  ON UPDATE CASCADE ON DELETE CASCADE


) Engine=InnoDB;

CREATE Table Event_times(
AUsername CHAR(50) NOT NULL,
EventID int NOT NULL auto_increment,
INDEX(EventID),
Times TIME NOT NULL,
PRIMARY KEY(AUsername, EventID, Times),
FOREIGN KEY (AUsername) REFERENCES Events (AUsername)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (EventID) REFERENCES Events (EventID)  ON UPDATE CASCADE ON DELETE CASCADE

);

CREATE Table Event_companies(
AUsername CHAR(50) NOT NULL,
EventID int NOT NULL,
INDEX(EventID),
Companies_attending BLOB,
FOREIGN KEY (AUsername) REFERENCES Events (AUsername)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (EventID) REFERENCES Events (EventID)  ON UPDATE CASCADE ON DELETE CASCADE);

CREATE Table Event_sponsoring(
AUsername CHAR(50) NOT NULL,
EventID int NOT NULL,
INDEX(EventID),
Companies_attending BLOB,
FOREIGN KEY (AUsername) REFERENCES Events (AUsername)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (EventID) REFERENCES Events (EventID)  ON UPDATE CASCADE ON DELETE CASCADE);

CREATE TABLE Offers (
SUsername CHAR(50) NOT NULL,
OfferID int NOT NULL auto_increment,
INDEX(OfferID),
Type CHAR(50) NOT Null,
Date_Recieved date NOT NULL,
Interview CHAR(50) NOT NULL,
Company CHAR(50) NOT NULL,
Response Char(50),
PRIMARY KEY (OfferID, SUsername),
FOREIGN KEY (SUsername) REFERENCES Student (SUsername)  ON UPDATE CASCADE ON DELETE CASCADE


) Engine=InnoDB;

CREATE Table Zipcodes (
ZipCode int(5) NOT Null,
Country CHAR(50) NOT NULL,
primary key (ZipCode));

CREATE Table Cities (
Cities CHAR(50) NOT NULL,
State CHAR(50) NOT NULL,
primary key (Cities));

CREATE TABLE Location(
LocationID int NOT NULL auto_increment,
INDEX(LocationID),
ZipCode int(5) NOT Null,
City CHAR(50) NOT NULL,
Address CHAR(255) NOT NULL,
PRIMARY KEY (LocationID),
FOREIGN KEY (Zipcode) REFERENCES Zipcodes (ZipCode)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (City) REFERENCES Cities (Cities)  ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;


CREATE TABLE Event_Located (
LocationID  int NOT NULL,
INDEX(LocationID),
EventID int NOT NULL,
INDEX(EventID),
EventVenue CHAR(100),
EventRoom CHAR(100),
PRIMARY KEY (LocationID,EventID),
FOREIGN KEY (LocationID) REFERENCES Location (LocationID) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (EventID) REFERENCES Events (EventID) ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;


CREATE TABLE Institution (
UID int NOT NULL auto_increment,
INDEX(UID),
Institution_Name CHAR(255) NOT NULL,
PRIMARY KEY (UID)

) Engine=InnoDB;

CREATE TABLE Reports (
AUsername CHAR(50) NOT NULL,
ReportID int auto_increment NOT NULL ,
INDEX(ReportID),
PRIMARY KEY (AUsername,  ReportID),
FOREIGN KEY (AUsername) REFERENCES Events (AUsername)  ON UPDATE CASCADE ON DELETE CASCADE

) Engine=InnoDB;

CREATE TABLE CheckIn (
SID int NOT NULL,
INDEX(SID),
EventID int NOT NULL,
INDEX(EventID),
PRIMARY KEY (SID, EventID),
FOREIGN KEY (SID) REFERENCES Student(SID) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (EventID) REFERENCES Events (EventID) ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;

CREATE TABLE Attends (
SUsername CHAR(50) NOT NULL,
UID int NOT NULL,
INDEX(UID),
PRIMARY KEY (SUsername, UID),
FOREIGN KEY (SUsername) REFERENCES Student(SUsername) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (UID) REFERENCES Institution (UID) ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;

CREATE TABLE Creates_Report(
AUsername CHAR(50) NOT NULL,
ReportID int NOT NULL ,
INDEX(ReportID),
PRIMARY KEY (AUsername,  ReportID),
FOREIGN KEY (AUsername) REFERENCES Admin(AUsername) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (ReportID) REFERENCES Reports(ReportID) ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;

CREATE TABLE Manage (
AUsername CHAR(50) NOT NULL,
EventID int NOT NULL,
INDEX(EventID),
PRIMARY KEY (AUsername, EventID),
FOREIGN KEY (AUsername) REFERENCES Admin (AUsername) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (EventID) REFERENCES Events (EventID) ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;

CREATE TABLE Institution_Located (
LocationID  int NOT NULL,
INDEX(LocationID),
UID int NOT NULL,
INDEX(UID),
PRIMARY KEY (LocationID,UID),
FOREIGN KEY (LocationID) REFERENCES Location (LocationID) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (UID) REFERENCES Institution (UID) ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;



CREATE TABLE Earned (
SUsername CHAR(50) NOT NULL,
OfferID int NOT NULL,
INDEX(OfferID),
PRIMARY KEY (SUsername, OfferID),
FOREIGN KEY (SUsername) REFERENCES Student(SUsername) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (OfferID) REFERENCES Offers (OfferID) ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;

show tables;




INSERT INTO participant (Username, Password, FName, LName) VALUES ('admin1', 'admin1', 'admin1', 'admin1');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('admin2', 'admin2', 'admin2', 'admin2');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('admin3', 'admin3', 'admin3', 'admin3');

INSERT INTO participant (Username, Password, FName, LName) VALUES ('student1', 'student1', 'student1', 'student1');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('student2', 'student2', 'student2', 'student2');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('student3', 'student3', 'student3', 'student3');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('student4', 'student4', 'student4', 'student4');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('student5', 'student5', 'student5', 'student5');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('student6', 'student6', 'student6', 'student6');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('student7', 'student7', 'student7', 'student7');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('student8', 'student8', 'student8', 'student8');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('student9', 'student9', 'student9', 'student9');


INSERT INTO Admin (AUsername, Password, FName, LName) VALUES ('admin1', 'admin1', 'admin', 'admin1');
INSERT INTO Admin (AUsername, Password, FName, LName) VALUES ('admin2', 'admin2', 'admin2', 'admin2');
INSERT INTO Admin (AUsername, Password, FName, LName) VALUES ('admin3', 'admin3', 'admin3', 'admin3');

INSERT INTO Student(SUsername, Classification, Ethnicity, Employment_Status, Nationality, Gender, Age, Password, FName, LName) VALUES ('student1','test', 'test','test', 'test','test','21','student1', 'student1', 'student1');
INSERT INTO Student(SUsername, Classification, Ethnicity, Employment_Status, Nationality, Gender, Age, Password, FName, LName) VALUES ('student2','test', 'test','test', 'test','test','22','student2', 'student2', 'student2');
INSERT INTO Student(SUsername, Classification, Ethnicity, Employment_Status, Nationality, Gender, Age, Password, FName, LName) VALUES ('student3','test', 'test','test', 'test','test','23','student3', 'student3', 'student3');


UPDATE Student set Gender = 'Female' where SUsername = 'student1';
UPDATE Student set Gender = 'Female' where SUsername = 'student2';
UPDATE Student set Gender = 'Male' where SUsername = 'student3';

UPDATE Student set Advocate = 0 where SUsername = 'student1';
UPDATE Student set Advocate = 0 where SUsername = 'student2';
UPDATE Student set Advocate = 0 where SUsername = 'student3';




INSERT INTO Attends(susername, uid) VALUES ('student1', 1);
INSERT INTO Attends(susername, uid) VALUES ('student2', 2);
INSERT INTO Attends(susername, uid) VALUES ('student3', 3);



INSERT INTO Offers(SUsername, Type, Date_Recieved, Interview, Company, Response) VALUES ('student1','Full-Time','2020/08/25', 'Yes', 'Google','Accept' );
INSERT INTO Offers(SUsername, Type, Date_Recieved, Interview, Company, Response) VALUES  ('student2','Internship' ,'2020/08/25', 'Yes', 'Intel', 'Accept' );
INSERT INTO Offers(SUsername, Type, Date_Recieved, Interview, Company, Response) VALUES ('student3','Full-Time','2020/08/25', 'Yes', 'CIA', 'Denied');


UPDATE Offers set

INSERT INTO Earned(SUsername, OfferID) VALUES ('student1', 1);
INSERT INTO Earned(SUsername, OfferID) VALUES ('student2', 2);
INSERT INTO Earned(SUsername, OfferID) VALUES ('student3', 3);

INSERT INTO Reports (AUsername, ReportID) VALUES ('admin1', 1);
INSERT INTO Reports (AUsername, ReportID) VALUES ('admin1', 2);
INSERT INTO Reports (AUsername, ReportID) VALUES ('admin1', 3);


INSERT INTO Creates_Report(AUsername, ReportID) VALUES ('admin1', 1);
INSERT INTO Creates_Report(AUsername, ReportID) VALUES ('admin1', 2);
INSERT INTO Creates_Report(AUsername, ReportID) VALUES ('admin1', 3);

INSERT INTO Manage(AUsername, EventID) VALUES ('admin1', 1);
INSERT INTO Manage(AUsername, EventID) VALUES ('admin1', 2);
INSERT INTO Manage(AUsername, EventID) VALUES ('admin1', 3);

INSERT INTO CheckIn(SID, EventID) VALUES (1,1);
INSERT INTO CheckIn(SID, EventID) VALUES (2,2);
INSERT INTO CheckIn(SID, EventID) VALUES (3,3);

INSERT INTO CheckIn(SID, EventID) VALUES (1,3);

INSERT INTO Events (AUsername, Dates, Name, Type) VALUES ( 'admin1',  '2020-08-25', 'ACM Workshop', 'Workshop');
INSERT INTO Events (AUsername, Dates, Name, Type) VALUES ( 'admin1', '2020-08-25', 'IEEE Workshop', 'Workshop');
INSERT INTO Events (AUsername, Dates, Name, Type) VALUES ( 'admin1', '2020-08-25', 'ACM-W Workshop', 'Workshop');

INSERT INTO Event_companies (AUsername, EventID, Companies_attending) value ('admin1',1,'Google');
INSERT INTO Event_companies (AUsername, EventID, Companies_attending) value ('admin1',2,'Intel');
INSERT INTO Event_companies (AUsername, EventID, Companies_attending) value ('admin1',3,'CIA');

INSERT INTO Event_sponsoring(AUsername, EventID, Companies_attending) value ('admin1',1,'Google');
INSERT INTO Event_sponsoring (AUsername, EventID, Companies_attending) value ('admin1',2,'Intel');
INSERT INTO Event_sponsoring (AUsername, EventID, Companies_attending) value ('admin1',3,'CIA');

ALTER Table Event_sponsoring CHANGE COLUMN Companies_attending Companies_sponsoring BLOB Null;

INSERT INTO Event_times(AUsername, EventID, Times) value ('admin1',1,083000);
INSERT INTO Event_times(AUsername, EventID, Times) value ('admin1',2,083000);
INSERT INTO Event_times(AUsername, EventID, Times) value ('admin1',3,083000);

INSERT INTO Institution ( Institution_Name) VALUES ('UTEP');
INSERT INTO Institution (Institution_Name) VALUES ('NMSU');
INSERT INTO Institution ( Institution_Name) VALUES ('EPPC');

INSERT INTO Zipcodes(zipcode, country) VALUES (79902, 'United States');
INSERT INTO Zipcodes(zipcode, country) VALUES (79915, 'United States');
INSERT INTO Zipcodes(zipcode, country) VALUES (88003, 'United States');

INSERT INTO Cities (Cities, State) Values ('El Paso', 'Texas');
INSERT INTO Cities (Cities, State) Values ('Las Cruces', 'New Mexico');

INSERT INTO location (ZipCode, City, Address) VALUES (79902, 'El Paso', '500 University');
INSERT INTO location (ZipCode, City, Address) VALUES (79915, 'El Paso', '919 Hunter Dr');
INSERT INTO location (ZipCode,  City, Address) VALUES (88003,  'Las Cruces', '1780 E University Ave');

INSERT INTO Institution_Located(LocationID, UID) VALUES (1,1);
INSERT INTO Institution_Located(LocationID, UID) VALUES (2,3);
INSERT INTO Institution_Located(LocationID, UID) VALUES (3,2);

INSERT INTO Event_Located(locationid, eventid, EventVenue, EventRoom) VALUES(1,1, 'Union', '313');
INSERT INTO Event_Located(locationid, eventid, EventVenue, EventRoom)  VALUES(1,2, 'CCSB', '1.706');
INSERT INTO Event_Located(locationid, eventid, EventVenue, EventRoom)  VALUES(1,3, 'Union', '315');





SELECT * FROM s20am_team1.Events se INNER JOIN s20am_team1.event_located sl  INNER JOIN s20am_team1.location l where se.EventID = sl.EventID and  sl.LocationID = l.locationId;

drop table admin;
drop table events;
drop table institution;
drop table location;
drop table offers;
drop table participant;
drop table student;
drop table Creates_Report;
drop table Institution_Located;
drop table Manage;
drop table Cities;
drop table Zipcodes;
drop table Participant;
drop table Earned;
drop table Reports;
drop table Event_Located;
drop table Event_times;
drop table Event_companies;
drop table Event_sponsoring;
drop table Attends;
drop table CheckIn;


#Views
SELECT COUNT(*) From Student s inner JOIN  attends a inner join Institution I where s.SUsername = a.SUsername and I.Institution_Name like 'UTEP';

CREATE VIEW UtepStudents as SELECT COUNT(*) From Student s inner JOIN  attends a inner join Institution I where s.SUsername = a.SUsername and I.Institution_Name like 'UTEP';


CREATE VIEW FemaleOffers as SELECT COUNT(*) FROM STUDENT JOIN OFFERS USING (SUSERNAME) WHERE GENDER = 'Female' AND company = 'Google';

CREATE VIEW EventLocation as SELECT COUNT(*) FROM STUDENT JOIN OFFERS USING (SUSERNAME) WHERE GENDER = 'Female' AND company = 'Google';

Drop VIEW FemaleOffers;

CREATE VIEW EventAttendees as SELECT MAX(CHECKEDIN), Name FROM (SELECT NAME, CHECKEDIN FROM (EVENTS JOIN (SELECT EventID AS MAXEVENT, COUNT(EventId) AS CHECKEDIN FROM CHECKIN GROUP BY EventID ORDER BY MAXEVENT DESC LIMIT 3) AS PLS) WHERE EventID = MAXEVENT AND TYPE = 'Workshop') AS Events;

SELECT * FROM FemaleOffers;

Drop view FemaleOffers;

SELECT Advocate from s20am_team1.student  where SUsername like 'testProUser' and Advocate = 1;

SELECT Advocate from s20am_team1.student where SUsername = 'student3' and Advocate = 1;

SELECT SUsername FROM s20am_team1.student where Advocate like 1;
