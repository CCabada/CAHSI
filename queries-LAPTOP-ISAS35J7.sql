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
PRIMARY KEY (AUsername)
) Engine=InnoDB;

CREATE TABLE Student (
SUsername CHAR(50) NOT NULL,
SID int NOT NULL auto_increment,
INDEX(SID),
Classification CHAR(50) NOT NULL,
Ethnicity CHAR(50) NOT NULL,
Employment_Status CHAR(50) NOT NULL,
Nationality CHAR(50) NOT NULL,
Gender CHAR(50) NOT NULL,
Age int NOT NULL,
Password CHAR(50) NOT NULL ,
FName CHAR(50),
LName CHAR(50),
PRIMARY KEY (SUsername)

) Engine=InnoDB;


CREATE TABLE Events (
EventID int NOT NULL auto_increment,
INDEX(EventID),
Times TIME NOT NULL,
Dates date NOT NULL,
Name CHAR(255) NOT NULL,
Type CHAR(255),
Companies_attending BLOB,
Companies_sponsoring BLOB,
PRIMARY KEY (EventID)

) Engine=InnoDB;

CREATE TABLE Offers (
OfferID int NOT NULL auto_increment,
INDEX(OfferID),
Type CHAR(50) NOT Null,
Date_Recieved date NOT NULL,
Interview CHAR(50) NOT NULL,
Company CHAR(50) NOT NULL,
Response Boolean,
PRIMARY KEY (OfferID)

) Engine=InnoDB;

CREATE TABLE Location(
LocationID int NOT NULL auto_increment,
INDEX(LocationID),
ZipCode int(5) NOT Null,
Country CHAR(50) NOT NULL,
State CHAR(50) NOT NULL,
City CHAR(50) NOT NULL,
Address CHAR(255) NOT NULL,
PRIMARY KEY (LocationID)

) Engine=InnoDB;

CREATE TABLE Institution (
UID int NOT NULL auto_increment,
INDEX(UID),
Institution_Name CHAR(255) NOT NULL,
PRIMARY KEY (UID)

) Engine=InnoDB;

