-- 🧠 DCL (Data Control Language)
-- Used to control access and permissions in the database.

-- Create a new user with a password
CREATE USER 'readonly_user'@'localhost' IDENTIFIED BY 'password123';

-- Grant permission to view data from all tables in SRM_University
GRANT SELECT ON SRM_University.* TO 'readonly_user'@'localhost';

-- Revoke permission (if needed)
REVOKE SELECT ON SRM_University.* FROM 'readonly_user'@'localhost';


-- 💾 TCL (Transaction Control Language)
-- Used to control changes in transactions (safe commits & rollbacks).

START TRANSACTION;

-- Example update (you can test on any student)
UPDATE Student 
SET Address = 'Test City'
WHERE Student_ID = 'RA221000100001';

-- Undo the above change
ROLLBACK;

-- Update again and save permanently
UPDATE Student 
SET Address = 'Chennai'
WHERE Student_ID = 'RA221000100001';

-- Save changes to database
COMMIT;
