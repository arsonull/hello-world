using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Threading.Tasks;
using Testing.Models;

namespace Testing.Services.Data
{
    public class TestDAO
    {
        private string connString = @"Data Source=(localdb)\MSSQLLocalDB;Initial Catalog=Test;Integrated Security=True;Connect Timeout=30;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False";
        public TestModel Register(TestModel model)
        {
            string stmt = "INSERT INTO dbo.users (Username, Password, ) VALUES (@Name, @Pass)";
            using (SqlConnection conn = new SqlConnection(connString))
            {
                SqlCommand command = new SqlCommand(stmt, conn);
                try
                {
                    conn.Open();
                    command.Parameters.AddWithValue("@Name", model.Username);
                    command.Parameters.AddWithValue("@Pass", model.Password);
                    if (command.ExecuteNonQuery() > 0)
                        return model;
                    else
                        return null;
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    return null;
                }
            }
        }
        public TestModel Login(TestModel model)
        {
            string stmt = "SELECT * FROM dbo.users WHERE Username = @Name AND Password = @Pass";
            using (SqlConnection conn = new SqlConnection(connString))
            {
                SqlCommand command = new SqlCommand(stmt, conn);
                try
                {
                    conn.Open();
                    command.Parameters.AddWithValue("@Name", model.Username);
                    command.Parameters.AddWithValue("@Pass", model.Password);
                    SqlDataReader reader = command.ExecuteReader();
                    if (reader.FieldCount > 0)
                        return model;
                    else
                        return null;
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    return null;
                }
            }
        }
    }
}
