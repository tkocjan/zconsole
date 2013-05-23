CREATE DATABASE contacts;

CREATE TABLE contacts.user (
id int(10) unsigned NOT NULL AUTO_INCREMENT,
username varchar(64) NOT NULL,
password varchar(40) NOT NULL,
admin tinyint(3) unsigned NOT NULL DEFAULT 0,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE contacts.contact (
id int(10) unsigned NOT NULL AUTO_INCREMENT,
ownerid int(10) unsigned NOT NULL,
firstname tinytext NOT NULL,
middlename tinytext NOT NULL,
lastname tinytext NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE contacts.contactgroup (
id int(10) unsigned NOT NULL AUTO_INCREMENT,
contactid int(10) unsigned NOT NULL,
label text NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE contacts.contactmethod (
id int(10) unsigned NOT NULL AUTO_INCREMENT,
contactgroupid int(10) unsigned NOT NULL,
type tinytext NOT NULL,
value text NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;
