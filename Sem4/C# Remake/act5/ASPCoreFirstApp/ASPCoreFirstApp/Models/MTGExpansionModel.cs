using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace ASPCoreFirstApp.Models
{
    public class MTGExpansionModel
    {
        public string Name { get; set; }
        public int Value { get; set; }
        public DateTime ReleaseDate { get; set; }

        public MTGExpansionModel(string name, int value, DateTime releaseDate)
        {
            Name = name;
            Value = value;
            ReleaseDate = releaseDate;
        }

        public MTGExpansionModel()
        {

        }
    }
}
