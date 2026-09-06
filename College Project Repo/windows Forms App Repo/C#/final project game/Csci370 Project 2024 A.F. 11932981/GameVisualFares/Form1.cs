using System;
using System.Collections.Generic;
using System.Windows.Forms;

namespace VisualProjectGame
{
    public partial class Form1 : Form
    {
        List<Users> users = new List<Users>();
        public static String _current = String.Empty;
        public static Boolean _isAdmin = false;
        private String pass= string.Empty;
        public Form1()
        {
            InitializeComponent();
            users.Add(new Users("Ahmad Fares", "123", true));
            users.Add(new Users("Hadi saad", "123", true));
            users.Add(new Users("Batata Batenjene", "321", false));
          

        }

        private void button2_Click(object sender, EventArgs e)
        {
            Users p = new Users(textBox1.Text, textBox2.Text, false);
            users.Add(p);
            listBox1.Items.Add(p.Name + "     user");
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            for (int i = 0; i < users.Count; i++)
            {
                if (users[i].IsAdmin == true)
                {
                    listBox1.Items.Add(users[i].Name + "   Admin");
                }
                else { listBox1.Items.Add(users[i].Name + "   User"); }
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {

             pass = textBox3.Text;
            _current = users[listBox1.SelectedIndex].Name;
            _isAdmin = users[listBox1.SelectedIndex].IsAdmin;
            if (pass.ToString().Equals(users[listBox1.SelectedIndex].Pass.ToString())) { 
            var myForm = new Form2();
            myForm.Show();
            this.Hide();
            }
            else { MessageBox.Show("Missing Info or Wrong Pass"); }
        }

        private void listBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            _current = users[listBox1.SelectedIndex].Name;
        }

        private void textBox3_TextChanged(object sender, EventArgs e)
        {
            pass = textBox3.Text;
        }

        
    }
}

