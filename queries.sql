-- the names of all the actors in the movie 'Die Another Day'
-- first and last name separated by one space
-- the result contains the names of ten actors/actresses
SELECT concat(first, ' ',last)
FROM Actor A, MovieActor M
WHERE A.id = M.aid AND M.mid =
    (SELECT id
     FROM Movie
     WHERE title = 'Die Another Day');
 

-- the count of all the actors who acted in multiple movies
-- used the MovieActor table and grouped by Actor id
-- the result is that 4824 actors have acted in more than one movie
SELECT COUNT(*)
FROM (
	SELECT aid
	FROM MovieActor
	GROUP BY aid
	HAVING COUNT(*) > 1
) x;


-- the name of the actor who has been in the most movies
-- the result is Phil Hawn, surprisingly, a relatively unknown actor but he has been in a lot of small roles according to IMDb 
SELECT concat(first,' ',last)
FROM Actor
WHERE id = 
    (SELECT aid 
     FROM MovieActor
     GROUP BY aid
     ORDER BY count(*)
     DESC
     LIMIT 1);