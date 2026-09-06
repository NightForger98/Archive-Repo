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
    public partial class Form4 : Form
    {
        public Form4()
        {
            InitializeComponent();
        }

        private void Form4_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'myDS.tbl_cars' table. You can move, or remove it, as needed.
            this.tbl_carsTableAdapter.Fill(this.myDS.tbl_cars);

        }

        private void button1_Click(object sender, EventArgs e)
        {/*
            DataTable dt_claims = new DataTable();
            SqlCommand cmd = new SqlCommand("select * from tbl_claims where carid=@cid", con);
            //  MessageBox.Show(comboBox1.SelectedValue.ToString());
            cmd.Parameters.AddWithValue("@cid", int.Parse(comboBox1.SelectedValue.ToString()));
            SqlDataAdapter da = new SqlDataAdapter(cmd);*/

            myDSTableAdapters.tbl_claimsTableAdapter da = new myDSTableAdapters.tbl_claimsTableAdapter();
            da.FillByCarid(myDS.tbl_claims,int.Parse( comboBox1.SelectedValue.ToString()));
            dataGridView1.DataSource = myDS.tbl_claims;
        }
    }
}
