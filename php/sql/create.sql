DROP TABLE IF EXISTS user;
CREATE TABLE user(
  userid INT AUTO_INCREMENT,
  firstname VARCHAR(255),
  lastname  VARCHAR(255),
  PRIMARY KEY (userid)
) ENGINE = INNODB;

DROP TABLE IF EXISTS seminar;
CREATE TABLE seminar(
  seminarid INT AUTO_INCREMENT,
  title VARCHAR(255),
  PRIMARY KEY (seminarid)
) ENGINE = INNODB;

DROP TABLE IF EXISTS attendance;
CREATE TABLE attendance (
  userid  INT,
  seminarid INT,
  PRIMARY KEY (userid, seminarid),
  FOREIGN KEY (userid) REFERENCES user(userid) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (seminarid) REFERENCES seminar(seminarid) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = INNODB;