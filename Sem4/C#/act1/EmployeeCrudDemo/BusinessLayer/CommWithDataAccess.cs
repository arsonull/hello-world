using System;
using System.Collections.Generic;
using System.Text;
using DataAccessLayer;

namespace BusinessLayer
{
    public class CommWithDataAccess
    {
        public IEnumerable<EmployeeInfo> GetAllEmployees()
        {
            DatabaseMgr dbReadAllEmployees = new DatabaseMgr();
            IEnumerable<EmployeeInfo> allEmp = dbReadAllEmployees.GetAllEmployees();
            return allEmp;
        }

        public void AddEmployee(EmployeeInfo emp)
        {
            DatabaseMgr dbmgr = new DatabaseMgr();
            if (dbmgr.AddEmployee(emp))
            {
                Console.WriteLine("Succesful");
            }
            else
            {
                Console.WriteLine("Failed to add employee");
            }
        }
    }
}
