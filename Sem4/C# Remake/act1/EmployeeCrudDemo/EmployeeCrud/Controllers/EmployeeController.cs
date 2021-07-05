using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using DataAccessLayer;
using EmployeeCrud.Models;

namespace EmployeeCrud.Controllers
{
    public class EmployeeController : Controller
    {
        EmployeeData empDal = new EmployeeData();
        public IActionResult Index()
        {
            List<EmployeeInfo> empList = new List<EmployeeInfo>();

            empList = empDal.GetAllEmployees().ToList();
            return View(empList);
        }

        [HttpGet]
        public IActionResult Create()
        {
            return View();
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public IActionResult Create([Bind] EmployeeInfo emp)
        {
            if(ModelState.IsValid)
            {
                empDal.AddEmployee(emp);
                return RedirectToAction("Index");
            }
            return View(emp);
        }
    }
}
