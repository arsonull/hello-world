using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace AJAXExample.Models
{
    public class CustomerModel
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public int Age { get; set; }

        public CustomerModel()
        { }
        public CustomerModel(int i, string n, int a)
        {
            Id = i;
            Name = n;
            Age = a;
        }
    }
}
