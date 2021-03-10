using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MergeModels.Models
{
    public class ViewModel
    {
        public IEnumerable<TeacherModel> Teachers { get; set; }
        public IEnumerable<StudentModel> Students { get; set; }
    }
}
