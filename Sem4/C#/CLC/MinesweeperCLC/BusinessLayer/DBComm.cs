using System;
using System.Collections.Generic;
using System.Text;
using DataAccessLayer;

namespace BusinessLayer
{
    public class DBComm
    {
        public IEnumerable<UserInfo> GetAllUsers()
        {
            DatabaseMgr dbgetAll = new DatabaseMgr();
            IEnumerable<UserInfo> allUsers = dbgetAll.GetAllUsers();
            return allUsers;
        }

        public void AddUser(UserInfo user)
        {
            DatabaseMgr dbmgr = new DatabaseMgr();
            if (dbmgr.AddUser(user))
            {
                Console.WriteLine("Success");
            }
            else
            {
                Console.WriteLine("Failure");
            }
        }

        public void LoginUser(UserInfo user)
        {
            DatabaseMgr dbmgr = new DatabaseMgr();
            user = dbmgr.loginUser(user);
            if (user != null)
            {
                Console.WriteLine("Logged in");
            }
            else
            {
                Console.WriteLine("Account credentials are wrong");
            }
        }
    }
}
