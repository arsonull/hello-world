using ASPCoreFirstApp.Models;
using ASPCoreFirstApp.Services;
using Bogus;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Web;
using System.Web.Http.Description;

namespace ASPCoreFirstApp.Controllers
{
    [ApiController]
    [Route("api/[controller]")]
    public class ProductsAPIController : ControllerBase
    {
        ProductsDAO DAO = new ProductsDAO();
        public ProductsAPIController()
        {
            DAO = new ProductsDAO();
        }

        [HttpGet]
        public IEnumerable<ProductModel> Index()
        {
            //HardCodedSampleDataRepo repo = new HardCodedSampleDataRepo();
            return DAO.AllProducts();
        }

        [HttpGet("index2")]
        [ResponseType(typeof(List<ProductDTO>))]
        public IEnumerable<ProductDTO> Index2()
        {
            List<ProductModel> prodList = DAO.AllProducts();

            List<ProductDTO> dtoList = new List<ProductDTO>();
            foreach (ProductModel prod in prodList)
            {
                dtoList.Add(new ProductDTO(prod));
            }
            //HardCodedSampleDataRepo repo = new HardCodedSampleDataRepo();
            return dtoList;
        }

        [HttpGet("searchresults/{key}")]
        public IEnumerable<ProductDTO> SearchResults(string key)
        {
            List<ProductModel> prodList = DAO.SearchProducts(key);

            List<ProductDTO> dtoList = new List<ProductDTO>();
            foreach (ProductModel prod in prodList)
            {
                dtoList.Add(new ProductDTO(prod));
            }
            return dtoList;
        }

        [HttpGet("showoneproduct/{id}")]
        [ResponseType(typeof(ProductDTO))]
        public ActionResult<ProductDTO> ShowOneProduct(int id)
        {
            ProductModel prod = DAO.GetProductByID(id);
            ProductDTO dto = new ProductDTO(prod);

            return dto;
        }

        [HttpPut("processedit")]
        [ResponseType(typeof(ProductDTO))]
        public IEnumerable<ProductDTO> ProcessEdit(ProductModel prod)
        {
            DAO.Update(prod);

            List<ProductModel> prodList = DAO.AllProducts();

            List<ProductDTO> dtoList = new List<ProductDTO>();
            foreach (ProductModel product in prodList)
            {
                dtoList.Add(new ProductDTO(product));
            }
            //HardCodedSampleDataRepo repo = new HardCodedSampleDataRepo();
            return dtoList;
        }

        [HttpGet("processeditreturnoneitem")]
        [ResponseType(typeof(ProductDTO))]
        public ActionResult<ProductDTO> ProcessEditReturnOneItem(ProductModel prod)
        {
            DAO.Update(prod);
            ProductModel updatedProd = DAO.GetProductByID(prod.Id);
            ProductDTO dto = new ProductDTO(updatedProd);
            return dto;
        }
    }
}
