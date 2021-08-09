using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace ASPCoreFirstApp.Models
{
    public class ProductDTO
    {
        [DisplayName("Id number")]
        public int Id { get; set; }
        [DisplayName("Product Name")]
        public string Name { get; set; }
        [DataType(DataType.Currency)]
        [DisplayName("Cost to Customer")]
        public decimal Price { get; set; }
        public string PriceString { get; set; }
        [DisplayName("What you get...")]
        public string Description { get; set; }
        public string ShortDescription { get; set; }
        public decimal Tax { get; set; }

        public ProductDTO(int id, string name, decimal price, string description)
        {
            Id = id;
            Name = name;
            Price = price;
            PriceString = string.Format("{0:C}", price);
            Description = description;
            ShortDescription = description.Length <= 25 ? description : description.Substring(0, 25);
            Tax = price * 0.08M;
        }
        public ProductDTO(ProductModel prod)
        {
            Id = prod.Id;
            Name = prod.Name;
            Price = prod.Price;
            PriceString = string.Format("{0:C}", prod.Price);
            Description = prod.Description;
            ShortDescription = prod.Description.Length <= 25 ? prod.Description : prod.Description.Substring(0, 25);
            Tax = prod.Price * 0.08M;
        }
    }
}
