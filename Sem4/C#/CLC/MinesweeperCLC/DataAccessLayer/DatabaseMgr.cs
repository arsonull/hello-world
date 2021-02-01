using System;
using System.Collections.Generic;
using System.Text;
using System.Data.SqlClient;

namespace DataAccessLayer
{
    public class DatabaseMgr
    {
        public string dbUserConn { get; set; }

        public DatabaseMgr()
        {
            //insert Database here
        }

        public IEnumerable<UserInfo> GetAllUsers()
        {
            List<UserInfo> userList = new List<UserInfo>();

            using (SqlConnection conn = new SqlConnection(dbUserConn))
            {
                string sqlCom = @"SELECT * FROM Users";
                using (SqlCommand cmd = new SqlCommand(sqlCom, conn))
                {
                    conn.Open();

                    //This provides a way of reading a forward onlu stream
                    SqlDataReader dataReader = cmd.ExecuteReader();
                    while (dataReader.Read())
                    {
                        UserInfo user = new UserInfo();
                        try
                        {
                            user.UserID = Convert.ToInt32(dataReader["UserID"].ToString());
                        }
                        catch
                        {
                            user.UserID = 0;
                        }
                        user.Username = dataReader["Name"].ToString();
                        userList.Add(user);
                    }
                }
                conn.Close();
                return userList;
            }
        }

        public bool AddUser(UserInfo user)
        {
            bool success = true;
            using (SqlConnection conn = new SqlConnection(dbUserConn))
            {
                string insertCmd = @"INSERT INTO Employee (Username, Password) VALUES (@Name, @Gender,)";
                using (SqlCommand cmd = new SqlCommand(insertCmd, conn))
                {
                    conn.Open();

                    cmd.Parameters.AddWithValue("@Username", user.Username);
                    cmd.Parameters.AddWithValue("@Password", user.Password);
                    try
                    {
                        conn.Open();
                        cmd.ExecuteNonQuery();
                    }
                    catch
                    {
                        success = false;
                    }
                }
            }
            return success;
        }

        public UserInfo loginUser(UserInfo user)
        {

            using (SqlConnection conn = new SqlConnection(dbUserConn))
            {
                string sqlCom = @"SELECT * FROM Users WHERE Username = @Username AND Password = @Password";
                using (SqlCommand cmd = new SqlCommand(sqlCom, conn))
                {
                    conn.Open();
                    cmd.Parameters.AddWithValue("@Username", user.Username);
                    cmd.Parameters.AddWithValue("@Password", user.Password);
                    //This provides a way of reading a forward onlu stream
                    SqlDataReader dataReader = cmd.ExecuteReader();
                    while (dataReader.Read())
                    {
                        if (Convert.ToInt32(dataReader["UserID"]) > 0) return user;
                    }
                }
                conn.Close();
                return null;
            }
        }
    }
}
