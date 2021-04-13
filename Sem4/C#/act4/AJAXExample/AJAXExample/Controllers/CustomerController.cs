using AJAXExample.Models;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace AJAXExample.Controllers
{
    public class CustomerController : Controller
    {
        List<CustomerModel> customers = new List<CustomerModel>();

        public CustomerController()
        {
            customers.Add(new CustomerModel(0, "Carson", 22));
            customers.Add(new CustomerModel(1, "Ashley", 20));
            customers.Add(new CustomerModel(2, "Michael", 21));
            customers.Add(new CustomerModel(3, "Tyler", 24));
        }

        public IActionResult Index()
        {
            return View(customers);
        }

        public IActionResult ShowOnePerson(int Id)
        {
            return PartialView(customers.FirstOrDefault(c => c.Id == Id));
        }
    }
}
