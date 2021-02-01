CREATE PROCEDURE [dbo].[usp_DeleteEmployee]
	@EmployeeID int
AS
BEGIN
	DELETE FROM Employee WHERE EmployeeID = @EmployeeID
End
