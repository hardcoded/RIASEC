CREATE TABLE student (
  ID_student INTEGER AUTO_INCREMENT,
  login varchar(20),
  password varchar(30),
  first_name varchar(50),
  last_name varchar(50),
  prom INTEGER,
  PRIMARY KEY (ID_student)
);

CREATE TABLE profile (
  ID_profile INTEGER AUTO_INCREMENT,
  type ENUM('R','I','A','S','E','C'),
  url_description varchar(20),
  PRIMARY KEY (ID_profile)
);

CREATE TABLE result (
  student INTEGER,
  profile INTEGER,
  percentage INTEGER,
  PRIMARY KEY (student, profile)
);

CREATE TABLE department (
  ID_department INTEGER AUTO_INCREMENT,
  label_department char(3),
  PRIMARY KEY (ID_department)
);

CREATE TABLE prom (
  ID_prom INTEGER AUTO_INCREMENT,
  department INTEGER,
  year_prom ENUM('3','4','5'),
  graduation_year char(4),
  PRIMARY KEY ID_prom
);

CREATE TABLE proposition (
  group INTEGER,
  ID_proposition ENUM ('A','B','C','D','E','F'),
  label_proposition varchar(200),
  profile INTEGER,
  PRIMARY KEY (group, ID_proposition)
);

CREATE TABLE session (
  ID_session INTEGER AUTO_INCREMENT,
  code char(6),
  date_session date,
  PRIMARY KEY (ID_session)
);

CREATE TABLE admin (
  ID_admin INTEGER AUTO_INCREMENT,
  login varchar(20),
  password varchar(30),
  PRIMARY KEY (ID_admin)
);

ALTER TABLE result ADD FOREIGN KEY (student) REFERENCES student(ID_student);
ALTER TABLE result ADD FOREIGN KEY (profile) REFERENCES profile(ID_profile);
ALTER TABLE student ADD FOREIGN KEY (prom) REFERENCES prom(ID_prom);
ALTER TABLE prom ADD FOREIGN KEY (department) REFERENCES department(ID_department);
ALTER TABLE proposition ADD FOREIGN KEY (profile) REFERENCES profile(ID_profile);
