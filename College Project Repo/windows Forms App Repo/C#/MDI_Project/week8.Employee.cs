using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace week_8_linq
{    class Employee
    {
        public string FirstName { get; set; }
        public string LastName { get; set; }
        private double monthlySalaryValue;
      public Employee(string first, string last, double salary)
        {
            FirstName = first;
            LastName = last;
            MonthlySalary = salary;
        }
      public double MonthlySalary
        {
            get
            {
                return monthlySalaryValue;
            }  
            set
            {
                if (value >= 0 ) // if salary is non negative
                {
                    monthlySalaryValue = value;
                }
            }
        }
         public override string ToString()
        {
            return string.Format (  FirstName + " " + LastName  +" " + MonthlySalary);
        }  
    }  
}
