INSERT INTO Movie VALUES(2,'Up',2014,NULL,'Pixar');
-- violates the primary key constraint for Movie table, id attribute
-- there is already a movie with id = 2
-- MySQL returns ERROR 1062 (23000): Duplicate entry '2' for key 'PRIMARY'

INSERT INTO Actor VALUES(10,'Chan','Jackie','Male','1960-01-01',NULL);
-- violates the primary key constraint for Actor table, id attribute
-- there is already an Actor with id = 10
-- MySQL returns ERROR 1062 (23000): Duplicate entry '10' for key 'PRIMARY'

INSERT INTO Director VALUES(16,'Abrams','JJ','1970-01-01',NULL);
-- violates the primary key constraint for Director table, id attribute
-- there is already a Director with id = 16
-- MySQL returns ERROR 1062 (23000): Duplicate entry '16' for key 'PRIMARY'

DELETE FROM Movie WHERE id = 2;
-- because there is a foreign key constraint for the MovieGenre table, which references a movie id in the Movie table, deletion cannot occur.
-- MySQL returns ERROR 1451 (23000): Cannot delete or update a parent row: a foreign key constraint fails (`CS143`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

INSERT INTO MovieDirector VALUES(99999,99999);
-- violates the foreign key constraint where MovieDirector mid depends on the Movie table id
-- the movie id trying to be inserted does not exist
-- MySQL returns ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

DELETE FROM Director WHERE id = 112;
-- violates the foreign key constraint where a tuple in the MovieDirector table references a director id from the Director table
-- MySQL returns ERROR 1451 (23000): Cannot delete or update a parent row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_2` FOREIGN KEY (`did`) REFERENCES `Director` (`id`))

INSERT INTO MovieActor VALUES(99999,99999,'Main');
-- violates the foreign key constraint where MovieActor mid depends on the Movie table id
-- the movie id trying to be inserted does not exist
-- MySQL returns ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

DELETE FROM Actor WHERE id = 72;
-- violates the foreign key constraint where a tuple in the MovieActor table references a actor id from the Actor table
-- MySQL returns ERROR 1451 (23000): Cannot delete or update a parent row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`))

INSERT INTO Review VALUES('William',NULL,999999,4,'Great Movie');
-- violates the foreign key constraint where a tuple in the Review table references a movie id from the Movie table
-- the tuple to be inserted references mid=999999, which does not exist
-- MySQL returns ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`Review`, CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

UPDATE Movie SET year = 201 WHERE id = 9;
-- violates the check constraint that movie release year should be between 1800-2500

INSERT INTO Actor VALUES(-1, 'Scott','Michael','Male','1970-12-12',NULL);
-- violates the check constraint that actor id should not be negative

INSERT INTO Review VALUES('William',NULL,9,10,'Amazing');
-- violates the check constraint that movie review ratings should be between 0 and 5 



