USE conference;

CREATE TABLE Login(
  userName VARCHAR(25) NOT NULL,
  passWord VARCHAR(25) NOT NULL,
  PRIMARY KEY(userName)
);

CREATE TABLE Room(
  roomNumber VARCHAR(10) NOT NULL,
  PRIMARY KEY (roomNumber)
);

/*Each Room could have many reservations: One-to-Many relation*/
/*Each userName has at most one Reservation: One-to-One relation*/
CREATE TABLE Reservation(
  id INT (10) NOT NULL AUTO_INCREMENT,
  roomID VARCHAR (10) NOT NULL,
  loginID VARCHAR (25) NOT NULL,
  description VARCHAR (200) NOT NULL,
#   waitList VARCHAR (200) DEFAULT NULL,
  FOREIGN KEY(roomID) REFERENCES Room(roomNumber)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(loginID) REFERENCES Login(userName)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  PRIMARY KEY(id)
);


/*We are not adding timeSlots/ReservationID here, because it will cause data redundancy
with the Reservation data Table. */

/*Each Reservation has one TimeSlot: One-to-One relation*/
/*Each Room has many TimeSlot: One-to-Many relation*/
CREATE TABLE TimeSlot(
  Tid INT (10) NOT NULL AUTO_INCREMENT,
  StartTime VARCHAR(10) NOT NULL,
  EndTime VARCHAR(10) NOT NULL,
  date VARCHAR (11) NOT NULL,
  ReservationID INT (10) NOT NULL,
  PRIMARY KEY(Tid),
  FOREIGN KEY(ReservationID) REFERENCES Reservation(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

# Each WaitList has many reservations
# Each Reservation has one WaitList
CREATE TABLE WaitList(
  ReservationID INT (10) NOT NULL,
  position INT (10) NOT NULL,
  FOREIGN KEY(ReservationID) REFERENCES Reservation(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE RoomLock(
  lockRoom VARCHAR(10) NOT NULL,
  userName VARCHAR(25) NOT NULL,
  FOREIGN KEY(lockRoom) REFERENCES Room(roomNumber)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY(userName) REFERENCES login(userName)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

/**ALTER FUNCTIONS**/
INSERT INTO Login (username, password)
VALUES('chen','abc'),
  ('slifer', 'skydragon123'),
  ('charizard', 'flamethrower987'),
  ('adriel', 'abc');

INSERT INTO Room(roomNumber)
VALUES ('H908'),('H432'),('H843'),('H123'),('H732'),('H320');


# Test Data set 1
# INSERT INTO Reservation(id, roomID, loginID, description)
# VALUES ('123','H432','chen','Delete this');
#
# INSERT INTO Reservation(id, roomID, loginID, description)
# VALUES ('124','H432','adriel','Maybe it is my room!');
#
# INSERT INTO Reservation(id, roomID, loginID, description)
# VALUES ('122','H432','chen','I will be removed soon!');
#
# INSERT INTO Reservation(id, roomID, loginID, description)
# VALUES ('125','H123','chen','Not in wait, drop it!');
#
# INSERT INTO Reservation(id, roomID, loginID, description)
# VALUES ('126','H123','chen','This will appear on View');
#
# INSERT INTO Reservation(id, roomID, loginID, description)
# VALUES ('127','H123','adriel','Move to waitList 1');
#
#
# INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
# VALUES (59,'10','11','11/19/2016',122);
# INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
# VALUES (60,'10','11','11/19/2016',123);
# INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
# VALUES (61,'10','11','11/19/2016',124);
# INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
# VALUES (62,'10','11','11/19/2016',125);
# INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
# VALUES (63,'10','11','11/19/2016',126);
# INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
# VALUES (64,'10','11','11/19/2016',127);
#
# INSERT INTO WaitList (ReservationID, position)
# VALUES (122, 1);
# INSERT INTO WaitList (ReservationID, position)
# VALUES (123, 3);
# INSERT INTO WaitList (ReservationID, position)
# VALUES (124, 2);
# INSERT INTO WaitList (ReservationID, position)
# VALUES (126, 1);
# INSERT INTO WaitList (ReservationID, position)
# VALUES (127, 2);

# Test Data Set 2
# INSERT INTO Reservation(id, roomID, loginID, description)
# VALUES ('123','H432','chen','I m not on wait list');
#
# INSERT INTO Reservation(id, roomID, loginID, description)
# VALUES ('124','H432','adriel','Maybe it is my room!');
#
# INSERT INTO Reservation(id, roomID, loginID, description)
# VALUES ('122','H432','charizard','I will be removed soon!');
#
# INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
# VALUES (59,'10','11','11/19/2016',122);
# INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
# VALUES (60,'10','11','11/19/2016',123);
# INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
# VALUES (61,'10','11','11/19/2016',124);
#
# INSERT INTO WaitList (ReservationID, position)
# VALUES (122, 1);
# INSERT INTO WaitList (ReservationID, position)
# VALUES (124, 2);

# Test Data Set 3
INSERT INTO Reservation(id, roomID, loginID, description)
VALUES ('123','H432','chen','I m not on wait list');

INSERT INTO Reservation(id, roomID, loginID, description)
VALUES ('124','H432','adriel','Maybe it is my room!');

INSERT INTO Reservation(id, roomID, loginID, description)
VALUES ('122','H432','charizard','I will be removed soon!');

INSERT INTO Reservation(id, roomID, loginID, description)
VALUES ('125','H123','charizard','I will be removed soon!');

INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
VALUES (59,'10','11','11/19/2016',122);
INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
VALUES (60,'10','11','11/19/2016',123);
INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
VALUES (61,'10','11','11/19/2016',124);
INSERT INTO TimeSlot(Tid,StartTime,EndTime,date,ReservationID)
VALUES (62,'7','11','11/19/2016',125);

INSERT INTO WaitList (ReservationID, position)
VALUES (122, 1);
INSERT INTO WaitList (ReservationID, position)
VALUES (124, 2);
INSERT INTO WaitList (ReservationID, position)
VALUES (125, 1);