using ASPCoreFirstApp.Models;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Threading.Tasks;
using static ASPCoreFirstApp.Services.IProductsDataService;

namespace ASPCoreFirstApp.Services
{
    public class ProductsDAO : IProductDataService
    {
        string connString = @"Data Source=(localdb)\MSSQLLocalDB;Initial Catalog=Test;Integrated Security=True;Connect Timeout=30;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False";

        public List<ProductModel> AllProducts()
        {
            List<ProductModel> prodList = new List<ProductModel>();
            string stmt = "SELECT * FROM dbo.products";

            using (SqlConnection conn = new SqlConnection(connString))
            {
                SqlCommand command = new SqlCommand(stmt, conn);
                try
                {
                    conn.Open();
                    SqlDataReader reader = command.ExecuteReader();
                    while (reader.Read())
                    {
                        prodList.Add(new ProductModel((int)reader[0], (string)reader[1], (decimal)reader[2], (string)reader[3]));
                    }
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                }
            }
            return prodList;
        }

        public List<ProductModel> SearchProducts(string key)
        {
            List<ProductModel> prodList = new List<ProductModel>();
            string stmt = "SELECT * FROM dbo.products WHERE Name LIKE @Name";

            using (SqlConnection conn = new SqlConnection(connString))
            {
                SqlCommand command = new SqlCommand(stmt, conn);

                command.Parameters.AddWithValue("@Name", '%' + key + '%');
                try
                {
                    conn.Open();
                    SqlDataReader reader = command.ExecuteReader();
                    while (reader.Read())
                    {
                        prodList.Add(new ProductModel((int)reader[0], (string)reader[1], (decimal)reader[2], (string)reader[3]));
                    }
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                }
            }
            return prodList;
        }

        public bool Delete(ProductModel product)
        {
            throw new NotImplementedException();
        }

        public int Insert(ProductModel product)
        {
            throw new NotImplementedException();
        }

        public int Update(ProductModel product)
        {
            int newIdNum = -1;
            using(SqlConnection connection = new SqlConnection(connString))
            {
                string sql = "UPDATE dbo.Products SET Name = @Name, Price = @Price, Description = @Desc WHERE Id = @Id";

                SqlCommand command = new SqlCommand(sql, connection);
                command.Parameters.AddWithValue("@Id", product.Id);
                command.Parameters.AddWithValue("@Name", product.Name);
                command.Parameters.AddWithValue("@Price", product.Price);
                command.Parameters.AddWithValue("@Desc", product.Description);

                try
                {
                    connection.Open();

                    newIdNum = Convert.ToInt32(command.ExecuteScalar());
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                }
                return newIdNum;
            }
        }

        public ProductModel GetProductByID(int id)
        {
            ProductModel foundProduct = null;

            string sql = "SELECT * FROM dbo.Products WHERE ID = @id";

            using (SqlConnection connection = new SqlConnection(connString))
            {
                SqlCommand command = new SqlCommand(sql, connection);
                command.Parameters.AddWithValue("@id", id);

                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    while (reader.Read())
                    {
                        foundProduct = new ProductModel((int)reader[0], (string)reader[1], (decimal)reader[2], (string)reader[3]);
                    }
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                };
            }
            return foundProduct;
        }
    }
}
