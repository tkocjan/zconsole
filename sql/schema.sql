-- create and select the database
DROP DATABASE IF EXISTS console;
CREATE DATABASE console;
USE console;

-- create the tables for the database
CREATE TABLE ServerRec (
  id                INT UNSIGNED           NOT NULL   AUTO_INCREMENT,
  customerId        INT UNSIGNED     NOT NULL,
  serverName              VARCHAR(255)   NOT NULL,
  imported          BOOLEAN         NOT NULL,
  notes             VARCHAR(255)    DEFAULT NULL,
  status            VARCHAR(255)    NOT NULL,
  osTypeId        INT UNSIGNED    NOT NULL,
  serverTypeId    INT UNSIGNED    NOT NULL,
  diskSize         INT UNSIGNED    NOT NULL,
  locationTypeId       INT UNSIGNED    NOT NULL,
  cloudAccountId      INT UNSIGNED    NOT NULL,  
  appTypeId            INT UNSIGNED     DEFAULT NULL,
  lastBackup     DATETIME   DEFAULT NULL,
  publicIP         VARCHAR(255)   NOT NULL,
  publicDNS        VARCHAR(255)   NOT NULL,
  appLogin         VARCHAR(255)   NOT NULL,
  appPassword      VARCHAR(255)   NOT NULL,
  dateCreated      DATETIME   NOT NULL,
  lastStart        DATETIME   DEFAULT NULL,
  lastStop         DATETIME   DEFAULT NULL,
  hosterServerCode VARCHAR(255)   NOT NULL,
  privateIP        VARCHAR(255)   NOT NULL,
  terminationProtect   BOOLEAN   NOT NULL,
  active   BOOLEAN   NOT NULL DEFAULT TRUE,

  PRIMARY KEY (id)
);

CREATE TABLE cloudAccountRec (
  id                INT UNSIGNED           NOT NULL   AUTO_INCREMENT,
  customerId       INT UNSIGNED           NOT NULL,
  cloudAccountName              VARCHAR(255)    NOT NULL,
  cloudStatus            VARCHAR(255)               DEFAULT NULL,
  hosterTypeId         INT UNSIGNED    NOT NULL,
  hosterAcountCode     VARCHAR(255) NOT NULL,
  defaultLocationTypeId     INT UNSIGNED NOT NULL,
  cloudDateCreated      DATE    NOT NULL,
  isDefaultAccount      BOOLEAN   NOT NULL,
  accessKeyId     VARCHAR(255) NOT NULL,
  secretAccessKey     VARCHAR(255) NOT NULL,  
  PRIMARY KEY (id)
);

CREATE TABLE HosterType (
  id               INT UNSIGNED            NOT NULL   AUTO_INCREMENT,
  hosterName             VARCHAR(255)    NOT NULL,
  defaultLocationTypeId           INT UNSIGNED NOT NULL,
  defaultServerTypeId             INT UNSIGNED NOT NULL,
  iconFilename    VARCHAR(255)    NOT NULL,
  logoFilename    VARCHAR(255)    NOT NULL,
  diskCost      DECIMAL(12,2)   NOT NULL,         
  PRIMARY KEY (id)
);

CREATE TABLE ServerType (
  id               INT UNSIGNED            NOT NULL   AUTO_INCREMENT,
  hosterTypeId        INT UNSIGNED            NOT NULL,
  codeName             VARCHAR(255)    NOT NULL,
  serverCost          DECIMAL(12,2)   NOT NULL,
  shortName             VARCHAR(255)    NOT NULL,
  longName             VARCHAR(255)    NOT NULL,
  imageFilename    VARCHAR(255)    NOT NULL,
  cores         INT UNSIGNED            NOT NULL,
  megabytes          INT UNSIGNED            NOT NULL,
  explanation   VARCHAR(1024)    NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE LocationType (
  id               INT UNSIGNED            NOT NULL   AUTO_INCREMENT,
  hosterTypeId        INT UNSIGNED            NOT NULL,
  shortName         VARCHAR(255)    NOT NULL,
  longName         VARCHAR(255)    NOT NULL,
  iconFilename    VARCHAR(255)    NOT NULL,
  logoFilename    VARCHAR(255)    NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE OSType (
  id                INT UNSIGNED            NOT NULL   AUTO_INCREMENT,
  osTypeNum        INT UNSIGNED            NOT NULL,
  numBits        INT UNSIGNED            NOT NULL,
  shortName        VARCHAR(255)    NOT NULL,
  mediumName        VARCHAR(255)    NOT NULL,
  longName         VARCHAR(255)    NOT NULL,
  version         VARCHAR(255)    NOT NULL,
  iconFilename     VARCHAR(255)    NOT NULL,
  logoFilename     VARCHAR(255)    NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE AppType (
  id                INT UNSIGNED            NOT NULL   AUTO_INCREMENT,
  shortName        VARCHAR(255)    NOT NULL,
  longName         VARCHAR(255)    NOT NULL,
  adminPath         VARCHAR(255)    NOT NULL,
  logoFilename     VARCHAR(255)    NOT NULL,
  explanation     VARCHAR(1024)    NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE BackupRec (
  id                INT UNSIGNED            NOT NULL   AUTO_INCREMENT,
  serverId        INT UNSIGNED    NOT NULL,
  backupTime       DATETIME        NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE  UserRec (
  `id` int unsigned NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `salt` char(32) NOT NULL,
  `role` varchar(255) NOT NULL default 'customer',
  PRIMARY KEY  (`id`),
  KEY `email_pass_key` (`email`,`password`),
  KEY `email_key` (`email`)
);

CREATE TABLE CustomerRec (
  id        INT UNSIGNED            NOT NULL   AUTO_INCREMENT,
  # email      VARCHAR(255)   NOT NULL,
  # password          VARCHAR(255)    NOT NULL,
  firstName         VARCHAR(255)    NOT NULL,
  lastName          VARCHAR(255)    NOT NULL,
  addressId  INT UNSIGNED                       DEFAULT NULL,  
  PRIMARY KEY (id)
  # UNIQUE INDEX email_addr (email)
);

CREATE TABLE AddressRec (
  id         INT UNSIGNED           NOT NULL   AUTO_INCREMENT,
  line1             VARCHAR(255)    NOT NULL,
  line2             VARCHAR(255)               DEFAULT NULL,
  city              VARCHAR(255)    NOT NULL,
  state             VARCHAR(2)     NOT NULL,
  zip           VARCHAR(10)    NOT NULL,
  PRIMARY KEY (id)
);
