using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using BusinessLayer;
using DataAccessLayer;

namespace EmployeeCrud.Models
{
    public class EmployeeData
    {
        CommWithDataAccess employeeDAL = new CommWithDataAccess();

        public IEnumerable<EmployeeInfo> GetAllEmployees()
        {
            IEnumerable<EmployeeInfo> allEmp = employeeDAL.GetAllEmployees();
            return allEmp;
        }

        public void AddEmployee(EmployeeInfo emp)
        {
            employeeDAL.AddEmployee(emp);
        }
    }
}
