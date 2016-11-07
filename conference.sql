USE conference;

CREATE TABLE Login(
  userName VARCHAR(25) NOT NULL,
  passWord VARCHAR(25) NOT NULL,
  PRIMARY KEY(userName)
);

/*Each Room could have many reservations: One-to-Many relation*/
/*Each userName has at most one Reservation: One-to-One relation*/
CREATE TABLE Reservation(
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
  ReservationID int(10) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(ReservationID) REFERENCES reservation(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);


/**ALTER FUNCTIONS**/
INSERT INTO Login (username, password)
    VALUES('chen','gobliinmaster420'),
      ('slifer', 'skydragon123'),
      ('charizard', 'flamethrower987');
