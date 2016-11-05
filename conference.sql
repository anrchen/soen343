USE conference;

CREATE TABLE Login(
  userName VARCHAR(25) NOT NULL PRIMARY KEY,
  passWord VARCHAR(25) NOT NULL
);

/*Each Room could have many reservations: One-to-Many relation*/
/*Each userName has at most one Reservation: One-to-One relation*/
CREATE TABLE Reservation(
  ReservationID VARCHAR(10) NOT NULL PRIMARY KEY,
  roomNumber INT(5) NOT NULL FOREIGN KEY REFERENCES RoomCatalog(roomNumber),
  userName VARCHAR(255) NOT NULL FOREIGN KEYR EFERENCES Login(username)
);

CREATE TABLE RoomCatalog(
  roomNumber INT(5) NOT NULL FOREIGN KEY REFERENCES RoomCatalog(roomNumber),
);

/*We are not adding timeSlots/ReservationID here, because it will cause data redundancy
with the Reservation data Table. */
 */
CREATE TABLE Room(
  roomNumber INT(5) NOT NULL PRIMARY KEY;
  /*capacity ... */
);

/*Each Rev*/
CREATE TABLE TimeSlot(
  StartTime VARCHAR(10) NOT NULL,
  EndTime VARCHAR(10) NOT NULL,
  Waitlists VARCHAR(255) NOT NULL,
  ReservationID VARCHAR(10) NOT NULL FOREIGN KEY REFERENCES Reservation(ReservationID)
);

INSERT INTO Login (username, password)
    VALUES('chen','gobliinmaster420'),
      ('slifer', 'skydragon123'),
      ('charizard', 'flamethrower987');
