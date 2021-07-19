CREATE DATABASE IF NOT EXISTS eyeconic;
USE eyeconic;

CREATE TABLE Users
(
    Id          int PRIMARY KEY AUTO_INCREMENT,
    Name        varchar(256)  NOT NULL,
    Email       varchar(256)  NOT NULL UNIQUE,
    Password    varchar(1024) NOT NULL,
    Address     text          NULL,
    Birthday    date      NULL,
    PhoneNumber varchar(256)  NULL,
    Type        bit DEFAULT 0
);

CREATE TABLE Brands
(
    Id   int PRIMARY KEY AUTO_INCREMENT,
    Name varchar(256) NOT NULL
);

CREATE TABLE Categories
(
    Id       int PRIMARY KEY AUTO_INCREMENT,
    Name     varchar(256) NOT NULL,
    ParentId int          NULL,
    FOREIGN KEY (ParentId) REFERENCES Categories (Id)
);

CREATE TABLE Products
(
    Id         int PRIMARY KEY AUTO_INCREMENT,
    CategoryId int           NOT NULL,
    BrandId    int           NOT NULL,
    Name       varchar(1024) NOT NULL UNIQUE,
    Price      decimal       NOT NULL,
    FOREIGN KEY (CategoryId) REFERENCES Categories (Id),
    FOREIGN KEY (BrandId) REFERENCES Brands (Id)
);

CREATE TABLE ContactLens
(
    ProductId         int PRIMARY KEY,
    Package           varchar(256) NULL,
    WaterOfPercentage int          NULL,
    LensPerBox        int          NULL,
    DIA               int          NULL,
    FOREIGN KEY (ProductId) REFERENCES Products (Id)
);

CREATE TABLE Glasses
(
    ProductId             int PRIMARY KEY,
    Gender                tinyint,
    Shape                 varchar(256) NULL,
    Material              varchar(256) NULL,
    LensWidth             int          NULL,
    LensWidthWithoutFrame int          NULL,
    LensHeight            int          NULL,
    ArmLength             int          NULL,
    BridgeWidth           int          NULL,
    FOREIGN KEY (ProductId) REFERENCES Products (Id)
);

CREATE TABLE StorageBoxes
(
    ProductId int PRIMARY KEY,
    Material  varchar(256) NULL,
    Width     int          NULL,
    Height    int          NULL,
    FOREIGN KEY (ProductId) REFERENCES Products (Id)
);

CREATE TABLE Clothes
(
    ProductId int PRIMARY KEY,
    Material  varchar(256) NULL,
    Color     varchar(7) DEFAULT '#FFFFFF',
    FOREIGN KEY (ProductId) REFERENCES Products (Id)
);

CREATE TABLE Sprays
(
    ProductId int PRIMARY KEY,
    Type      varchar(256) NULL,
    FOREIGN KEY (ProductId) REFERENCES Products (Id)
);

CREATE TABLE Orders
(
    Id          int PRIMARY KEY AUTO_INCREMENT,
    UserId      int           NULL,
    UserName    varchar(1024) NOT NULL,
    PhoneNumber varchar(256)  NOT NULL,
    Address     text          NOT NULL,
    Notes       text          NULL,
    CreatedDate datetime DEFAULT NOW(),
    UpdatedDate datetime DEFAULT NOW(),
    Price       decimal       NOT NULL,
    Status      int      DEFAULT 0,
    FOREIGN KEY (UserId) REFERENCES Users (Id)
);

CREATE TABLE OrderDetails
(
    Id        int PRIMARY KEY AUTO_INCREMENT,
    OrderId   int NOT NULL,
    ProductId int NOT NULL,
    Quantity  int NOT NULL,
    FOREIGN KEY (OrderId) REFERENCES Orders (Id),
    FOREIGN KEY (ProductId) REFERENCES Products (Id)
);

CREATE TABLE Preferences
(
    `Key` varchar(256)  NOT NULL PRIMARY KEY,
    Value varchar(1024) NULL
);

CREATE TABLE MessagesBox
(
    SentDate   DATETIME PRIMARY KEY DEFAULT NOW(),
    FromUserId int,
    ToUserId   int,
    Content    text,
    FOREIGN KEY (FromUserId) REFERENCES Users (Id),
    FOREIGN KEY (ToUserId) REFERENCES Users (Id)
);
CREATE TABLE Comments
(
    Id          int PRIMARY KEY AUTO_INCREMENT,
    ProductId   int           NOT NULL,
    UserName    varchar(256)  NOT NULL,
    Content     text          NOT NULL,
    FOREIGN KEY (ProductId) REFERENCES Products(Id)


);

# DROP TABLE Clothes;
# DROP TABLE ContactLens;
# DROP TABLE Glasses;
# DROP TABLE OrderDetails;
# DROP TABLE Orders;
# DROP TABLE Sprays;
# DROP TABLE StorageBoxes;
# DROP TABLE Products;
# DROP TABLE Brands;
# DROP TABLE Categories;
# DROP TABLE Users;
# DROP TABLE Comments;