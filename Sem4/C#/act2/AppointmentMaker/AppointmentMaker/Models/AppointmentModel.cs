using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace AppointmentMaker.Models
{
    public class AppointmentModel
    {
        [Required]
        [DisplayName("Patient's Full Name")]
        [StringLength(20, MinimumLength = 4)]
        public string patientName { get; set; }
        [Required]
        [DataType(DataType.Date)]
        [DisplayName("Appointment Request Date")]
        public DateTime date { get; set; }
        [Required]
        [DataType(DataType.EmailAddress)]
        [DisplayName("Patient's Email Address")]
        public string email { get; set; }
        [Required]
        [DataType(DataType.PhoneNumber)]
        [DisplayName("Patient's Phone Number")]
        public string phoneNumber { get; set; }
        [Required]
        [DisplayName("Patient's Street Address")]
        public string streetAddr { get; set; }
        [Required]
        [DataType(DataType.Text)]
        [DisplayName("Patient's City")]
        public string city { get; set; }
        [Required]
        [DataType(DataType.PostalCode)]
        [DisplayName("Patient's Zip Code")]
        public int zip { get; set; }
        [Required]
        [DataType(DataType.Currency)]
        [Range(90000,double.PositiveInfinity)]
        [DisplayName("Patient's approximate net worth, refused if below $90,000")]
        public decimal patientNetWorth { get; set; }
        [Required]
        [DisplayName("Primary Doctor's Last Name")]
        public string doctorName { get; set; }
        [Required]
        [Range(5, 10)]
        [DisplayName("Patient's percieved level of pain, refused if below 5")]
        public int painLevel { get; set; }


        public AppointmentModel(string patientName, DateTime date, decimal patientNetWorth, string doctorName, int painLevel)
        {
            this.patientName = patientName;
            this.date = date;
            this.patientNetWorth = patientNetWorth;
            this.doctorName = doctorName;
            this.painLevel = painLevel;
        }

        public AppointmentModel()
        {

        }
    }
}
