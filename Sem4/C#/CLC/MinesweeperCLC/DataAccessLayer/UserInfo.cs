using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace DataAccessLayer
{
    public class UserInfo
    {
        public int UserID { get; set; }

        [Display(Name = "Username")]
        [Required(ErrorMessage = "Please enter a Username")]
        public string Username { get; set; }

        [Display(Name = "Password")]
        [Required(ErrorMessage = "Please enter a Username")]
        public string Password { get; set; }
    }
}
