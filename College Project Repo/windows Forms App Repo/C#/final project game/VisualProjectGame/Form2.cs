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
        private int score = 0;
        private bool but1,but2,but3,but4;
        private int _case = 0 ;
        public static int _Result = 0;
        public static String _subject = String.Empty;



        public Form2()
        {
            InitializeComponent();

            user = Form1._current;
            isAdmin = Form1._isAdmin;
            score = Form3._score;
            _subject = "batata";
       
            _case = 0;
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
            _Result = _case;
        }
        private void Form2_Load(object sender, EventArgs e)
        {
            label1.Text = user;
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
            _Result = _case;

        }

        private void button1_Click(object sender, EventArgs e)
        {
            var myForm = new Form3();
           
        
            
            but1 = true;
            _subject = "Math";
            _Result = _case;
            myForm.Show();
            this.Hide();
        }

     

        private void button2_Click(object sender, EventArgs e)
        {
            var myForm = new Form3();
           
            but2 = true;
            _subject = "Bussiness";
            _Result = _case;
            myForm.Show();
            this.Hide();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            var myForm = new Form3();
            
            but3 = true;
            _subject = "Biology";
            _Result = _case;
            myForm.Show();
            this.Hide();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            var myForm = new Form3();
            
            but4 = true;
            _subject = "Politics";
            _Result = _case;
            myForm.Show();
            this.Hide();
        }
        private void label1_Click(object sender, EventArgs e)
        {

        }
       
    }
}
