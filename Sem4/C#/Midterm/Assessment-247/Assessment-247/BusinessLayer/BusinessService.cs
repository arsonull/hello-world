using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Assessment_247.Models;

namespace Assessment_247.BusinessLayer
{
    public class BusinessService
    {
        public FormModel reverse(FormModel form)
        {
            //creates a temporary form to manipulate the variables
            FormModel temp = form;
            //creates a character array from the ingredient 1's string, then uses a built in Reverse function to reverse the character array
            char[] reversed = form.Ing1.ToCharArray();
            Array.Reverse(reversed);
            //The temporary form model's ingredient 1 variable is then set to a new string created from the reversed character array
            temp.Ing1 = new string(reversed);
            //Same thing as above but for ingredient 2
            reversed = form.Ing2.ToCharArray();
            Array.Reverse(reversed);
            temp.Ing2 = new string(reversed);
            //return temporary form model
            return temp; ;
        }
    }
}
