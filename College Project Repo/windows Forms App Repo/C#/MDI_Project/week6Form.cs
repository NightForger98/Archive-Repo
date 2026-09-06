using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace MDI_Project
{
    public partial class week6Form : Form
    {
        List<Product> products = new List<Product>();
        double total = 0;
        double highestBid = 0;
        string highest = "";
        public week6Form()
        {
            InitializeComponent();
            Product p = new Product("Cola", 100);
            products.Add(p);
            products.Add(new Product("Pepsi", 120));
            products.Add(new Product("shampoo", 5.5));

        }
        private void Sample_Load(object sender, EventArgs e)
        {

            for (int i = 0; i < products.Count; i++)
            {
                listBox1.Items.Add(products[i].Name + " " + products[i].Price);
            }

        }


        private void listBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            textBox1.Text = products[listBox1.SelectedIndex].Price.ToString();

        }
        private void button1_Click(object sender, EventArgs e)
        {

            if (!listBox2.Items.Contains(products[listBox1.SelectedIndex].Name))
            {
                double subtotal = ((double)numericUpDown1.Value * Convert.ToDouble(textBox1.Text));
                if (subtotal > total)
                {
                    highestBid = subtotal;
                }
                total += subtotal;

                textBox2.Text = "Subtotal: " + subtotal + "\r\n total: " + total;
                if (numericUpDown1.Value > 0)
                {
                    listBox2.Items.Add(products[listBox1.SelectedIndex].Name.ToString());
                    // + "\t"+ numericUpDown1.Value);
                }
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            listBox2.Items.Clear();
            textBox2.Text = "";
        }

        private void button3_Click(object sender, EventArgs e)
        {
            List<string> items = new List<string>();
            for (int i = 0; i < listBox1.Items.Count; i++)
            {
                items.Add(listBox2.Items[i].ToString());

            }
            items.Sort();
            listBox2.Items.Clear();
            listBox2.Items.AddRange(items.ToArray());
        }
        private void button4_Click(object sender, EventArgs e)
        {
            MessageBox.Show(highestBid.ToString());
            textBox3.Text = highestBid.ToString();

        }



        private Button button1;
        private Button button2;
        private Button button3;
        private Button button4;
        private Label label1;
        private Label label2;
        private Label label3;
        private Label label4;
        private Label label5;
        private Label label6;
        private TextBox textBox1;
        private TextBox textBox2;
        private ListBox listBox1;
        private ListBox listBox2;
        private TextBox textBox3;
        private NumericUpDown numericUpDown1;

        private void textBox3_TextChanged(object sender, EventArgs e)
        {

        }
    }
}

