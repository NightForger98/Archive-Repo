using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace week_8_linq
{
    public partial class frmLinqInteger : Form
    {
    int[] numbers = new int[7] { 0, 4, 9, 2, 1, 8, 6 };

     Employee[] employees = {
           new Employee( "Rami", "al ahmar", 5000 ),
           new Employee( "Sami", "darwish", 7600 ),
           new Employee( "Walid", "khatib", 3587.5 ),
           new Employee( "Naji", "khatib", 4700.77 ),
           new Employee( "karim", "anwar", 6200 )     };

        public frmLinqInteger()
        {
            InitializeComponent();
        }

        private void btnExit_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void btnAllInteger_Click(object sender, EventArgs e)
        {
            listBox.Items.Clear();
            // first method
            //    foreach (var element in numbers)
            //    {
            //         listBox.Items.Add(element);
            //    }
            // second method
            var Query1 =
               from num in numbers
               select num;
            // fill the listbox
            foreach (var element in Query1)
            {
                listBox.Items.Add(element);
            }
        }

        private void btnNumberInOrder_Click(object sender, EventArgs e)
        {
            listBox.Items.Clear();

            var Query2 =
              from num in numbers
              orderby num          //ascending ( default ) or  descending 
              select num;

            // fill the listbox
            foreach (var element in Query2)
            {
                listBox.Items.Add(element);
            }
        }

        private void btnEvenNumber_Click(object sender, EventArgs e)
        {
            listBox.Items.Clear();

            var Query3 =
              from num in numbers
              where num % 2 == 0
              orderby num
              select num;

            // fill the listbox
            foreach (var element in Query3)
            {
                listBox.Items.Add(element);
            }
        }

        private void btnEmployeesSalary_Click(object sender, EventArgs e)
        {
            listBox.Items.Clear();

            var Query4 =
               from v in employees
               select v;

            // fill the listbox
            foreach (var element in Query4)
            {
                listBox.Items.Add(element);
            }
        }

        private void btnEmployeesSoterted_Click(object sender, EventArgs e)
        {
            listBox.Items.Clear();

            var Query5 =
               from v in employees
               orderby v.FirstName , v.LastName
               select v;

            // fill the listbox
            foreach (var element in Query5)
            {
                listBox.Items.Add(element);
            }
        }

        private void btnEmployeesDistinct_Click(object sender, EventArgs e)
        {
            listBox.Items.Clear();

            var Query6 = 
                from v in employees
                select v.LastName;

            foreach (var element in Query6.Distinct())
            {
                listBox.Items.Add(element);
            }
        }

        private void btnSalaryBetween_Click(object sender, EventArgs e)
        {
            listBox.Items.Clear();

            var  Query7 =
               from v in employees
               where v.MonthlySalary >=4000 && v.MonthlySalary<=5500
              select v;

            // fill the listbox
            foreach (var element in  Query7)
            {
                listBox.Items.Add(element);
            }
        }
    }
}

