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
    public partial class ChildForm : Form
    {
        public ChildForm(string title, string resourceName)
        {
            InitializeComponent();
            Text = title;
            displayPictureBox.Image = (Image)(Properties.Resources.ResourceManager.GetObject(resourceName));
        }

       
    }
}
