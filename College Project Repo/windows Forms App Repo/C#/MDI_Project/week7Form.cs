using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication2
{
    public partial class week7Form : Form
    {
        List<week7FormPatient> patients = new List<week7FormPatient>();
        List<Speciality> Sps = new List<Speciality>();
        int[] grades = { 1, 2, 5, 7, 9, 10, 12,12,10 };
        string[] names = { "Bill", "Steve", "James", "Mohan" };

        
         
        public week7Form()
        {
            InitializeComponent();
            
            patients.Add(new week7FormPatient("Jaafar",20,"M","Beirut",1));
            patients.Add(new week7FormPatient("Sheikh", 30, "M", "Beirut",1));
            patients.Add(new week7FormPatient("Jaber", 13, "M", "Saida",2));
            patients.Add(new week7FormPatient("Jaber", 25, "M", "Saida",2));
            Sps.Add(new Speciality("XYZ",  1));
            Sps.Add(new Speciality("ZYX", 2));

        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            var res = from g in grades
                      where g%2==0  &&  g<3
                      orderby  g descending
                      
                      select g;

            foreach (int item in res)
            {
                listBox1.Items.Add(item);
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            var res = from n in names
                      where n.EndsWith("n")
                      select n
                      ;
            foreach (string item in res)
            {
                listBox1.Items.Add(item);
            }

        }

        private void button3_Click(object sender, EventArgs e)
        {

          
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
             
        }

        private void button4_Click(object sender, EventArgs e)
        {
         
        }

        private void button5_Click(object sender, EventArgs e)
        {
            

        }

        private void button6_Click(object sender, EventArgs e)
        {
            var res = (from g in patients
                       
                      select g.PatientName).Distinct();

            foreach (string item in res)
            {
                listBox1.Items.Add(item);
            }

        }

        private void button7_Click(object sender, EventArgs e)
        {
            var j = from g in patients 
                    join s in Sps 
                    on g.Specialityid equals s.Specialityid
                    where g.Specialityid==1
                    select g.PatientName+" "+s.SpecialityName;

            foreach (string item in j)
            {
                listBox1.Items.Add(item);
            }

        }

        private void button8_Click(object sender, EventArgs e)
        {

            var res = grades.OrderBy(g=>g).Where(n=>n%2==0);

            foreach (int item in res)
            {
                listBox1.Items.Add(item);
            }
        }

        private void button9_Click(object sender, EventArgs e)
        {
            var rr = patients.Select(p=>new {p.PatientName,p.Specialityid}).OrderBy(p=>p.Specialityid);


            foreach (var x in rr)
            {
                listBox1.Items.Add(x.PatientName);
            }


        }

        private void button10_Click(object sender, EventArgs e)
        {
            var rr = patients;
            

        }

        private void button1_Click_1(object sender, EventArgs e)
        {
            // int[] grades = { 1, 2, 5, 7, 9, 10, 12,12,10 };
            var rs = from x in grades
                    // where x%2==0 && x<5
                     orderby x ascending
                     select x;
            MessageBox.Show(rs.Distinct().Count().ToString());
            

        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            listBox1.Items.Clear();
            var rs = from p in patients
                     where p.Gender.Equals(comboBox1.Text)
                     select p;

            foreach (week7FormPatient x in rs)
            {
                listBox1.Items.Add(x.PatientName );
            }
        }

        private void button3_Click_1(object sender, EventArgs e)
        {
            var rs = from p in patients
                     where p.Age<20
                     select p.PatientName+" "+p.Age;

            foreach (string x in rs.Distinct())
            {
                listBox1.Items.Add(x);
            }
        }

        private void button4_Click_1(object sender, EventArgs e)
        {
            var rs = from p in patients
                     select new { p.PatientName, p.Age };

            foreach (var x in rs)
            {
                listBox1.Items.Add(x.PatientName+""+x.Age);
            }

        }

        private void button5_Click_1(object sender, EventArgs e)
        {
            var res = from p in patients
                      join s in Sps
                      on p.Specialityid equals s.Specialityid
                      select new { p.PatientName, s.SpecialityName };
            foreach (var x in res)
            {
                listBox1.Items.Add(x.PatientName + "" + x.SpecialityName);
            }
        }

        private void button6_Click_1(object sender, EventArgs e)
        {
            var res = patients.Where(p=>p.PatientName.Contains('a'));
            foreach (var x in res)
            {
                listBox1.Items.Add(x.PatientName );
            }
        }

        private void button7_Click_1(object sender, EventArgs e)
        {
            var res = patients.Where(p => p.PatientName.Contains('a')).OrderByDescending(p=>p.Age);
            foreach (var x in res)
            {
                listBox1.Items.Add(x);
            }

        }

        private void button8_Click_1(object sender, EventArgs e)
        {
            var res = patients.Select(p => p.PatientName).Where(p => p.Contains('h'));
               ;
            foreach (var x in res)
            {
                listBox1.Items.Add(x);
            }
        }

        private void button9_Click_1(object sender, EventArgs e)
        {
            var res = patients.Where(p => p.PatientName.StartsWith("j") && p.Age<20);
            foreach (var x in res)
            {
                listBox1.Items.Add(x);
            }
        }

        private void button10_Click_1(object sender, EventArgs e)
        {
            var res = patients.Where(p => p.PatientName.ToUpper().StartsWith(textBox1.Text.ToUpper()) && p.Age < int.Parse( textBox2.Text));
            foreach (var x in res)
            {
                listBox1.Items.Add(x.PatientName);
            } 

        }
    }
}
