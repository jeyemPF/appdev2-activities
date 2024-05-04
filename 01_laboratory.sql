-- CREATING A DATABASE NAME
CREATE DATABASE Company;

-- Selecting a Database
USE Company;

-- Creating a Table
CREATE TABLE Employees (
    EmployeeID INT PRIMARY KEY,
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    Age INT,
    Department VARCHAR(50)
);

-- Inserting Data into a Table
 INSERT INTO Employees (EmployeeId, FirstName, LastName, Age, Department)
    -> VALUES
    -> ("1", "Kurtd Daniel", "Bigtas", "21", "Software Engineering"),
    -> ("2", "Jayvee Brian", "Ibale", "20", "Senior Developer"),
    -> ("3", "John Carlo", "Diga", "20", "Designing"),
    -> ("4", "Erish", "Berboso", "22", "Developer"),
    -> ("5", "Jireh", "Belen", "23", "Project Management");

-- Viewing Data
SELECT * FROM Employees;

-- Updating Data
UPDATE Employees SET Department = "Marketing" WHERE EmployeeID = 2;

-- Deleting Data
DELETE FROM Employees WHERE EmployeeID = 3;

-- Dropping the Table
DROP TABLE Employees;