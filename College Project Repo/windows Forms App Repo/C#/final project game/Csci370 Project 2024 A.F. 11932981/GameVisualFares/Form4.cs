using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using VisualProjectGame;


namespace GameVisualFares
{
    public partial class Form4 : Form
    {

        private String Question;
        private String Answer1;
        private String Answer2;
        private String Answer3;
        private String Answer4;
        private int ansIndex;
        private int quesList;
        List<Questions> Q1 = new List<Questions>();
        List<Questions> Q2 = new List<Questions>();
        List<Questions> Q3 = new List<Questions>();
        List<Questions> Q4 = new List<Questions>();
        public Form4()
        {
            InitializeComponent();
            Q1.Add(new Questions("How much is 1 + 1", " 2 ", " 1 ", " 0 ", " 3 ", 1));
            Q1.Add(new Questions("what is 4 ^ 2", " 8 ", " 16 ", " 12 ", " 10 ", 2));
            Q1.Add(new Questions("How much is 6 / 2", " 1 ", " 2 ", " 3 ", " 4 ", 3));
            Q1.Add(new Questions("How much is 5 + 5", " 12 ", " 10 ", " 20 ", " 13 ", 2));


            Q2.Add(new Questions("what is a potato", " fruit ", " vegetable ", " machine ", " magic ", 2));
            Q2.Add(new Questions("iodine color", " green ", " dark brown ", " light red ", " blue ", 2));
            Q2.Add(new Questions("chrolophyl color", " red ", " blue ", " green ", " orange ", 3));
            Q2.Add(new Questions("the atmosphere has the most", " oxygen ", " Nitrogen ", " carbondioxide ", " sulfer  ", 2));


            Q3.Add(new Questions("How much is 1 + 1", " 2 ", " 1 ", " 0 ", " 3 ", 1));
            Q3.Add(new Questions("How much is 1 + 1", " 2 ", " 1 ", " 0 ", " 3 ", 1));
            Q3.Add(new Questions("How much is 1 + 1", " 2 ", " 1 ", " 0 ", " 3 ", 1));
            Q3.Add(new Questions("How much is 1 + 1", " 2 ", " 1 ", " 0 ", " 3 ", 1));


            Q4.Add(new Questions("How much is 1 + 1", " 2 ", " 1 ", " 0 ", " 3 ", 1));
            Q4.Add(new Questions("How much is 1 + 1", " 2 ", " 1 ", " 0 ", " 3 ", 1));
            Q4.Add(new Questions("How much is 1 + 1", " 2 ", " 1 ", " 0 ", " 3 ", 1));
            Q4.Add(new Questions("How much is 1 + 1", " 2 ", " 1 ", " 0 ", " 3 ", 1));
            numericUpDown1.Value = 1;

        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (quesList == 1) { Questions nQ =new Questions(Question,Answer1,Answer2,Answer3,Answer4, ansIndex);

                Q1.Add(nQ);
                listBox1.Items.Add( nQ.Ques + "     Math");
                MessageBox.Show("Done");
            }
          else  if (quesList == 2) {
                Questions nQ = new Questions(Question, Answer1, Answer2, Answer3, Answer4, ansIndex);
                Q2.Add(nQ);
                listBox1.Items.Add(nQ.Ques + "     Bussiness");
                MessageBox.Show("Done");
            }
           else if (quesList == 3) {
                Questions nQ = new Questions(Question, Answer1, Answer2, Answer3, Answer4, ansIndex);
                Q3.Add(nQ);
                listBox1.Items.Add(nQ.Ques + "     Biology");
                MessageBox.Show("Done");
            }
          else  if (quesList == 4) {
                Questions nQ = new Questions(Question, Answer1, Answer2, Answer3, Answer4, ansIndex);
                Q4.Add(nQ);
                listBox1.Items.Add(nQ.Ques + "     Politics");
                MessageBox.Show("Done");
            }
            else if(quesList <= 0 || quesList > 4) { MessageBox.Show("Please Fill All the Parameters."); }
            else { MessageBox.Show("Incomplete"); }
        }

        private void Form4_Load(object sender, EventArgs e)
        {
            for (int i = 0; i < Q1.Count; i++)
            {


                listBox1.Items.Add(Q1[i].Ques + "   Math");


            }
            for (int i = 0; i < Q2.Count; i++)
            {


                listBox2.Items.Add(Q2[i].Ques + "   Bussiness");


            }
            for (int i = 0; i < Q3.Count; i++)
            {


                listBox3.Items.Add(Q3[i].Ques + "   Biology");


            }
            for (int i = 0; i < Q4.Count; i++)
            {


                listBox4.Items.Add(Q4[i].Ques + "   Politics");


            }
        }

        private void richTextBox1_TextChanged(object sender, EventArgs e)
        {
            Question = richTextBox1.Text;
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            Answer1 = textBox1.Text;
        }
        private void textBox2_TextChanged(object sender, EventArgs e)
        {
            Answer2 = textBox2.Text;
        }
        private void textBox3_TextChanged(object sender, EventArgs e)
        {
            Answer3 = textBox3.Text;
        }
        private void textBox4_TextChanged(object sender, EventArgs e)
        {
            Answer4 = textBox4.Text;
        }

        private void numericUpDown1_ValueChanged(object sender, EventArgs e)
        {
            ansIndex = (int)numericUpDown1.Value;
            if(numericUpDown1.Value > 4) { numericUpDown1.Value = 4 ; }
            else if(numericUpDown1.Value < 0) { numericUpDown1.Value = 1 ; }
        }

        private void radioButton1_CheckedChanged(object sender, EventArgs e)
        {
            quesList = 1;
        }

        private void radioButton2_CheckedChanged(object sender, EventArgs e)
        {
            quesList = 2;
        }

        private void radioButton3_CheckedChanged(object sender, EventArgs e)
        {
            quesList = 3;
        }

        private void radioButton4_CheckedChanged(object sender, EventArgs e)
        {
            quesList = 4;
        }
    }
}
