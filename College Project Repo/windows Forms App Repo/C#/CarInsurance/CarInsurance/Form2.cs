using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CarInsurance
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }

        private void tbl_carsBindingNavigatorSaveItem_Click(object sender, EventArgs e)
        {
            this.Validate();
             this.tableAdapterManager.UpdateAll(this.myDS);

        }

        private void Form2_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'myDS.tbl_cars' table. You can move, or remove it, as needed.
            this.tbl_carsTableAdapter.Fill(this.myDS.tbl_cars);
            // TODO: This line of code loads data into the 'myDS.tbl_claims' table. You can move, or remove it, as needed.
            this.tbl_claimsTableAdapter.Fill(this.myDS.tbl_claims);
            // TODO: This line of code loads data into the 'myDS.tbl_cars' table. You can move, or remove it, as needed.
         
        }

        private void tbl_claimsBindingNavigatorSaveItem_Click(object sender, EventArgs e)
        {
            this.Validate();
            this.tbl_claimsBindingSource.EndEdit();
            this.tableAdapterManager.UpdateAll(this.myDS);

        }
    }
}
