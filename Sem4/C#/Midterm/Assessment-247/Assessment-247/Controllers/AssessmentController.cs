using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Assessment_247.Models;
using Assessment_247.BusinessLayer;

namespace Assessment_247.Controllers
{
    public class AssessmentController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Menu()
        {
            return View();
        }

        [HttpPost]
        public IActionResult Form([Bind] FormModel form)
        {
            BusinessService service = new BusinessService();
            FormModel newForm = service.reverse(form);
            return View("Menu", newForm);
        }
    }
}
