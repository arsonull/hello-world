using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Testing.Models
{
    public class TestModel
    {
        public string Username { get; set; }
        public string Password { get; set; }

        public TestModel(string u, string p)
        {
            Username = u;
            Password = p;
        }
    }
}
