using ButtonGrid.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.AspNetCore.Mvc.ViewEngines;
using Microsoft.AspNetCore.Mvc.ViewFeatures;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;

namespace ButtonGrid.Controllers
{
    public class ButtonController : Controller
    {
        static List<ButtonModel> buttons = new List<ButtonModel>();
        Random rand = new Random();
        const int GRID_SIZE = 25;
        public IActionResult Index()
        {
            buttons = new List<ButtonModel>();

            for (int i = 0; i < GRID_SIZE; i++)
            {
                buttons.Add(new ButtonModel(i, rand.Next(3)));
            }
            return View(buttons);
        }

        public IActionResult HandleButtonClick(string buttonNumber)
        {
            int id = int.Parse(buttonNumber);

            buttons.ElementAt(id).ButtonState = (buttons.ElementAt(id).ButtonState + 1) % 3;

            return View("Index", buttons);
        }

        public IActionResult ShowOneButton(int buttNum)
        {
            buttons.ElementAt(buttNum).ButtonState = (buttons.ElementAt(buttNum).ButtonState + 1) % 3;

            var buttString = RenderRazorViewToString(this, "ShowOneButton", buttons.ElementAt(buttNum));

            bool win = true;
            for (int i = 0; i < buttons.Count; i++)
            {
                if (buttons.ElementAt(0).ButtonState != buttons.ElementAt(i).ButtonState)
                    win = false;
            }

            var msgString = "";
            if (win)
                msgString = "<p>Congrats! You Win!!</p>";
            else
                msgString = "<p>Try getting all the colors to be the same!</p>";

            return Json(new { part1 = buttString, part2 = msgString });

            //return PartialView(buttons.ElementAt(buttNum));
        }

        public IActionResult RightClickShowOneButton(int buttNum)
        {
            buttons.ElementAt(buttNum).ButtonState = 0;
            return PartialView("ShowOneButton", buttons.ElementAt(buttNum));
        }

        public static string RenderRazorViewToString(Controller controller, string viewName, object model = null)
        {
            controller.ViewData.Model = model;
            using (var sw = new StringWriter())
            {
                IViewEngine viewEngine = controller.HttpContext.RequestServices.GetService(typeof(ICompositeViewEngine)) as ICompositeViewEngine;
                ViewEngineResult viewResult = viewEngine.FindView(controller.ControllerContext, viewName, false);

                ViewContext viewContext = new ViewContext(
                    controller.ControllerContext,
                    viewResult.View,
                    controller.ViewData,
                    controller.TempData,
                    sw,
                    new HtmlHelperOptions()
                );

                viewResult.View.RenderAsync(viewContext);
                return sw.GetStringBuilder().ToString();
            }
        }

    }
}
