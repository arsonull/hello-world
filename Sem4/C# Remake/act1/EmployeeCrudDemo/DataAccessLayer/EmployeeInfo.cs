using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace DataAccessLayer
{
    public class EmployeeInfo
    {
        public int EmployeeID { get; set; }

        [Display(Name = "First & Last Name")]
        [Required(ErrorMessage = "Please enter your first and last name")]
        public string Name { get; set; }

        [DataType(DataType.Text)]
        [Display(Name = "What is your gender?")]
        [Required(ErrorMessage = "Please enter your gender")]
        public string Gender { get; set; }

        [Display(Name = "Company Name")]
        [Required(ErrorMessage = "Please enter your company")]
        public string Company { get; set; }

        [Display(Name = "Department Name")]
        [Required(ErrorMessage = "Please enter your department")]
        public string Department { get; set; }
    }
}
