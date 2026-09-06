using week_8_linq;
using WindowsFormsApplication2;

namespace MDI_Project
{
    public partial class UsingMDIForms : Form
    {
        public UsingMDIForms()
        {
            InitializeComponent();
        }

        private void itachiToolStripMenuItem_Click(object sender, EventArgs e)
        {
            ChildForm child = new ChildForm("Itachi", "itachi");
            child.MdiParent = this;
            child.Show();
        }

        private void assWholeToolStripMenuItem_Click(object sender, EventArgs e)
        {
            ChildForm child = new ChildForm("SpriteSheet", "hyptosis_sprites-and-tiles-for-you");
            child.MdiParent = this;
            child.Show();

        }

        private void assPartToolStripMenuItem_Click(object sender, EventArgs e)
        {
            ChildForm child = new ChildForm("SpritePart", "Capture");
            child.MdiParent = this;
            child.Show();
        }

        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void caToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.LayoutMdi(MdiLayout.Cascade);
        }

        private void tileHorizontalToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.LayoutMdi(MdiLayout.TileHorizontal);
        }

        private void tileVerticalToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.LayoutMdi(MdiLayout.TileVertical);
        }

        private void arrangeIconsToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.LayoutMdi(MdiLayout.ArrangeIcons);
        }

        private void UsingMDIForms_Load(object sender, EventArgs e)
        {
            menuStrip1.MdiWindowListItem = windowToolStripMenuItem;
        }

        private void week3ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Calculator child = new Calculator();
            child.MdiParent = this;
            child.Show();
        }

        private void week4ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            week4Form child = new week4Form();
            child.MdiParent = this;
            child.Show();
        }

        private void week5ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            week5Form child = new week5Form();
            child.MdiParent = this;
            child.Show();

        }

        private void sampleToolStripMenuItem_Click(object sender, EventArgs e)
        {
            week6Form child = new week6Form();
            child.MdiParent = this;
            child.Show();
        }

        private void week7ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            week7Form child = new week7Form();
            child.MdiParent = this;
            child.Show();

        }

        private void week8ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmLinqInteger child = new frmLinqInteger();
            child.MdiParent = this;
            child.Show();
        }
    }
}
