CREATE TABLE users (
    userID INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    laste_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','author'),
  
      `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB ;


CREATE TABLE categories (
    categoryID INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL ,
      `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB ;


CREATE TABLE tags (
    tagID INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL ,
      `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB ;





CREATE TABLE wikis (
    wikiID INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    userID INT,
    categoryID INT,
    urlImage VARCHAR(255),
    deletedAt DATETIME NULL,
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (categoryID) REFERENCES categories(categoryID),
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB ;


CREATE TABLE wiki_tags (
    wikiTagsID INT PRIMARY KEY AUTO_INCREMENT,
    wikiID INT,
    tagID INT,
    FOREIGN KEY (wikiID) REFERENCES wikis(wikiID),
    FOREIGN KEY (tagID) REFERENCES tags(tagID)
) ENGINE=InnoDB ;



