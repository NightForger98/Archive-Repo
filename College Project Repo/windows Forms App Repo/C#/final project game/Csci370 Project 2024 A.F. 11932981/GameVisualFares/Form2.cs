using GameVisualFares;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml.Linq;

namespace VisualProjectGame
{
    public partial class Form2 : Form
    {

        private String user = String.Empty;
        private Boolean isAdmin = false;
        
        private int newscore = 0;
        private bool but1,but2,but3,but4;
        public static int _case =0;
       
        public static String _subject = String.Empty;



        public Form2()
        {
            InitializeComponent();

            user = Form1._current;
            label1.Text = user.ToString();
            isAdmin = Form1._isAdmin;
            newscore += Form3._score;
            _subject = "batata";
       
            
            if (but1)
            {
                _case = 1;
                _subject = "Math";
            }
            if (but2)
            {
                _case = 2;
                _subject = "Bussiness";
            }
            if (but3)
            {
                _case = 3;
                _subject = "Biology";
            }
            if (but4)
            {
                _case = 4;
                _subject = "Politics";
            }
            
        }
        private void Form2_Load(object sender, EventArgs e)
        {
            
            if (but1)
            {
                _case = 1;
                _subject = "Math";
            }
            else if (but2)
            {
                _case = 2;
                _subject = "Bussiness";
            }
            else if (but3)
            {
                _case = 3;
                _subject = "Biology";
            }
            else if (but4)
            {
                _case = 4;
                _subject = "Politics";
            }
            label4.Text = newscore.ToString() + " /100";

        }

        private void button1_Click(object sender, EventArgs e)
        {
            var myForm = new Form3();
           
        
            
            but1 = true;
            _subject = "Math";
            _case = 1;
            myForm.Show();
            this.Hide();
        }

     

        private void button2_Click(object sender, EventArgs e)
        {
            var myForm = new Form3();
           
            but2 = true;
            _subject = "Bussiness";
            _case = 2;
            myForm.Show();
            this.Hide();
        }

  


        private void button5_Click(object sender, EventArgs e)
        {
            var myForm = new Form4();
            if (isAdmin) {
                myForm.Show();
                this.Hide();
            }
            else { MessageBox.Show("Only Admin Allowed"); }
        }

       

        private void button3_Click(object sender, EventArgs e)
        {
            var myForm = new Form3();
            
            but3 = true;
            _subject = "Biology";
            _case = 3 ;
            myForm.Show();
            this.Hide();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            var myForm = new Form3();
            
            but4 = true;
            _subject = "Politics";
            _case = 4;
            myForm.Show();
            this.Hide();
        }
       
       
    }
}
