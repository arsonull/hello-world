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

        public IActionResult SearchResults(string key)
        {
            List<ProductModel> prodList = DAO.SearchProducts(key);
            return View("Index", prodList);
        }

        public IActionResult SearchForm()
        {
            return View();
        }

        public IActionResult ShowOneProduct(int id)
        {
            return View(DAO.GetProductByID(id));
        }

        public IActionResult ShowEditForm(int id)
        {
            return View(DAO.GetProductByID(id));
        }

        public IActionResult ProcessEdit(ProductModel prod)
        {
            DAO.Update(prod);
            return View("Index", DAO.AllProducts());
        }

        public IActionResult DeleteProduct(int id)
        {
            DAO.Delete(id);
            return Index();
        }

        public IActionResult ProcessEditReturnOneItem(ProductModel prod)
        {
            DAO.Update(prod);
            return PartialView("_productCard", DAO.GetProductByID(prod.Id));
        }
    }
}