CREATE TABLE Reports (
ReportID int NOT NULL auto_increment,
INDEX(ReportID),
Times TIME NOT NULL,
Dates date NOT NULL,
Name CHAR(50) NOT NULL,
Type CHAR(50) NOT Null,
Companies_attending BLOB,
Companies_sponsoring BLOB,
PRIMARY KEY (ReportID)

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

CREATE TABLE Earned (
SUsername CHAR(50) NOT NULL,
OfferID int NOT NULL,
INDEX(OfferID),
PRIMARY KEY (SUsername),
FOREIGN KEY (SUsername) REFERENCES Student(SUsername) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (OfferID) REFERENCES Offers (OfferID) ON UPDATE CASCADE ON DELETE CASCADE
) Engine=InnoDB;

show tables;
 drop table earned;



INSERT INTO participant (Username, Password, FName, LName) VALUES ('admin1', 'admin1', 'admin1', 'admin1');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('admin2', 'admin2', 'admin2', 'admin2');
INSERT INTO participant (Username, Password, FName, LName) VALUES ('admin3', 'admin3', 'admin3', 'admin3');

INSERT INTO Admin (AUsername, Password, FName, LName) VALUES ('admin1', 'admin1', 'admin', 'admin1');
INSERT INTO Admin (AUsername, Password, FName, LName) VALUES ('admin2', 'admin2', 'admin2', 'admin2');
INSERT INTO Admin (AUsername, Password, FName, LName) VALUES ('admin3', 'admin3', 'admin3', 'admin3');

INSERT INTO Student(SUsername, Classification, Ethnicity, Employment_Status, Nationality, Gender, Age, Password, FName, LName) VALUES ('student1','test', 'test','test', 'test','test','21','student1', 'student1', 'student1');
INSERT INTO Student(SUsername, Classification, Ethnicity, Employment_Status, Nationality, Gender, Age, Password, FName, LName) VALUES ('student2','test', 'test','test', 'test','test','22','student2', 'student2', 'student2');
INSERT INTO Student(SUsername, Classification, Ethnicity, Employment_Status, Nationality, Gender, Age, Password, FName, LName) VALUES ('student3','test', 'test','test', 'test','test','23','student3', 'student3', 'student3');

INSERT INTO Attends(susername, uid) VALUES ('student1', 1);
INSERT INTO Attends(susername, uid) VALUES ('student2', 2);
INSERT INTO Attends(susername, uid) VALUES ('student3', 3);

INSERT INTO Earned(SUsername, OfferID) VALUES ('student1', 1);
INSERT INTO Earned(SUsername, OfferID) VALUES ('student2', 2);
INSERT INTO Earned(SUsername, OfferID) VALUES ('student3', 3);

INSERT INTO Offers( Type, Date_Recieved, Interview, Company) VALUES ('Full-Time','2020/08/25', 'Yes', 'Google' );
INSERT INTO Offers( Type, Date_Recieved, Interview, Company) VALUES ('Internship' ,'2020/08/25', 'Yes', 'Intel' );
INSERT INTO Offers( Type, Date_Recieved, Interview, Company) VALUES ('Full-Time','2020/08/25', 'Yes', 'CIA');

INSERT INTO Reports (Times, Dates, Name, Type, Companies_attending, Companies_sponsoring) VALUES ( 000001, '2020-08-25', 'ACM Workshop', 'Workshop', 'Google', 'Google');
INSERT INTO Reports (Times, Dates, Name, Type, Companies_attending, Companies_sponsoring) VALUES (000001, '2020-08-25', 'IEEE Workshop', 'Workshop', 'Intel', 'Intel');
INSERT INTO Reports (Times, Dates, Name, Type, Companies_attending, Companies_sponsoring) VALUES (000001, '2020-08-25', 'ACM-W Workshop', 'Workshop', 'CIA', 'CIA');

INSERT INTO Creates_Report(AUsername, ReportID) VALUES ('admin1', 1);
INSERT INTO Creates_Report(AUsername, ReportID) VALUES ('admin2', 2);
INSERT INTO Creates_Report(AUsername, ReportID) VALUES ('admin3', 3);

INSERT INTO Manage(AUsername, EventID) VALUES ('admin1', 1);
INSERT INTO Manage(AUsername, EventID) VALUES ('admin2', 2);
INSERT INTO Manage(AUsername, EventID) VALUES ('admin3', 3);

INSERT INTO CheckIn(SID, EventID) VALUES (1,1);
INSERT INTO CheckIn(SID, EventID) VALUES (2,2);
INSERT INTO CheckIn(SID, EventID) VALUES (3,3);

INSERT INTO Events (Times, Dates, Name, Type, Companies_attending, Companies_sponsoring) VALUES ( 101010, '2020-08-25', 'ACM Workshop', 'Workshop', 'Google', 'Google');
INSERT INTO Events (Times, Dates, Name, Type, Companies_attending, Companies_sponsoring) VALUES ( 101010, '2020-08-25', 'IEEE Workshop', 'Workshop', 'Intel', 'Intel');
INSERT INTO Events (Times, Dates, Name, Type, Companies_attending, Companies_sponsoring) VALUES ( 101010, '2020-08-25', 'ACM-W Workshop', 'Workshop', 'CIA', 'CIA');

INSERT INTO Institution ( Institution_Name) VALUES ('UTEP');
INSERT INTO Institution (Institution_Name) VALUES ('NMSU');
INSERT INTO Institution ( Institution_Name) VALUES ('EPPC');

INSERT INTO Institution_Located(LocationID, UID) VALUES (1,1);
INSERT INTO Institution_Located(LocationID, UID) VALUES (2,3);
INSERT INTO Institution_Located(LocationID, UID) VALUES (3,2);

INSERT INTO Event_Located(locationid, eventid, EventVenue, EventRoom) VALUES(1,1, 'Union', '313');
INSERT INTO Event_Located(locationid, eventid, EventVenue, EventRoom)  VALUES(1,2, 'CCSB', '1.706');
INSERT INTO Event_Located(locationid, eventid, EventVenue, EventRoom)  VALUES(1,3, 'Union', '315');

INSERT INTO location (ZipCode, Country, State, City, Address) VALUES (79902, 'United States', 'Texas', 'El Paso', '500 University');
INSERT INTO location (ZipCode, Country, State, City, Address) VALUES (79915, 'United States', 'Texas', 'El Paso', '919 Hunter Dr');
INSERT INTO location (ZipCode, Country, State, City, Address) VALUES (88003, 'United States', 'New Mexico', 'Las Cruces', '1780 E University Ave');