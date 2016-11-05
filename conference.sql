USE conference;

CREATE TABLE Login(
  userName VARCHAR(25) NOT NULL,
  passWord VARCHAR(25) NOT NULL,
  PRIMARY KEY(userName)
);

/*Each Room could have many reservations: One-to-Many relation*/
/*Each userName has at most one Reservation: One-to-One relation*/
CREATE TABLE Reservation(
  ReservationID VARCHAR(10) NOT NULL,
  roomNumber INT(5) NOT NULL,
  userName VARCHAR(255) NOT NULL,
  PRIMARY KEY(ReservationID),
  FOREIGN KEY(roomNumber) REFERENCES RoomCatalog(roomNumber)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
  FOREIGN KEY(userName) REFERENCES Login(username)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE RoomCatalog(
  roomNumber INT(5) NOT NULL,
  FOREIGN KEY(roomNumber) REFERENCES Room(roomNumber)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

/*We are not adding timeSlots/ReservationID here, because it will cause data redundancy
with the Reservation data Table. */

CREATE TABLE Room(
  roomNumber INT(5) NOT NULL,
  PRIMARY KEY (roomNumber)
  /*capacity ... */
);

/*Each Rev*/
CREATE TABLE TimeSlot(
  StartTime VARCHAR(10) NOT NULL,
  EndTime VARCHAR(10) NOT NULL,
  Waitlists VARCHAR(255) NOT NULL,
  ReservationID VARCHAR(10) NOT NULL,
  FOREIGN KEY(ReservationID) REFERENCES Reservation(ReservationID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

INSERT INTO Login (username, password)
    VALUES('chen','gobliinmaster420'),
      ('slifer', 'skydragon123'),
      ('charizard', 'flamethrower987');
