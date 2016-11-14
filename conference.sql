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
  waitList VARCHAR (200) DEFAULT NULL,
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
  id INT (10) NOT NULL AUTO_INCREMENT,
  StartTime VARCHAR(10) NOT NULL,
  EndTime VARCHAR(10) NOT NULL,
  date VARCHAR (11) NOT NULL,
  ReservationID INT (10) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(ReservationID) REFERENCES Reservation(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);


/**ALTER FUNCTIONS**/
INSERT INTO Login (username, password)
VALUES('chen','gobliinmaster420'),
  ('slifer', 'skydragon123'),
  ('charizard', 'flamethrower987'),
  ('adriel', 'abc');

INSERT INTO Room(`roomNumber`)
VALUES ('H908'),('H432'),('H843'),('H123'),('H732'),('H320');