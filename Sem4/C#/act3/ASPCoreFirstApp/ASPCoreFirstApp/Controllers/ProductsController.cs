using ASPCoreFirstApp.Models;
using ASPCoreFirstApp.Services;
using Bogus;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Web;

namespace ASPCoreFirstApp.Controllers
{
    public class ProductsController : Controller
    {
        ProductsDAO DAO = new ProductsDAO();
        public ProductsController()
        {
            DAO = new ProductsDAO();
        }
        public IActionResult Index()
        {
            //HardCodedSampleDataRepo repo = new HardCodedSampleDataRepo();
            return View(DAO.AllProducts());
        }
        
        public IActionResult Message()
        {
            return View();
        }

        public IActionResult Welcome()
        {
            ViewBag.name = "Carson";
            ViewBag.num = 13;
            return View();
        }
    }
}
