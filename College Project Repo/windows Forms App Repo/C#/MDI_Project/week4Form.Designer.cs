namespace MDI_Project
{
    partial class week4Form
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
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.rbSize5 = new System.Windows.Forms.RadioButton();
            this.rbSize10 = new System.Windows.Forms.RadioButton();
            this.rbSize15 = new System.Windows.Forms.RadioButton();
            this.groupBox2 = new System.Windows.Forms.GroupBox();
            this.rbAqua = new System.Windows.Forms.RadioButton();
            this.rbRed = new System.Windows.Forms.RadioButton();
            this.rbBlack = new System.Windows.Forms.RadioButton();
            this.panelPaint = new System.Windows.Forms.Panel();
            this.groupBox1.SuspendLayout();
            this.groupBox2.SuspendLayout();
            this.SuspendLayout();
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.rbSize15);
            this.groupBox1.Controls.Add(this.rbSize10);
            this.groupBox1.Controls.Add(this.rbSize5);
            this.groupBox1.Location = new System.Drawing.Point(0, 0);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(154, 61);
            this.groupBox1.TabIndex = 0;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Brush Size";
            // 
            // rbSize5
            // 
            this.rbSize5.AutoSize = true;
            this.rbSize5.Checked = true;
            this.rbSize5.Location = new System.Drawing.Point(12, 19);
            this.rbSize5.Name = "rbSize5";
            this.rbSize5.Size = new System.Drawing.Size(31, 17);
            this.rbSize5.TabIndex = 0;
            this.rbSize5.TabStop = true;
            this.rbSize5.Text = "5";
            this.rbSize5.UseVisualStyleBackColor = true;
            this.rbSize5.CheckedChanged += new System.EventHandler(this.rbSize15_CheckedChanged);
            // 
            // rbSize10
            // 
            this.rbSize10.AutoSize = true;
            this.rbSize10.Location = new System.Drawing.Point(58, 19);
            this.rbSize10.Name = "rbSize10";
            this.rbSize10.Size = new System.Drawing.Size(37, 17);
            this.rbSize10.TabIndex = 1;
            this.rbSize10.Text = "10";
            this.rbSize10.UseVisualStyleBackColor = true;
            this.rbSize10.CheckedChanged += new System.EventHandler(this.rbSize15_CheckedChanged);
            // 
            // rbSize15
            // 
            this.rbSize15.AutoSize = true;
            this.rbSize15.Location = new System.Drawing.Point(101, 19);
            this.rbSize15.Name = "rbSize15";
            this.rbSize15.Size = new System.Drawing.Size(37, 17);
            this.rbSize15.TabIndex = 2;
            this.rbSize15.Text = "15";
            this.rbSize15.UseVisualStyleBackColor = true;
            this.rbSize15.CheckedChanged += new System.EventHandler(this.rbSize15_CheckedChanged);
            // 
            // groupBox2
            // 
            this.groupBox2.Controls.Add(this.rbAqua);
            this.groupBox2.Controls.Add(this.rbRed);
            this.groupBox2.Controls.Add(this.rbBlack);
            this.groupBox2.Location = new System.Drawing.Point(160, 0);
            this.groupBox2.Name = "groupBox2";
            this.groupBox2.Size = new System.Drawing.Size(200, 61);
            this.groupBox2.TabIndex = 3;
            this.groupBox2.TabStop = false;
            this.groupBox2.Text = "Brush Color";
            // 
            // rbAqua
            // 
            this.rbAqua.AutoSize = true;
            this.rbAqua.Location = new System.Drawing.Point(144, 19);
            this.rbAqua.Name = "rbAqua";
            this.rbAqua.Size = new System.Drawing.Size(50, 17);
            this.rbAqua.TabIndex = 2;
            this.rbAqua.Text = "Aqua";
            this.rbAqua.UseVisualStyleBackColor = true;
            this.rbAqua.CheckedChanged += new System.EventHandler(this.rbAqua_CheckedChanged);
            // 
            // rbRed
            // 
            this.rbRed.AutoSize = true;
            this.rbRed.Location = new System.Drawing.Point(79, 19);
            this.rbRed.Name = "rbRed";
            this.rbRed.Size = new System.Drawing.Size(45, 17);
            this.rbRed.TabIndex = 1;
            this.rbRed.Text = "Red";
            this.rbRed.UseVisualStyleBackColor = true;
            this.rbRed.CheckedChanged += new System.EventHandler(this.rbAqua_CheckedChanged);
            // 
            // rbBlack
            // 
            this.rbBlack.AutoSize = true;
            this.rbBlack.Checked = true;
            this.rbBlack.Location = new System.Drawing.Point(12, 19);
            this.rbBlack.Name = "rbBlack";
            this.rbBlack.Size = new System.Drawing.Size(52, 17);
            this.rbBlack.TabIndex = 0;
            this.rbBlack.TabStop = true;
            this.rbBlack.Text = "Black";
            this.rbBlack.UseVisualStyleBackColor = true;
            this.rbBlack.CheckedChanged += new System.EventHandler(this.rbAqua_CheckedChanged);
            // 
            // panelPaint
            // 
            this.panelPaint.BackColor = System.Drawing.Color.White;
            this.panelPaint.Location = new System.Drawing.Point(12, 79);
            this.panelPaint.Name = "panelPaint";
            this.panelPaint.Size = new System.Drawing.Size(348, 259);
            this.panelPaint.TabIndex = 4;
            this.panelPaint.MouseDown += new System.Windows.Forms.MouseEventHandler(this.panelPaint_MouseDown);
            this.panelPaint.MouseMove += new System.Windows.Forms.MouseEventHandler(this.panelPaint_MouseMove);
            this.panelPaint.MouseUp += new System.Windows.Forms.MouseEventHandler(this.panelPaint_MouseUp);
            // 
            // frmPaint
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(380, 350);
            this.Controls.Add(this.panelPaint);
            this.Controls.Add(this.groupBox2);
            this.Controls.Add(this.groupBox1);
            this.Name = "frmPaint";
            this.Text = "Paint";
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.groupBox2.ResumeLayout(false);
            this.groupBox2.PerformLayout();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.RadioButton rbSize15;
        private System.Windows.Forms.RadioButton rbSize10;
        private System.Windows.Forms.RadioButton rbSize5;
        private System.Windows.Forms.GroupBox groupBox2;
        private System.Windows.Forms.RadioButton rbAqua;
        private System.Windows.Forms.RadioButton rbRed;
        private System.Windows.Forms.RadioButton rbBlack;
        private System.Windows.Forms.Panel panelPaint;
    }
}