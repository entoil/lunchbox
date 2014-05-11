CREATE TABLE `students` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) NOT NULL DEFAULT '',
  `mname` varchar(45) DEFAULT '',
  `lname` varchar(45) NOT NULL DEFAULT '',
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `street` varchar(255) NOT NULL DEFAULT '',
  `suburb` varchar(255) DEFAULT '',
  `postcode` varchar(45) DEFAULT '',
  `cname1` varchar(255) DEFAULT '',
  `crel1` varchar(45) DEFAULT '',
  `cmob1` varchar(255) DEFAULT '',
  `cemail1` varchar(255) DEFAULT '',
  `cname2` varchar(255) DEFAULT '',
  `crel2` varchar(45) DEFAULT '',
  `cmob2` varchar(255) DEFAULT '',
  `cemail2` varchar(255) DEFAULT '',
  `photo` varchar(255) DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=55000 DEFAULT CHARSET=latin1;

CREATE TABLE `saudits` (
  `said` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(45) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `by` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`said`),
  KEY `FK_saudits_1` (`sid`),
  CONSTRAINT `FK_saudits_1` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

CREATE TABLE `documents` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL DEFAULT '',
  `uploaded` varchar(45) NOT NULL DEFAULT '',
  `uploader` varchar(45) NOT NULL DEFAULT '',
  `notes` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`did`),
  KEY `FK_documents_1` (`sid`),
  CONSTRAINT `FK_documents_1` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `classes` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `teacher` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

