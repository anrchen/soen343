USE conference;

CREATE TABLE login(
  username VARCHAR(255) NOT NULL PRIMARY KEY,
  password VARCHAR(255) NOT NULL
);

INSERT INTO login (username, password)
    VALUES('chen','gobliinmaster420'),
      ('slifer', 'skydragon123'),
      ('charizard', 'flamethrower987');