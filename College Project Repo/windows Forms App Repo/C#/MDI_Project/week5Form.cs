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
    public partial class week5Form : Form
    {
        public week5Form()
        {
            InitializeComponent();
        }
        private void btnConfirm_Click(object sender, EventArgs e)
        {
            //check if all fields are filled
            if (txtDescription.Text == "" || txtPrice.Text == "")
                MessageBox.Show("Make sure you fill all fields");
            else
            {
                int totalPrice = Convert.ToInt32(txtPrice.Text) * (int)nudQty.Value;
                txtResult.Text += "Product Info:" + txtDescription.Text + " Price: $" + totalPrice + "\r\n";
                clearFields();
            }
        }
        void clearFields() //since we need to repeat this in cancel button too
        {
            txtDescription.Clear();
            txtPrice.Clear();
            nudQty.Value = nudQty.Minimum;//reset the numeric up down to the minimum value
        }

        private void txtPrice_KeyPress(object sender, KeyPressEventArgs e)
        {
            // you can now use the "e" that can help you find which key is pressed
            if (!char.IsDigit(e.KeyChar) && e.KeyChar != (char)Keys.Back)
                e.Handled = true; //if the key pressed is not a digit nor the back space--> stop the event from executing
        }

        private void btnCancel_Click(object sender, EventArgs e)
        {
            clearFields();
            txtResult.Clear();
        }
    }
}

