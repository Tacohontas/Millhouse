DROP TABLE IF EXISTS `Comments`;
DROP TABLE IF EXISTS `Posts`;
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Categories`;



CREATE Table categories(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(20) NOT NULL,
    PRIMARY KEY(Id)   
    );
    
CREATE Table users(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Username` VARCHAR(20) NOT NULL,
    `Password` VARCHAR(40) NOT NULL,
    `Email` VARCHAR(50) NOT NULL, 
    `REG_DATE` DATETIME NOT NULL DEFAULT current_timestamp(),
    `IsAdmin` BOOLEAN NOT NULL,
    PRIMARY KEY(Id)
    ) engine = innoDB;
    
CREATE Table posts(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Title` VARCHAR(20) NOT NULL, 
    `Content` VARCHAR(2000) NOT NULL,
    `IMG` VARCHAR(100),
    `CategoriesId` INT NOT NULL,
    `Date_posted` DATETIME NOT NULL DEFAULT current_timestamp(),
    `UsersId` INT NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(CategoriesId) REFERENCES Categories(Id),
    FOREIGN KEY(UsersId) REFERENCES Users(Id)
    ) engine = innoDB;
    
CREATE Table comments(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Content` VARCHAR(200) NOT NULL,
    `Date_posted` DATETIME NOT NULL DEFAULT current_timestamp(),
    `PostsId` INT NOT NULL,
    `UsersId` INT NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(PostsId) REFERENCES Posts(Id),
    FOREIGN KEY(UsersId) REFERENCES Users(Id)
    ) engine = INNODB;
    
  