CREATE TABLE `caudits` (
  `caid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(45) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `by` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`caid`),
  KEY `FK_caudits_1` (`cid`),
  CONSTRAINT `FK_caudits_1` FOREIGN KEY (`cid`) REFERENCES `classes` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

CREATE TABLE `enrolments` (
  `eid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(10) unsigned NOT NULL DEFAULT '0',
  `cid` int(10) unsigned NOT NULL DEFAULT '0',
  `start` date NOT NULL DEFAULT '0000-00-00',
  `end` date NOT NULL DEFAULT '0000-00-00',
  `owe` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`eid`),
  KEY `FK_enrolments_1` (`sid`),
  KEY `FK_enrolments_2` (`cid`),
  CONSTRAINT `FK_enrolments_1` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_enrolments_2` FOREIGN KEY (`cid`) REFERENCES `classes` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=750 DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='	';


INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Fiona","Jemima","Harrington","1996-07-10","9812 Elit, Rd.","Paulatuk","86428", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Dolan","Gwendolyn","Head","1994-08-01","Ap #437-3921 Nulla. St.","Newark","17586", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Nyssa","Demetrius","Green","1990-08-12","748-3081 Eget Av.","Issy-les-Moulineaux","38187", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Arsenio","Samantha","Franks","1996-12-31","457-2401 Et Rd.","Loverval","16408", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Stacy","Mariam","Rocha","1994-06-24","1204 Nulla. Ave","Baulers","98382", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Camilla","Macon","Watkins","1996-10-01","906-9437 Massa Ave","Montbliart","41294", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Phyllis","Amethyst","Beach","1994-08-01","747 Elit. Avenue","St. Andrä","40743", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Mechelle","Latifah","Livingston","1990-01-21","942-145 Magna Rd.","Pudukkottai","39082", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Evelyn","Tyler","Patterson","1996-04-03","P.O. Box 192, 3819 Augue Ave","Victoria","60993", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Ferris","Lani","Jones","1994-01-06","519-871 Luctus Rd.","Borriana","66569", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Rudyard","Patricia","Pitts","1997-06-30","P.O. Box 976, 4615 Massa. St.","Covington","25576", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Remedios","Maile","Wilcox","1992-12-06","173-1873 Massa St.","Poederlee","90739", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Kiayada","Ariana","Oneil","1997-12-02","Ap #266-1346 Aenean Rd.","Sennariolo","30639", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Sonya","Cecilia","Carpenter","1989-04-22","P.O. Box 894, 8571 Luctus Rd.","Thames","30893", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Anne","Mallory","Sweet","1988-06-10","893-575 Vitae, Street","Zolder","85088", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Bertha","Alma","Key","1995-06-01","457-460 Molestie. Avenue","Westkerke","72310", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Shaeleigh","Amena","Hale","1991-06-30","273-8488 Fermentum Road","Koolkerke","92435", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Rowan","Keely","Haney","1988-12-13","Ap #767-8438 Nam Rd.","Aosta","67621", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Shellie","Robert","Vargas","1996-04-08","Ap #828-5393 Nulla Ave","Dion-Valmont","19040", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Armando","Ashton","Rivers","1995-02-06","286-2688 Vitae St.","Metairie","91218", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");

INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Lester","Ivana","Mcknight","1997-09-04","Ap #924-2628 Rutrum. St.","Norfolk","82674", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Galena","Alika","Poole","1995-08-29","Ap #443-4205 Mus. Ave","Chiniot","70076", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Indira","Lyle","Ward","1994-10-30","Ap #458-2869 Faucibus St.","Bala","75595", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Talon","Carl","Bender","1989-01-29","Ap #313-2270 Parturient St.","Modena","77376", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Maggie","Lael","Nash","1995-03-14","P.O. Box 596, 3852 Adipiscing. Ave","Tiruchirapalli","70057", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Duncan","Kirestin","Juarez","1996-05-10","Ap #357-6000 Donec Av.","Milton Keynes","15655", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Melanie","Isaiah","Salinas","1991-02-20","Ap #815-6837 Lorem Rd.","Pike Creek","61324", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Christine","Hermione","Garza","1987-07-21","805-3871 Mi, St.","Nieuwmunster","34512", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Maxwell","Yvonne","Lindsay","1991-08-05","2107 Justo Rd.","Avise","62866", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Genevieve","Ethan","Sullivan","1987-07-28","565-6217 Enim. Avenue","Bitterfeld-Wolfen","24819", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Kelly","Ruth","Carroll","1994-06-07","P.O. Box 518, 8885 Magna. St.","Cheltenham","20913", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Jonah","Wilma","Crawford","1993-02-03","308-9719 Laoreet Road","Neustadt","38597", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Amy","Lillith","Mejia","1997-11-01","2750 Tellus Road","Rocky View","50938", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Nell","Hanna","Bradley","1995-10-25","5273 Cubilia Street","Kalyan","13114", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Gloria","Joshua","Burke","1986-10-22","448-5756 Ipsum. Avenue","Conselice","29569", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Elton","Dakota","Booker","1989-05-31","Ap #508-7272 Cursus Rd.","Prestatyn","38850", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Jasper","Rowan","Richards","1988-07-03","P.O. Box 321, 9432 Quisque Rd.","Massenhoven","45091", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Patrick","Libby","Grimes","1991-10-17","P.O. Box 212, 9322 Pharetra St.","Kurnool","96247", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Kevin","Jaime","Decker","1997-03-15","Ap #769-2214 Nec Street","Sundrie","56600", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");

INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Blythe","Leah","Mccarty","1990-09-27","Ap #938-6788 Ante Av.","Indianapolis","18413", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Barry","Cara","Duran","1990-06-25","984-4771 Quis Rd.","Valverde","14652", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Nigel","Eleanor","Valenzuela","1992-11-18","901-6819 Condimentum Street","Visso","55703", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Xenos","Graiden","Faulkner","1989-03-14","922-4366 Neque St.","Saint John","57645", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Rogan","Flynn","Mason","1992-05-23","Ap #340-5033 Lorem, Av.","Cuceglio","14841", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Tashya","Elmo","Atkinson","1993-04-25","P.O. Box 271, 5146 Ac Rd.","Gerpinnes","82674", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Jonas","Allegra","Mendez","1997-07-02","217-1472 Fermentum Av.","Arras","45225", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Alvin","Gloria","Albert","1990-04-02","P.O. Box 774, 9872 Aliquam Rd.","Liberia","57008", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Armando","Yeo","Butler","1989-07-09","Ap #109-725 Eu, Street","Waalwijk","96123", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Jarrod","Ivana","Stevenson","1989-06-14","Ap #112-608 Risus. Ave","Orai","19695", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Jenna","Dillon","Roach","1994-09-17","7841 Integer Ave","Saint-Marc","49710", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Malcolm","Cassidy","Crawford","1987-06-17","7129 Imperdiet St.","Minneapolis","66442", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Mikayla","Eden","Melendez","1991-12-09","P.O. Box 914, 2690 Curabitur Ave","Macklin","15275", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Mona","Joseph","Mcgee","1993-03-26","9532 At Rd.","Kapuskasing","37401", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Chester","Graham","Yates","1988-01-13","737-6420 Lorem Road","Baracaldo","41307", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Murphy","Honorato","Burton","1993-04-07","Ap #704-3550 Cras Ave","Habay-la-Vieille","86968", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Hoyt","Kaseem","Dickerson","1994-02-01","Ap #541-7193 Mauris Av.","Satara","80130", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Faith","Shelby","Gordon","1989-06-25","P.O. Box 360, 6526 Curae; Avenue","Leighton Buzzard","74635", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Scarlett","Yolanda","Macdonald","1992-10-25","3454 Vitae Road","Doues","28042", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Bell","Eleanor","Pena","1993-08-24","209-5396 Dui. St.","Renfrew","47412", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");

INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Whoopi","Samuel","Harrison","1987-11-25","992-5270 Feugiat Rd.","Miranda","14590", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Catherine","Alma","Wolf","1996-03-16","Ap #794-875 Sollicitudin Street","Madison","86951", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Alan","Ivory","English","1991-08-03","109-4831 Porttitor Street","Penzance","88377", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Brady","Eliana","Avery","1998-04-08","192-8144 In Av.","Clarksville","97869", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Kelsey","Felix","Goodwin","1996-11-13","Ap #835-4299 Ac Rd.","Trivigno","80341", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Stella","Imelda","Shepherd","1990-10-12","P.O. Box 143, 8486 Vivamus Road","Owen Sound","59971", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Hiroko","Kaden","Torres","1997-04-02","Ap #179-8054 Dui, Avenue","Greenlaw","48879", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Bell","Griffin","Maldonado","1996-08-13","694 Convallis Rd.","Columbus","46123", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Ignatius","Neville","Merritt","1987-01-24","2886 Urna. St.","Malkajgiri","91731", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Knox","Alana","Noel","1991-02-02","Ap #296-1460 Sit Street","Laken","13001", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Leilani","Abraham","Cleveland","1991-01-08","2230 Viverra. Street","Ganshoren","63126", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Jerry","Ryan","Dunlap","1991-04-10","835-9271 Etiam Street","Raichur","28461", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Quentin","Kai","Pickett","1996-10-15","Ap #452-3260 Convallis Ave","Longueville","17571", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Sloane","Clayton","Downs","1997-04-17","217-7810 Vulputate Street","Croydon","92088", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Zahir","Kermit","Whitley","1997-05-21","905-7348 Quam. Street","Castello dell'Acqua","83148", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Kibo","Urielle","Solis","1994-12-18","881-5613 Vel St.","Melsele","76721", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Zephr","Carissa","Gates","1995-05-23","Ap #401-1324 Vitae Avenue","Freising","60508", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Illana","Leah","Albert","1991-10-19","P.O. Box 837, 4595 Ipsum Ave","Pero","32119", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Jerome","Ursula","Horne","1989-12-30","Ap #210-620 Sem, St.","Kirkcaldy","36087", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");

INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Chester","Jin","Sanchez","1988-05-29","Ap #435-8563 Nunc Road","Tuticorin","98357", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Shannon","Connor","Melendez","1990-11-12","P.O. Box 590, 8194 Ligula. St.","Málaga","41079", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Tatyana","Bethany","Hyde","1989-05-27","P.O. Box 523, 6139 Elit. Road","Montreal","47463", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Macon","Jillian","Tyler","1988-10-01","529-1820 Hendrerit Rd.","Valcourt","52227", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Berk","Stephanie","Edwards","1994-04-07","Ap #770-9390 Sagittis. Street","Firozabad","10604", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Jerry","Nigel","Torres","1998-01-18","P.O. Box 548, 7367 Gravida Rd.","Yaxley","68262", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Wayne","Madeson","Mcmahon","1989-12-09","6559 Et Ave","Mangalore","66305", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Wesley","Ariana","Woods","1987-12-09","959 Mauris St.","Criciúma","46532", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Cameran","Gary","Vincent","1990-11-01","Ap #123-4252 Elit. Avenue","Lenna","61212", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Alan","Nyssa","Murray","1992-01-29","Ap #378-1598 Semper Street","Fiuminata","19571", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Uriah","Gemma","Norman","1991-02-02","P.O. Box 218, 1092 Eu St.","Kircudbright","14978", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Nayda","McKenzie","Valdez","1987-02-15","Ap #702-5249 Nunc Rd.","Filot","28572", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Teegan","Shelly","Monroe","1987-10-03","5795 Eleifend Street","M�rfelden-Walldorf","23247", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Caldwell","Ryan","Mercado","1990-09-30","P.O. Box 405, 5144 Vel, Rd.","Amravati","37899", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Ayanna","Cruz","Koch","1992-11-10","661-7430 Condimentum Rd.","Cercemaggiore","29784", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Dora","Ruby","Nichols","1987-06-27","5984 Enim. St.","Pirmasens","63224", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Delilah","Cruz","Lucas","1995-06-29","5972 Imperdiet, Street","Promo-Control","68045", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Indigo","Lillith","Murray","1992-03-25","5884 Ante. Rd.","Trois-Rivi?res","24079", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Akeem","Claudia","Vance","1994-02-01","Ap #467-6860 Ac Street","Mal","90407", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Patrick","Griffith","Gallegos","1996-01-08","P.O. Box 318, 3848 A St.","Waasmunster","23027", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Jessamine","Tanisha","Hobbs","1994-06-18","540-7503 Aliquet Av.","Anglet","49531", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");
INSERT INTO `students` (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ("Branden","Destiny","Newton","1995-05-17","958-8042 Aliquet Street","Bovesse","89798", "Christina Crawford", "Mother", "041922355", "ccrawford@gmail.com", "Victor Crawford", "Father", "041983716", "vcrawford@yahoo.com");

INSERT INTO classes (name,teacher) VALUES ("Grade 1","Neil Nguyen");
INSERT INTO classes (name,teacher) VALUES ("Grade 2","Emily Suarez");
INSERT INTO classes (name,teacher) VALUES ("Grade 3","Carolyn Roberts");
INSERT INTO classes (name,teacher) VALUES ("Grade 5","Jael Bender");
INSERT INTO classes (name,teacher) VALUES ("Grade 6","Taylor Jennings");

INSERT INTO `lunchbox`.`users`(`username`,`password`,`type`,`name`)VALUES('krisn', 'bahbah', '0', 'Kris Nicolls');
INSERT INTO `lunchbox`.`users`(`username`,`password`,`type`,`name`)VALUES('taylorj', 'bahbah', '1', 'Taylor Jennings');
INSERT INTO `lunchbox`.`users`(`username`,`password`,`type`,`name`)VALUES('jaelb', 'bahbah', '1', 'Jael Bender');
INSERT INTO `lunchbox`.`users`(`username`,`password`,`type`,`name`)VALUES('candicem', 'bahbah', '0', 'Candice Miller');
INSERT INTO `lunchbox`.`users`(`username`,`password`,`type`,`name`)VALUES('carolynr', 'bahbah', '1', 'Carolyn Roberts');
INSERT INTO `lunchbox`.`users`(`username`,`password`,`type`,`name`)VALUES('emilys', 'bahbah', '1', 'Emily Suarez');

DELIMITER $$ 

CREATE PROCEDURE enrol_g1()
   BEGIN
      DECLARE sid INT Default 55000 ;
      simple_loop: LOOP         
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 20, "2014-02-15", "2014-11-08", '0.00');
        SET sid=sid+1;
        IF sid=55019 THEN
        	LEAVE simple_loop;
        END IF;
   END LOOP simple_loop;

END $$
DELIMITER $$ 

CREATE PROCEDURE enrol_g2()
   BEGIN
	  DECLARE sid INT Default 55020 ;
      simple_loop: LOOP         
      	INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 20, "2013-02-01", "2013-11-10", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 21, "2014-02-15", "2014-11-08", '0.00');
        SET sid=sid+1;
        IF sid=55039 THEN
        	LEAVE simple_loop;
        END IF;
   END LOOP simple_loop;

END $$
DELIMITER $$ 

CREATE PROCEDURE enrol_g3()
   BEGIN
	  DECLARE sid INT Default 55040 ;
      simple_loop: LOOP         
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 20, "2012-02-10", "2012-11-14", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 21, "2013-02-01", "2013-11-10", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 22, "2014-02-15", "2014-11-08", '0.00');
        SET sid=sid+1;
        IF sid=55059 THEN
        	LEAVE simple_loop;
        END IF;
   END LOOP simple_loop;

END $$
DELIMITER $$ 

CREATE PROCEDURE enrol_g4()
   BEGIN
	  DECLARE sid INT Default 55060 ;
      simple_loop: LOOP         
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 20, "2010-02-12", "2010-10-30", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 21, "2012-02-10", "2012-11-14", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 22, "2013-02-01", "2013-11-10", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 23, "2014-02-15", "2014-11-08", '0.00');
        SET sid=sid+1;
        IF sid=55079 THEN
        	LEAVE simple_loop;
        END IF;
   END LOOP simple_loop;

END $$
DELIMITER $$ 

CREATE PROCEDURE enrol_g5()
   BEGIN
	  DECLARE sid INT Default 55080 ;
      simple_loop: LOOP         
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 20, "2009-02-03", "2009-11-04", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 21, "2010-02-12", "2010-10-30", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 22, "2012-02-10", "2012-11-14", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 23, "2013-02-01", "2013-11-10", '0.00');
        INSERT INTO enrolments (`sid`, `cid`, `start`, `end`, `owe`) VALUES (sid, 24, "2014-02-15", "2014-11-08", '0.00');
        SET sid=sid+1;
        IF sid=55099 THEN
        	LEAVE simple_loop;
        END IF;
   END LOOP simple_loop;

END $$

CALL `lunchbox`.`enrol_g1`();
CALL `lunchbox`.`enrol_g2`();
CALL `lunchbox`.`enrol_g3`();
CALL `lunchbox`.`enrol_g4`();
CALL `lunchbox`.`enrol_g5`();

DELIMITER $$ 

CREATE PROCEDURE students_docsaudits()
   BEGIN
	  DECLARE sid INT Default 55000 ;
      simple_loop: LOOP         
      	INSERT INTO `lunchbox`.`saudits`(`sid`,`type`,`description`,`date`,`by`) VALUES (sid, 'CREATE', 'Student profile created', '2014-05-10', 'Kris Nicolls');
        INSERT INTO `lunchbox`.`documents`(`sid`,`name`,`uploaded`,`uploader`,`notes`) VALUES (sid, 'enrolment_form.pdf', '2010-09-12', 'Kris Nicholls', 'Enrolment Form');

        SET sid=sid+1;
        IF sid=55099 THEN
        	LEAVE simple_loop;
        END IF;
   END LOOP simple_loop;

END $$

CALL `lunchbox`.`students_docsaudits`();