using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Text;
using System.Data;

namespace DataAccessLayer
{
    public class DatabaseMgr
    {
        public string dbEmpConn { get; set; }

        public DatabaseMgr()
        {
            this.dbEmpConn = "Data Source=(localdb)\\MSSQLLocalDB;Initial Catalog=dbEmployee;Integrated Security=True;Connect Timeout=30;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False";
        }

        public IEnumerable<EmployeeInfo> GetAllEmployees()
        {
            List<EmployeeInfo> empList = new List<EmployeeInfo>();

            using (SqlConnection conn = new SqlConnection(dbEmpConn))
            {
                //Set the SQL command to the stored procedures
                using (SqlCommand cmd = new SqlCommand("usp_GetAllEmployees", conn))
                {
                    cmd.CommandType = CommandType.StoredProcedure;
                    conn.Open();

                    //This provides a way of reading a forward onlu stream
                    SqlDataReader dataReader = cmd.ExecuteReader();
                    while(dataReader.Read())
                    {
                        EmployeeInfo emp = new EmployeeInfo();
                        try
                        {
                            emp.EmployeeID = Convert.ToInt32(dataReader["EmployeeID"].ToString());
                        }
                        catch
                        {
                            emp.EmployeeID = 0;
                        }
                        emp.Name = dataReader["Name"].ToString();
                        emp.Gender = dataReader["Gender"].ToString();
                        emp.Company = dataReader["Company"].ToString();
                        emp.Department = dataReader["Department"].ToString();

                        empList.Add(emp);
                    }
                }
                conn.Close();
            }
        }

        public bool AddEmployee(EmployeeInfo emp)
        {
            bool success = true;
            using (SqlConnection conn = new SqlConnection(dbEmpConn))
            {
                /*
                 * If you dont want to use stored procedures this is a second example
                 * string insertCmd = @"INSERT INTO Employee (Name, Gender, Company, Department) VALUES (@Name, @Gender, @Company, @Department");
                 * SqlCommand cmd = new SqlCommand(insertCmd, conn);
                 */
                using (SqlCommand cmd = new SqlCommand("usp_InsertEmployee", conn))
                {
                    cmd.CommandType = CommandType.StoredProcedure;
                    conn.Open();

                    cmd.Parameters.AddWithValue("@Name", emp.Name);
                    cmd.Parameters.AddWithValue("@Gender", emp.Gender);
                    cmd.Parameters.AddWithValue("@Company", emp.Company);
                    cmd.Parameters.AddWithValue("@Department", emp.Department);
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
    }
}
