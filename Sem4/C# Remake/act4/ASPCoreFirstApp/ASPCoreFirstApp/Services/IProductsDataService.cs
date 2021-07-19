using ASPCoreFirstApp.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace ASPCoreFirstApp.Services
{
    public class IProductsDataService
    {
        public interface IProductDataService
        {
            List<ProductModel> AllProducts();
            List<ProductModel> SearchProducts(string key);
            ProductModel GetProductByID(int id);
            int Insert(ProductModel product);
            bool Delete(int id);
            int Update(ProductModel product);
        }
    }
}
