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
    public partial class week4Form : Form
    {
        public week4Form()
        {
            InitializeComponent();
        }
        int size = 5;
        Color color = Color.Black;
        private void rbSize15_CheckedChanged(object sender, EventArgs e)
        {//this event handler is used to handle rbSize5, rbSize10 and rbSize15
            RadioButton rb = sender as RadioButton;
            if (rb.Checked)
                size = Convert.ToInt32(rb.Text); //read the TExt value of the radio button and convert it to int.
        }

        private void rbAqua_CheckedChanged(object sender, EventArgs e)
        {
            //this event handler is used to handle rbBlack, rbRed and rbAqua
            RadioButton rb = sender as RadioButton;
            if (rb.Checked)
                color = Color.FromName(rb.Text); //FromName is a method that accepts a string and converts it to a color if possible
        }
        bool paint;//we need to know when the user click on the mouse and when the button is released
        private void panelPaint_MouseDown(object sender, MouseEventArgs e)
        {
            paint = true;
        }

        private void panelPaint_MouseUp(object sender, MouseEventArgs e)
        {
            paint = false;
        }

        private void panelPaint_MouseMove(object sender, MouseEventArgs e)
        {
            //the work to be done is on mouse move if the button was pressed --> if paint is true
            if (paint)
            {
                using (Graphics g = panelPaint.CreateGraphics())
                {
                    //Solid brush color--> picked by the user
                    //e.X, e.Y the point where the user clicked on the panel.
                    //4th parameter: size is the width
                    //5th parameter: size is the height
                    //since ellipse has same width and height--> becomes a circle
                    g.FillEllipse(new SolidBrush(color), e.X, e.Y, size, size);
                }

            }
        }

    }
}
