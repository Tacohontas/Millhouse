DROP TABLE IF EXISTS `Comments`;
DROP TABLE IF EXISTS `Posts`;
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Categories`;



CREATE Table Categories(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(20) NOT NULL,
    PRIMARY KEY(Id)   
    );
    
CREATE Table Users(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Username` VARCHAR(20) NOT NULL,
    `Password` VARCHAR(40) NOT NULL,
    `Email` VARCHAR(50) NOT NULL, 
    `REG_DATE` DATETIME NOT NULL DEFAULT current_timestamp(),
    `IsAdmin` BOOLEAN NOT NULL DEFAULT "0",
    PRIMARY KEY(Id)
    ) engine = innoDB;
    
CREATE Table Posts(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Title` VARCHAR(40) NOT NULL, 
    `Content` VARCHAR(20000) NOT NULL,
    `IMG` VARCHAR(100),
    `CategoriesId` INT NOT NULL,
    `Date_posted` DATETIME NOT NULL DEFAULT current_timestamp(),
    `UsersId` INT NOT NULL,
    `IsPublished` INT NOT NULL DEFAULT "0",
    PRIMARY KEY(Id),
    FOREIGN KEY(CategoriesId) REFERENCES Categories(Id),
    FOREIGN KEY(UsersId) REFERENCES Users(Id)
    ) engine = innoDB;
    
CREATE Table Comments(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Content` VARCHAR(200) NOT NULL,
    `Date_posted` DATETIME NOT NULL DEFAULT current_timestamp(),
    `PostsId` INT NOT NULL,
    `UsersId` INT NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(PostsId) REFERENCES Posts(Id),
    FOREIGN KEY(UsersId) REFERENCES Users(Id)
    ) engine = INNODB;
    
  INSERT INTO Categories(Name) VALUES ("Sunglasses");
  INSERT INTO Categories(Name) VALUES ("Watches");
  INSERT INTO Categories(Name) VALUES ("Interior");

INSERT INTO Users(Username, Password, Email, IsAdmin) VALUES ("admin", "5f4dcc3b5aa765d61d8327deb882cf99", "admin@millhouse.com", 1);

INSERT INTO Users(Username, Password, Email, IsAdmin) VALUES ("user", "5f4dcc3b5aa765d61d8327deb882cf99", "user@millhouse.com", 0);

