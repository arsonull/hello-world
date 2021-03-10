using MergeModels.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MergeModels.Service.Business
{
    public class AddData
    {
        public List<TeacherModel> GetTeachers()
        {
            List<TeacherModel> teachers = new List<TeacherModel>();
            teachers.Add(new TeacherModel { teacherID = 1, code = "TT", name = "Teacher 1" });
            teachers.Add(new TeacherModel { teacherID = 2, code = "JT", name = "Teacher 2" });
            teachers.Add(new TeacherModel { teacherID = 3, code = "RT", name = "Teacher 3" });
            return teachers;
        }

        public List<StudentModel> GetStudents()
        {
            List<StudentModel> students = new List<StudentModel>();
            students.Add(new StudentModel { studentID = 1, code = "SS", name = "Student 1" });
            students.Add(new StudentModel { studentID = 2, code = "ST", name = "Student 2" });
            students.Add(new StudentModel { studentID = 3, code = "SR", name = "Student 3" });
            return students;
        }
    }
}
