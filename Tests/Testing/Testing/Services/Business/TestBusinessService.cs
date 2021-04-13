using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Testing.Models;
using Testing.Services.Data;

namespace Testing.Services.Business
{
    public class TestBusinessService
    {
        private TestDAO DAO = new TestDAO();
        public TestModel Register(TestModel model)
        {
            return DAO.Register(model);
        }

        public TestModel Login(TestModel model)
        {
            return DAO.Login(model);
        }
    }
}
