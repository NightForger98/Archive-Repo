using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
//
using System.Data.SqlClient;

namespace CarInsurance
{
    public partial class Form1 : Form
    {
        static string constr = "Data Source=.;Initial Catalog=carInsurance;Integrated Security=True";
        SqlConnection con = new SqlConnection(constr);

        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            SqlCommand cmd = new SqlCommand("INSERT INTO [tbl_cars] VALUES (@id,@brand,@model,@year,@price)");
            cmd.Parameters.AddWithValue("@id",textBox1.Text);
            cmd.Parameters.AddWithValue("@brand",textBox2.Text);
            cmd.Parameters.AddWithValue("@model",textBox3.Text);
            cmd.Parameters.AddWithValue("@year",textBox4.Text);
            cmd.Parameters.AddWithValue("@price", textBox5.Text);

            try
            {
                cmd.Connection = con;
                //open the connection
                con.Open();
                cmd.ExecuteNonQuery();
                MessageBox.Show("Car insereted");
                this.tbl_carsTableAdapter.Fill(this.carInsuranceDataSet.tbl_cars);

            }
            catch (Exception x)
            {
                MessageBox.Show(x.Message);

            }
            finally { con.Close(); }

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'carInsuranceDataSet.tbl_cars' table. You can move, or remove it, as needed.
            this.tbl_carsTableAdapter.Fill(this.carInsuranceDataSet.tbl_cars);

        }

        private void button2_Click(object sender, EventArgs e)
        {
            SqlCommand cmd = new SqlCommand("delete [tbl_cars] where id=@id");
            cmd.Parameters.AddWithValue("@id", comboBox1.Text);
            

            try
            {
                cmd.Connection = con;
                //open the connection
                con.Open();
                cmd.ExecuteNonQuery();
                MessageBox.Show("Car Deleted");
                this.tbl_carsTableAdapter.Fill(this.carInsuranceDataSet.tbl_cars);

            }
            catch (Exception x)
            {
                MessageBox.Show(x.Message);

            }
            finally { con.Close(); }

        }
    }
}
