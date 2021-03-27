using ASPCoreFirstApp.Models;
using Bogus;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using static ASPCoreFirstApp.Services.IProductsDataService;

namespace ASPCoreFirstApp.Services
{
    public class HardCodedSampleDataRepo : IProductDataService
    {
        static List<ProductModel> prodList;

        public HardCodedSampleDataRepo()
        {
            List<ProductModel> prodList = new List<ProductModel>();

            prodList.Add(new ProductModel(1, "RTX 3070", 1460.98m, "A very strong graphics card"));
            prodList.Add(new ProductModel(2, "Ryzen 5 5600", 349.99m, "A very strong mid-level CPU"));
            prodList.Add(new ProductModel(3, "Aorus X570 Elite", 146.98m, "A well made, reliable motherboard"));
            prodList.Add(new ProductModel(4, "ThermalTake 2x8G 3600mhz sticks", 89.99m, "16 Gigabytes of fast, and colorful ram"));

            for (int i = 0; i < 100; i++)
            {
                prodList.Add(new Faker<ProductModel>()
                    .RuleFor(p => p.Id, i + 5)
                    .RuleFor(p => p.Name, f => f.Commerce.ProductName())
                    .RuleFor(p => p.Price, f => f.Random.Decimal(100))
                    .RuleFor(p => p.Description, f => f.Rant.Review()));
            }
        }


        public List<ProductModel> AllProducts()
        {
            throw new NotImplementedException();
        }

        public bool Delete(ProductModel product)
        {
            throw new NotImplementedException();
        }

        public ProductModel GetProductByID(int id)
        {
            throw new NotImplementedException();
        }

        public int Insert(ProductModel product)
        {
            throw new NotImplementedException();
        }

        public List<ProductModel> SearchProducts(string key)
        {
            throw new NotImplementedException();
        }

        public int Update(ProductModel product)
        {
            throw new NotImplementedException();
        }
    }
}
