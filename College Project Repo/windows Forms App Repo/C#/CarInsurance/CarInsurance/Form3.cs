using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;
using System.Configuration;
namespace CarInsurance
{
    public partial class Form3 : Form
    {
        public Form3()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string strcon = ConfigurationManager.ConnectionStrings["carconstr"].ToString();
            SqlConnection con = new SqlConnection(strcon);
            DataTable dt_claims = new DataTable();
            SqlDataAdapter da = new SqlDataAdapter("select * from tbl_claims", con);
            try
            {
                con.Open();
                da.Fill(dt_claims);
                dataGridView1.DataSource = dt_claims;
            }
            catch (Exception)
            {
                
                throw;
            }
        }

        private void Form3_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'myDS.tbl_cars' table. You can move, or remove it, as needed.
            this.tbl_carsTableAdapter.Fill(this.myDS.tbl_cars);
            

        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            string strcon = ConfigurationManager.ConnectionStrings["carconstr"].ToString();
            SqlConnection con = new SqlConnection(strcon);
            DataTable dt_claims = new DataTable();
            SqlCommand cmd = new SqlCommand("select * from tbl_claims where carid=@cid", con);
          //  MessageBox.Show(comboBox1.SelectedValue.ToString());
            cmd.Parameters.AddWithValue("@cid",int.Parse( comboBox1.SelectedValue.ToString()));
            SqlDataAdapter da = new SqlDataAdapter(cmd);
            

            try
           {
               con.Open();
               da.Fill(dt_claims);
               dataGridView1.DataSource = dt_claims;
           }
           catch (Exception)
            {

               // throw;
           }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string strcon = ConfigurationManager.ConnectionStrings["carconstr"].ToString();
            SqlConnection con = new SqlConnection(strcon);
            DataTable dt_claims = new DataTable();
            SqlDataAdapter da = new SqlDataAdapter("select * from tbl_cars", con);
            try
            {
                con.Open();
                da.Fill(dt_claims);
                comboBox1.DataSource = dt_claims;
                comboBox1.ValueMember = "id";
                comboBox1.DisplayMember = "brand";
            }
            catch (Exception)
            {

                throw;
            }
        }
    }
}
