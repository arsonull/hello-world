using ButtonGrid.Models;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
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

            return PartialView(buttons.ElementAt(buttNum));
        }
    }
}
