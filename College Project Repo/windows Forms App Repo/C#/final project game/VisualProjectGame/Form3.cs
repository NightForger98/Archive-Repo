using Microsoft.VisualBasic.ApplicationServices;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics.Eventing.Reader;
using System.Drawing;
using System.Linq;
using System.Reflection.Emit;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace VisualProjectGame
{


    public partial class Form3 : Form
    {
        List<Questions> Q1 = new List<Questions>();
        List<Questions> Q2 = new List<Questions>();
        List<Questions> Q3 = new List<Questions>();
        List<Questions> Q4 = new List<Questions>();
        public static int _score = 0;
        private String Subject = string.Empty;
        public static int Case = 0;
        public Form3()
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
            Case = Form2._Result;
            if (Case == 1) { Subject = "Math"; }
            if (Case == 2) { Subject = "Bussiness"; }
            if (Case == 3) { Subject = "Biology"; }
            if (Case == 4) { Subject = "Politics"; }


        }

        private void Form3_Load(object sender, EventArgs e)
        {
            Case = 1;
            label2.Text = Subject;
            label3.Text = Case.ToString();
             if (Case == 1)
             {

                 label1.Text = "Math";

                 for (int i = 0; i < Q1.Count; i++)
                 {


                     checkedListBox1.Items.Add(Q1[i].Ques + "   Math");


                 }

             }
              if (Case == 2)
             {
                 label1.Text = "Bussiness";


                 for (int i = 0; i < Q2.Count; i++)
                 {


                     checkedListBox1.Items.Add(Q2[i].Ques + "   Bussiness");


                 }
             }
             if (Case == 3)
             {
                 label1.Text = "Biology";

                 for (int i = 0; i < Q3.Count; i++)
                 {


                     checkedListBox1.Items.Add(Q3[i].Ques + "   Biology");


                 }
             }
              if (Case == 4)
             {
                 label1.Text = "Politics";

                 for (int i = 0; i < Q4.Count; i++)
                 {


                     checkedListBox1.Items.Add(Q4[i].Ques + "   Politics");


                 }
             }
        }


        private void checkedListBox1_SelectedIndexChanged(object sender, EventArgs e)
        {

            
                        if (Case == 1)
                        {
                            label1.Text = Q1[checkedListBox1.SelectedIndex].Ques.ToString();
                            radioButton1.Text = Q1[checkedListBox1.SelectedIndex].Ans1.ToString();
                            radioButton2.Text = Q1[checkedListBox1.SelectedIndex].Ans2.ToString();
                            radioButton3.Text = Q1[checkedListBox1.SelectedIndex].Ans3.ToString();
                            radioButton4.Text = Q1[checkedListBox1.SelectedIndex].Ans4.ToString();
                        }
                        else if (Case == 2)
                        {

                            label1.Text = Q2[checkedListBox1.SelectedIndex].Ques.ToString();
                            radioButton1.Text = Q2[checkedListBox1.SelectedIndex].Ans1.ToString();
                            radioButton2.Text = Q2[checkedListBox1.SelectedIndex].Ans2.ToString();
                            radioButton3.Text = Q2[checkedListBox1.SelectedIndex].Ans3.ToString();
                            radioButton4.Text = Q2[checkedListBox1.SelectedIndex].Ans4.ToString();
                        }
                        else if (Case == 3)
                        {

                            label1.Text = Q3[checkedListBox1.SelectedIndex].Ques.ToString();
                            radioButton1.Text = Q3[checkedListBox1.SelectedIndex].Ans1.ToString();
                            radioButton2.Text = Q3[checkedListBox1.SelectedIndex].Ans2.ToString();
                            radioButton3.Text = Q3[checkedListBox1.SelectedIndex].Ans3.ToString();
                            radioButton4.Text = Q3[checkedListBox1.SelectedIndex].Ans4.ToString();
                        }
                        else if (Case == 4)
                        {

                            label1.Text = Q4[checkedListBox1.SelectedIndex].Ques.ToString();
                            radioButton1.Text = Q4[checkedListBox1.SelectedIndex].Ans1.ToString();
                            radioButton2.Text = Q4[checkedListBox1.SelectedIndex].Ans2.ToString();
                            radioButton3.Text = Q4[checkedListBox1.SelectedIndex].Ans3.ToString();
                            radioButton4.Text = Q4[checkedListBox1.SelectedIndex].Ans4.ToString();
                        }

                        

        }


        private void button1_Click(object sender, EventArgs e)
        {
            int answer = 0;
            if (radioButton1.Checked) { answer = 1; }
            else if (radioButton2.Checked) { answer = 2; }
            else if (radioButton3.Checked) { answer = 3; }
            else if (radioButton4.Checked) { answer = 4; }
            if (answer == Q1[checkedListBox1.SelectedIndex].Corr)
            {
                MessageBox.Show("Correct");
                checkedListBox1.SetItemChecked(checkedListBox1.SelectedIndex, true);
                _score += 1;
                if (checkedListBox1.SelectedIndex + 1 != null)
                {
                    checkedListBox1.SelectedIndex = checkedListBox1.SelectedIndex + 1;
                }
                else
                {
                    MessageBox.Show("All exercises correct");
                    

                }
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {



        }

        private void label3_Click(object sender, EventArgs e)
        {

        }
    }
}
