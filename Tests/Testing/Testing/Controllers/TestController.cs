using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Testing.Models;

namespace Testing.Controllers
{
    public class TestController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }
        public IActionResult Register([Bind] TestModel model)
        {
            return View("UserDetails", model);
        }
        public IActionResult Login()
        {
            return View();
        }
    }
}
