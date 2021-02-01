using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using BusinessLayer;
using DataAccessLayer;

namespace MinesweeperCLC.Models
{
    public class UserData
    {
        DBComm userDAL = new DBComm();

        public IEnumerable<UserInfo> GetAllUsers()
        {
            return userDAL.GetAllUsers();
        }
        public void AddUser(UserInfo user)
        {
            userDAL.AddUser(user);
        }
        public void Login(UserInfo usr)
        {
            userDAL.LoginUser(usr);
        }
    }
}
