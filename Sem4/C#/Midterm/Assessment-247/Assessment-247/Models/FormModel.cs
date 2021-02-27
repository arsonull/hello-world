using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;

namespace Assessment_247.Models
{
    public class FormModel
    {
        //Getters and setters for the 4 form inputs

        [Display(Name = "Name")]
        [Required(ErrorMessage = "Please enter a name for the dish")]
        public string Name { get; set; }

        [Display(Name = "Calories")]
        [Required(ErrorMessage = "Please enter how many calories are in this dish")]
        public string Calories { get; set; }

        [Display(Name = "Ingredient 1")]
        [Required(ErrorMessage = "Please enter the first ingredient")]
        public string Ing1 { get; set; }

        [Display(Name = "Ingredient 2")]
        [Required(ErrorMessage = "Please enter the second ingredient")]
        public string Ing2 { get; set; }
    }
}
