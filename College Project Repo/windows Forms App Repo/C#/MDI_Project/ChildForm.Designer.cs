namespace MDI_Project
{
    partial class ChildForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            displayPictureBox = new PictureBox();
            ((System.ComponentModel.ISupportInitialize)displayPictureBox).BeginInit();
            SuspendLayout();
            // 
            // displayPictureBox
            // 
            displayPictureBox.Location = new Point(2, 12);
            displayPictureBox.Name = "displayPictureBox";
            displayPictureBox.Size = new Size(420, 240);
            displayPictureBox.SizeMode = PictureBoxSizeMode.Zoom;
            displayPictureBox.TabIndex = 0;
            displayPictureBox.TabStop = false;
            // 
            // ChildForm
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(434, 261);
            Controls.Add(displayPictureBox);
            Name = "ChildForm";
            Text = "ChildForm";
          
            ((System.ComponentModel.ISupportInitialize)displayPictureBox).EndInit();
            ResumeLayout(false);
        }

        #endregion

        private PictureBox displayPictureBox;
    }
}