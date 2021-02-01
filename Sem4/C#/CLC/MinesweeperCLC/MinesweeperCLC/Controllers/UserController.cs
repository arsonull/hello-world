using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using DataAccessLayer;
using MinesweeperCLC.Models;

namespace EmployeeCrud.Controllers
{
    public class EmployeeController : Controller
    {
        UserData usrDal = new UserData();
        public IActionResult Index()
        {
            List<UserInfo> usrList = new List<UserInfo>();

            usrList = usrDal.GetAllUsers().ToList();
            return View(usrList);
        }

        [HttpGet]
        public IActionResult Register()
        {
            return View();
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public IActionResult Register([Bind] UserInfo usr)
        {
            if (ModelState.IsValid)
            {
                usrDal.AddUser(usr);
                return RedirectToAction("Index");
            }
            return View(usr);
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public IActionResult Login([Bind] UserInfo usr)
        {
            if (ModelState.IsValid)
            {
                usrDal.Login(usr);
                return RedirectToAction("Index");
            }
            else
            {
                Console.WriteLine("User not defined");
                return View(usr);
            }
        }
    }
}
