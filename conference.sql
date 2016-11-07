USE conference;

CREATE TABLE Login(
  userName VARCHAR(25) NOT NULL,
  passWord VARCHAR(25) NOT NULL,
  PRIMARY KEY(userName)
);

/*Each Room could have many reservations: One-to-Many relation*/
/*Each userName has at most one Reservation: One-to-One relation*/
CREATE TABLE Reservation(
<<<<<<< HEAD
  id INT(10) NOT NULL,
  roomID INT(10) NOT NULL,
  loginID INT(10) NOT NULL,
  FOREIGN KEY(roomID) REFERENCES room(roomNumber)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(loginID) REFERENCES login(userName)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  PRIMARY KEY(id)
=======
  ReservationID VARCHAR(10) NOT NULL,
  roomNumber INT(5) NOT NULL,
  userName VARCHAR(255) NOT NULL,
  Waitlists VARCHAR(255) NOT NULL,
  PRIMARY KEY(ReservationID),
  FOREIGN KEY(roomNumber) REFERENCES RoomCatalog(roomNumber)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
  FOREIGN KEY(userName) REFERENCES Login(username)
        ON DELETE CASCADE
        ON UPDATE CASCADE
>>>>>>> origin/test
);



/*We are not adding timeSlots/ReservationID here, because it will cause data redundancy
with the Reservation data Table. */

CREATE TABLE Room(
  roomNumber VARCHAR(5) NOT NULL,
  PRIMARY KEY (roomNumber)
);

/*Each Rev*/
CREATE TABLE TimeSlot(
  id INT(10) NOT NULL AUTO_INCREMENT,
  StartTime VARCHAR(10) NOT NULL,
  EndTime VARCHAR(10) NOT NULL,
<<<<<<< HEAD
  ReservationID int(10) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(ReservationID) REFERENCES reservation(id)
=======
  ReservationID VARCHAR(10) NOT NULL,
  FOREIGN KEY(ReservationID) REFERENCES Reservation(ReservationID)
>>>>>>> origin/test
        ON DELETE CASCADE
        ON UPDATE CASCADE
);


/**ALTER FUNCTIONS**/
INSERT INTO Login (username, password)
    VALUES('chen','gobliinmaster420'),
      ('slifer', 'skydragon123'),
      ('charizard', 'flamethrower987');
