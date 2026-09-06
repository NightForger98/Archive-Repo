using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;

namespace MDI_Project
{
    public partial class Calculator : Form
    {


        double operand1;
        double operand2;

        char operation;

        public Calculator()
        {
            InitializeComponent();
            operand1 = 0;
            operand2 = 0;
        }

        private void Calculator_Load(object sender, EventArgs e)
        {
            btn_1.Click += new EventHandler(btn_Click);
            btn_2.Click += new EventHandler(btn_Click);
            btn_3.Click += new EventHandler(btn_Click);
            btn_4.Click += new EventHandler(btn_Click);
            btn_5.Click += new EventHandler(btn_Click);
            btn_6.Click += new EventHandler(btn_Click);
            btn_7.Click += new EventHandler(btn_Click);
            btn_8.Click += new EventHandler(btn_Click);
            btn_9.Click += new EventHandler(btn_Click);
            btn_0.Click += new EventHandler(btn_Click);
            btn_dot.Click += new EventHandler(btn_Click);
        }

        private void btn_Click(object sender, EventArgs e)
        {
            System.Windows.Forms.Button btn = sender as System.Windows.Forms.Button;
            if (btn.Name == "btn_dot")
            {
                if (!result.Text.Contains("."))
                    result.Text += ".";
            }
            else if (btn.Name == "btn_0")
            {
                if (result.Text == String.Empty | !result.Text.Equals("0"))
                    result.Text += btn.Text;
            }
            else
                result.Text += btn.Text;
        }

        private void btn_add_Click(object sender, EventArgs e)
        {
            operand1 = Convert.ToDouble(result.Text);
            operation = '+';
            result.Text = string.Empty;
        }

        private void btn_subtract_Click(object sender, EventArgs e)
        {
            operand1 = Convert.ToDouble(result.Text);
            operation = '-';
            result.Text = string.Empty;
        }

        private void btn_multiply_Click(object sender, EventArgs e)
        {
            operand1 = Convert.ToDouble(result.Text);
            operation = '*';
            result.Text = string.Empty;
        }

        private void btn_divide_Click(object sender, EventArgs e)
        {
            operand1 = Convert.ToDouble(result.Text);
            operation = '/';
            result.Text = string.Empty;
        }

        private void btn_equal_Click(object sender, EventArgs e)
        {

            try
            {
                operand2 = Convert.ToDouble(result.Text);
                string resultString = string.Empty;

                switch (operation)
                {
                    case '+': resultString = (operand1 + operand2).ToString(); break;
                    case '-': resultString = (operand1 - operand2).ToString(); break;
                    case '*': resultString = (operand1 * operand2).ToString(); break;
                    case '/':
                        if (operand2 != 0)
                            resultString = (operand1 / operand2).ToString();
                        else
                            MessageBox.Show("Can't divide by zero");
                        break;
                }

                result.Text = resultString;
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }

        }

        private void btn_clear_Click(object sender, EventArgs e)
        {
            operand1 = 0;
            operand2 = 0;
            result.Text = string.Empty;

            cos.Checked = false;
            sin.Checked = false;
            squareRoot.Checked = false;
            power.Checked = false;
        }

        private void rbtn_scientific_CheckedChanged(object sender, EventArgs e)
        {
            grpBox_scientific.Visible = true;
        }

        private void rbtn_simple_CheckedChanged(object sender, EventArgs e)
        {
            grpBox_scientific.Visible = false;
            cos.Checked = false;
            sin.Checked = false;
            squareRoot.Checked = false;
            power.Checked = false;
        }

        private void cos_CheckedChanged(object sender, EventArgs e)
        {
            if (cos.Checked && result.Text != string.Empty)
                result.Text = Math.Cos(Convert.ToDouble(result.Text)).ToString();
        }

        private void sin_CheckedChanged(object sender, EventArgs e)
        {
            if (sin.Checked && result.Text != string.Empty)
                result.Text = Math.Sin(Convert.ToDouble(result.Text)).ToString();
        }

        private void squareRoot_CheckedChanged(object sender, EventArgs e)
        {
            if (squareRoot.Checked && result.Text != string.Empty)
                result.Text = Math.Sqrt(Convert.ToDouble(result.Text)).ToString();
        }

        private void power_CheckedChanged(object sender, EventArgs e)
        {
            if (power.Checked && result.Text != string.Empty)
                result.Text = Math.Pow(Convert.ToDouble(result.Text), 2).ToString();
        }

        private void backColor_CheckedChanged(object sender, EventArgs e)
        {
            if (backColor.Checked)
                this.BackColor = Color.LightBlue;
            else
                this.BackColor = Color.Gray;
        }

        private void fontColor_CheckedChanged(object sender, EventArgs e)
        {
            if (fontColor.Checked)
                this.ForeColor = Color.DarkBlue;
            else
                this.ForeColor = Color.Black;
        }

        private void calculatorChoice_Paint(object sender, PaintEventArgs e)
        {

        }
    }
}

