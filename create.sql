CREATE TABLE Movie
(
    id INT NOT NULL,                                              -- id is the primary key, thus cannot be null
    title VARCHAR(100) NOT NULL,                                  -- every movie must have a title      
    `year` INT, 
    rating VARCHAR(10),
    company VARCHAR(50),
    PRIMARY KEY(id),
    CHECK((`year` > 1800 AND `year` < 2500) OR (`year`IS NULL)),  -- year movie released should be between 1800 and 2500, reasonable assumption for now
    CHECK(id >= 0)                                                -- id cannot be negative
) ENGINE=INNODB;

CREATE TABLE Actor
(
    id INT NOT NULL,                                              -- id is the primary key, thus cannot be null
    `last` VARCHAR(20),                                           -- id cannot be negative
    `first` VARCHAR(20),
    sex VARCHAR(6),
    dob DATE,
    dod DATE,
    PRIMARY KEY(id),
    CHECK(id >= 0)
) ENGINE=INNODB;

CREATE TABLE Director
(
    id INT NOT NULL,                                              -- id is the primary key, thus cannot be null
    `last` VARCHAR(20),
    `first` VARCHAR(20),                                          -- id cannot be negative
    dob DATE,
    dod DATE,
    PRIMARY KEY(id),
    CHECK(id >= 0)
) ENGINE=INNODB;

CREATE TABLE MovieGenre
(
    mid INT NOT NULL,                                                    
    genre VARCHAR(20),
    FOREIGN KEY(mid) references Movie(id)                         -- the id referred to by MovieGenre table must exist in the Movie table
) ENGINE=INNODB;

CREATE TABLE MovieDirector
(
    mid INT NOT NULL,
    did INT NOT NULL,
    FOREIGN KEY(mid) references Movie(id),                        -- the mid referred to by MovieDirector table must exist in the Movie table
    FOREIGN KEY(did) references Director(id)                      -- the did referred to by MovieDirector table must exist in the Director table
) ENGINE=INNODB;

CREATE TABLE MovieActor
(
    mid INT NOT NULL,
    aid INT NOT NULL,
    role VARCHAR(50),
    FOREIGN KEY(mid) references Movie(id),                        -- the mid referred to by MovieActor table must exist in the Movie table
    FOREIGN KEY(aid) references Actor(id)                         -- the aid referred to by MovieActor table must exist in the Actor table
) ENGINE=INNODB;

CREATE TABLE Review
(
    name VARCHAR(20),
    `time` TIMESTAMP,
    mid INT NOT NULL,
    rating INT,
    `comment` VARCHAR(500),
    FOREIGN KEY(mid) references Movie(id),                        -- the mid referred to by Review table must exist in the Movie table
    CHECK((rating >= 0 AND rating <= 5) OR (rating IS NULL))       -- the rating given must be between 0 and 5, or null
) ENGINE=INNODB;

CREATE TABLE MaxPersonID
(
    id INT
) ENGINE=INNODB;

CREATE TABLE MaxMovieID
(
    id INT
) ENGINE=INNODB;












