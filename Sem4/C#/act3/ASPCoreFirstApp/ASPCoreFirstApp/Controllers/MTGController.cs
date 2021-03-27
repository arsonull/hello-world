using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using ASPCoreFirstApp.Models;

namespace ASPCoreFirstApp.Controllers
{
    public class MTGController : Controller
    {
        public IActionResult Index()
        {
            List<MTGExpansionModel> ExpansionList = new List<MTGExpansionModel>();
            ExpansionList.Add(new MTGExpansionModel("Kaldheim", 2, new DateTime(2021, 01, 19)));
            ExpansionList.Add(new MTGExpansionModel("Time Spiral", 4, new DateTime(2021, 04, 21)));
            ExpansionList.Add(new MTGExpansionModel("Core Set 21", 3, new DateTime(2020, 06, 26)));
            ExpansionList.Add(new MTGExpansionModel("Zendikar Rising", 5, new DateTime(2020, 09, 18)));
            return View(ExpansionList);
        }
    }
}
