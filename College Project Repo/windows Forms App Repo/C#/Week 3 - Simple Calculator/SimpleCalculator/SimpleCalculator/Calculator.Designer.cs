namespace SimpleCalculator
{
    partial class Calculator
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Calculator));
            this.calcPicture = new System.Windows.Forms.PictureBox();
            this.result = new System.Windows.Forms.TextBox();
            this.lbl_result = new System.Windows.Forms.Label();
            this.btn_1 = new System.Windows.Forms.Button();
            this.btn_2 = new System.Windows.Forms.Button();
            this.btn_3 = new System.Windows.Forms.Button();
            this.btn_4 = new System.Windows.Forms.Button();
            this.btn_5 = new System.Windows.Forms.Button();
            this.btn_6 = new System.Windows.Forms.Button();
            this.btn_7 = new System.Windows.Forms.Button();
            this.btn_8 = new System.Windows.Forms.Button();
            this.btn_9 = new System.Windows.Forms.Button();
            this.btn_0 = new System.Windows.Forms.Button();
            this.btn_clear = new System.Windows.Forms.Button();
            this.btn_dot = new System.Windows.Forms.Button();
            this.lbl_op = new System.Windows.Forms.Label();
            this.btn_add = new System.Windows.Forms.Button();
            this.btn_subtract = new System.Windows.Forms.Button();
            this.btn_multiply = new System.Windows.Forms.Button();
            this.btn_divide = new System.Windows.Forms.Button();
            this.calculatorChoice = new System.Windows.Forms.Panel();
            this.rbtn_scientific = new System.Windows.Forms.RadioButton();
            this.rbtn_simple = new System.Windows.Forms.RadioButton();
            this.btn_equal = new System.Windows.Forms.Button();
            this.grpBox_scientific = new System.Windows.Forms.GroupBox();
            this.power = new System.Windows.Forms.RadioButton();
            this.squareRoot = new System.Windows.Forms.RadioButton();
            this.sin = new System.Windows.Forms.RadioButton();
            this.cos = new System.Windows.Forms.RadioButton();
            this.grpBox_design = new System.Windows.Forms.GroupBox();
            this.fontColor = new System.Windows.Forms.CheckBox();
            this.backColor = new System.Windows.Forms.CheckBox();
            ((System.ComponentModel.ISupportInitialize)(this.calcPicture)).BeginInit();
            this.calculatorChoice.SuspendLayout();
            this.grpBox_scientific.SuspendLayout();
            this.grpBox_design.SuspendLayout();
            this.SuspendLayout();
            // 
            // calcPicture
            // 
            this.calcPicture.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.calcPicture.Image = ((System.Drawing.Image)(resources.GetObject("calcPicture.Image")));
            this.calcPicture.InitialImage = null;
            this.calcPicture.Location = new System.Drawing.Point(194, 12);
            this.calcPicture.Name = "calcPicture";
            this.calcPicture.Size = new System.Drawing.Size(120, 120);
            this.calcPicture.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom;
            this.calcPicture.TabIndex = 0;
            this.calcPicture.TabStop = false;
            // 
            // result
            // 
            this.result.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.result.BackColor = System.Drawing.SystemColors.ControlLight;
            this.result.Enabled = false;
            this.result.Location = new System.Drawing.Point(14, 140);
            this.result.Name = "result";
            this.result.Size = new System.Drawing.Size(300, 22);
            this.result.TabIndex = 1;
            // 
            // lbl_result
            // 
            this.lbl_result.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.lbl_result.AutoSize = true;
            this.lbl_result.Location = new System.Drawing.Point(12, 116);
            this.lbl_result.Name = "lbl_result";
            this.lbl_result.Size = new System.Drawing.Size(43, 15);
            this.lbl_result.TabIndex = 2;
            this.lbl_result.Text = "Result";
            // 
            // btn_1
            // 
            this.btn_1.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_1.Location = new System.Drawing.Point(14, 179);
            this.btn_1.Name = "btn_1";
            this.btn_1.Size = new System.Drawing.Size(50, 25);
            this.btn_1.TabIndex = 3;
            this.btn_1.Text = "1";
            this.btn_1.UseVisualStyleBackColor = true;
            
            // 
            // btn_2
            // 
            this.btn_2.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_2.Location = new System.Drawing.Point(70, 180);
            this.btn_2.Name = "btn_2";
            this.btn_2.Size = new System.Drawing.Size(50, 25);
            this.btn_2.TabIndex = 4;
            this.btn_2.Text = "2";
            this.btn_2.UseVisualStyleBackColor = true;
            // 
            // btn_3
            // 
            this.btn_3.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_3.Location = new System.Drawing.Point(126, 179);
            this.btn_3.Name = "btn_3";
            this.btn_3.Size = new System.Drawing.Size(50, 25);
            this.btn_3.TabIndex = 5;
            this.btn_3.Text = "3";
            this.btn_3.UseVisualStyleBackColor = true;
            // 
            // btn_4
            // 
            this.btn_4.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_4.Location = new System.Drawing.Point(14, 211);
            this.btn_4.Name = "btn_4";
            this.btn_4.Size = new System.Drawing.Size(50, 25);
            this.btn_4.TabIndex = 6;
            this.btn_4.Text = "4";
            this.btn_4.UseVisualStyleBackColor = true;
            // 
            // btn_5
            // 
            this.btn_5.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_5.Location = new System.Drawing.Point(70, 211);
            this.btn_5.Name = "btn_5";
            this.btn_5.Size = new System.Drawing.Size(50, 25);
            this.btn_5.TabIndex = 7;
            this.btn_5.Text = "5";
            this.btn_5.UseVisualStyleBackColor = true;
            // 
            // btn_6
            // 
            this.btn_6.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_6.Location = new System.Drawing.Point(126, 212);
            this.btn_6.Name = "btn_6";
            this.btn_6.Size = new System.Drawing.Size(50, 25);
            this.btn_6.TabIndex = 8;
            this.btn_6.Text = "6";
            this.btn_6.UseVisualStyleBackColor = true;
            // 
            // btn_7
            // 
            this.btn_7.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_7.Location = new System.Drawing.Point(14, 243);
            this.btn_7.Name = "btn_7";
            this.btn_7.Size = new System.Drawing.Size(50, 25);
            this.btn_7.TabIndex = 9;
            this.btn_7.Text = "7";
            this.btn_7.UseVisualStyleBackColor = true;
            // 
            // btn_8
            // 
            this.btn_8.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_8.Location = new System.Drawing.Point(70, 243);
            this.btn_8.Name = "btn_8";
            this.btn_8.Size = new System.Drawing.Size(50, 25);
            this.btn_8.TabIndex = 10;
            this.btn_8.Text = "8";
            this.btn_8.UseVisualStyleBackColor = true;
            // 
            // btn_9
            // 
            this.btn_9.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_9.Location = new System.Drawing.Point(126, 243);
            this.btn_9.Name = "btn_9";
            this.btn_9.Size = new System.Drawing.Size(50, 25);
            this.btn_9.TabIndex = 11;
            this.btn_9.Text = "9";
            this.btn_9.UseVisualStyleBackColor = true;
            // 
            // btn_0
            // 
            this.btn_0.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_0.Location = new System.Drawing.Point(70, 274);
            this.btn_0.Name = "btn_0";
            this.btn_0.Size = new System.Drawing.Size(50, 25);
            this.btn_0.TabIndex = 12;
            this.btn_0.Text = "0";
            this.btn_0.UseVisualStyleBackColor = true;
            // 
            // btn_clear
            // 
            this.btn_clear.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_clear.Location = new System.Drawing.Point(14, 275);
            this.btn_clear.Name = "btn_clear";
            this.btn_clear.Size = new System.Drawing.Size(50, 25);
            this.btn_clear.TabIndex = 13;
            this.btn_clear.Text = "C";
            this.btn_clear.UseVisualStyleBackColor = true;
            this.btn_clear.Click += new System.EventHandler(this.btn_clear_Click);
            // 
            // btn_dot
            // 
            this.btn_dot.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_dot.Location = new System.Drawing.Point(126, 274);
            this.btn_dot.Name = "btn_dot";
            this.btn_dot.Size = new System.Drawing.Size(50, 25);
            this.btn_dot.TabIndex = 14;
            this.btn_dot.Text = ".";
            this.btn_dot.UseVisualStyleBackColor = true;
           
            // 
            // lbl_op
            // 
            this.lbl_op.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.lbl_op.AutoSize = true;
            this.lbl_op.Location = new System.Drawing.Point(205, 179);
            this.lbl_op.Name = "lbl_op";
            this.lbl_op.Size = new System.Drawing.Size(98, 15);
            this.lbl_op.TabIndex = 15;
            this.lbl_op.Text = "Simple Operator";
            // 
            // btn_add
            // 
            this.btn_add.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_add.Location = new System.Drawing.Point(208, 212);
            this.btn_add.Name = "btn_add";
            this.btn_add.Size = new System.Drawing.Size(50, 25);
            this.btn_add.TabIndex = 16;
            this.btn_add.Text = "+";
            this.btn_add.UseVisualStyleBackColor = true;
            this.btn_add.Click += new System.EventHandler(this.btn_add_Click);
            // 
            // btn_subtract
            // 
            this.btn_subtract.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_subtract.Location = new System.Drawing.Point(264, 212);
            this.btn_subtract.Name = "btn_subtract";
            this.btn_subtract.Size = new System.Drawing.Size(50, 25);
            this.btn_subtract.TabIndex = 17;
            this.btn_subtract.Text = "-";
            this.btn_subtract.UseVisualStyleBackColor = true;
            this.btn_subtract.Click += new System.EventHandler(this.btn_subtract_Click);
            // 
            // btn_multiply
            // 
            this.btn_multiply.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_multiply.Location = new System.Drawing.Point(208, 243);
            this.btn_multiply.Name = "btn_multiply";
            this.btn_multiply.Size = new System.Drawing.Size(50, 25);
            this.btn_multiply.TabIndex = 18;
            this.btn_multiply.Text = "*";
            this.btn_multiply.UseVisualStyleBackColor = true;
            this.btn_multiply.Click += new System.EventHandler(this.btn_multiply_Click);
            // 
            // btn_divide
            // 
            this.btn_divide.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_divide.Location = new System.Drawing.Point(264, 243);
            this.btn_divide.Name = "btn_divide";
            this.btn_divide.Size = new System.Drawing.Size(50, 25);
            this.btn_divide.TabIndex = 19;
            this.btn_divide.Text = "/";
            this.btn_divide.UseVisualStyleBackColor = true;
            this.btn_divide.Click += new System.EventHandler(this.btn_divide_Click);
            // 
            // calculatorChoice
            // 
            this.calculatorChoice.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D;
            this.calculatorChoice.Controls.Add(this.rbtn_scientific);
            this.calculatorChoice.Controls.Add(this.rbtn_simple);
            this.calculatorChoice.Location = new System.Drawing.Point(14, 12);
            this.calculatorChoice.Name = "calculatorChoice";
            this.calculatorChoice.Size = new System.Drawing.Size(94, 80);
            this.calculatorChoice.TabIndex = 20;
            // 
            // rbtn_scientific
            // 
            this.rbtn_scientific.AutoSize = true;
            this.rbtn_scientific.Location = new System.Drawing.Point(6, 50);
            this.rbtn_scientific.Name = "rbtn_scientific";
            this.rbtn_scientific.Size = new System.Drawing.Size(78, 19);
            this.rbtn_scientific.TabIndex = 1;
            this.rbtn_scientific.TabStop = true;
            this.rbtn_scientific.Text = "Scientific";
            this.rbtn_scientific.UseVisualStyleBackColor = true;
            this.rbtn_scientific.CheckedChanged += new System.EventHandler(this.rbtn_scientific_CheckedChanged);
            // 
            // rbtn_simple
            // 
            this.rbtn_simple.AutoSize = true;
            this.rbtn_simple.Checked = true;
            this.rbtn_simple.Location = new System.Drawing.Point(6, 14);
            this.rbtn_simple.Name = "rbtn_simple";
            this.rbtn_simple.Size = new System.Drawing.Size(63, 19);
            this.rbtn_simple.TabIndex = 0;
            this.rbtn_simple.TabStop = true;
            this.rbtn_simple.Text = "Simple";
            this.rbtn_simple.UseVisualStyleBackColor = true;
            this.rbtn_simple.CheckedChanged += new System.EventHandler(this.rbtn_simple_CheckedChanged);
            // 
            // btn_equal
            // 
            this.btn_equal.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_equal.Location = new System.Drawing.Point(208, 274);
            this.btn_equal.Name = "btn_equal";
            this.btn_equal.Size = new System.Drawing.Size(106, 23);
            this.btn_equal.TabIndex = 21;
            this.btn_equal.Text = "=";
            this.btn_equal.UseVisualStyleBackColor = true;
            this.btn_equal.Click += new System.EventHandler(this.btn_equal_Click);
            // 
            // grpBox_scientific
            // 
            this.grpBox_scientific.Controls.Add(this.power);
            this.grpBox_scientific.Controls.Add(this.squareRoot);
            this.grpBox_scientific.Controls.Add(this.sin);
            this.grpBox_scientific.Controls.Add(this.cos);
            this.grpBox_scientific.Location = new System.Drawing.Point(15, 307);
            this.grpBox_scientific.Name = "grpBox_scientific";
            this.grpBox_scientific.Size = new System.Drawing.Size(299, 47);
            this.grpBox_scientific.TabIndex = 22;
            this.grpBox_scientific.TabStop = false;
            this.grpBox_scientific.Text = "Scientific";
            this.grpBox_scientific.Visible = false;
            // 
            // power
            // 
            this.power.AutoSize = true;
            this.power.Location = new System.Drawing.Point(231, 22);
            this.power.Name = "power";
            this.power.Size = new System.Drawing.Size(57, 19);
            this.power.TabIndex = 3;
            this.power.TabStop = true;
            this.power.Text = "power";
            this.power.UseVisualStyleBackColor = true;
            this.power.CheckedChanged += new System.EventHandler(this.power_CheckedChanged);
            // 
            // squareRoot
            // 
            this.squareRoot.AutoSize = true;
            this.squareRoot.Location = new System.Drawing.Point(151, 22);
            this.squareRoot.Name = "squareRoot";
            this.squareRoot.Size = new System.Drawing.Size(47, 19);
            this.squareRoot.TabIndex = 2;
            this.squareRoot.TabStop = true;
            this.squareRoot.Text = "sqrt";
            this.squareRoot.UseVisualStyleBackColor = true;
            this.squareRoot.CheckedChanged += new System.EventHandler(this.squareRoot_CheckedChanged);
            // 
            // sin
            // 
            this.sin.AutoSize = true;
            this.sin.Location = new System.Drawing.Point(72, 22);
            this.sin.Name = "sin";
            this.sin.Size = new System.Drawing.Size(42, 19);
            this.sin.TabIndex = 1;
            this.sin.TabStop = true;
            this.sin.Text = "sin";
            this.sin.UseVisualStyleBackColor = true;
            this.sin.CheckedChanged += new System.EventHandler(this.sin_CheckedChanged);
            // 
            // cos
            // 
            this.cos.AutoSize = true;
            this.cos.Location = new System.Drawing.Point(6, 22);
            this.cos.Name = "cos";
            this.cos.Size = new System.Drawing.Size(43, 19);
            this.cos.TabIndex = 0;
            this.cos.TabStop = true;
            this.cos.Text = "cos";
            this.cos.UseVisualStyleBackColor = true;
            this.cos.CheckedChanged += new System.EventHandler(this.cos_CheckedChanged);
            // 
            // grpBox_design
            // 
            this.grpBox_design.Controls.Add(this.fontColor);
            this.grpBox_design.Controls.Add(this.backColor);
            this.grpBox_design.Location = new System.Drawing.Point(15, 360);
            this.grpBox_design.Name = "grpBox_design";
            this.grpBox_design.Size = new System.Drawing.Size(299, 40);
            this.grpBox_design.TabIndex = 23;
            this.grpBox_design.TabStop = false;
            this.grpBox_design.Text = "Change Design";
            // 
            // fontColor
            // 
            this.fontColor.AutoSize = true;
            this.fontColor.Location = new System.Drawing.Point(151, 15);
            this.fontColor.Name = "fontColor";
            this.fontColor.Size = new System.Drawing.Size(84, 19);
            this.fontColor.TabIndex = 1;
            this.fontColor.Text = "Font Color";
            this.fontColor.UseVisualStyleBackColor = true;
            this.fontColor.CheckedChanged += new System.EventHandler(this.fontColor_CheckedChanged);
            // 
            // backColor
            // 
            this.backColor.AutoSize = true;
            this.backColor.Location = new System.Drawing.Point(6, 16);
            this.backColor.Name = "backColor";
            this.backColor.Size = new System.Drawing.Size(128, 19);
            this.backColor.TabIndex = 0;
            this.backColor.Text = "Background Color";
            this.backColor.UseVisualStyleBackColor = true;
            this.backColor.CheckedChanged += new System.EventHandler(this.backColor_CheckedChanged);
            // 
            // Calculator
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(7F, 15F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.Gray;
            this.ClientSize = new System.Drawing.Size(334, 407);
            this.Controls.Add(this.grpBox_design);
            this.Controls.Add(this.grpBox_scientific);
            this.Controls.Add(this.btn_equal);
            this.Controls.Add(this.calculatorChoice);
            this.Controls.Add(this.btn_divide);
            this.Controls.Add(this.btn_multiply);
            this.Controls.Add(this.btn_subtract);
            this.Controls.Add(this.btn_add);
            this.Controls.Add(this.lbl_op);
            this.Controls.Add(this.btn_dot);
            this.Controls.Add(this.btn_clear);
            this.Controls.Add(this.btn_0);
            this.Controls.Add(this.btn_9);
            this.Controls.Add(this.btn_8);
            this.Controls.Add(this.btn_7);
            this.Controls.Add(this.btn_6);
            this.Controls.Add(this.btn_5);
            this.Controls.Add(this.btn_4);
            this.Controls.Add(this.btn_3);
            this.Controls.Add(this.btn_2);
            this.Controls.Add(this.btn_1);
            this.Controls.Add(this.lbl_result);
            this.Controls.Add(this.result);
            this.Controls.Add(this.calcPicture);
            this.Font = new System.Drawing.Font("Times New Roman", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.MaximizeBox = false;
            this.Name = "Calculator";
            this.Text = "Calculator";
            this.Load += new System.EventHandler(this.Calculator_Load);
            ((System.ComponentModel.ISupportInitialize)(this.calcPicture)).EndInit();
            this.calculatorChoice.ResumeLayout(false);
            this.calculatorChoice.PerformLayout();
            this.grpBox_scientific.ResumeLayout(false);
            this.grpBox_scientific.PerformLayout();
            this.grpBox_design.ResumeLayout(false);
            this.grpBox_design.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.PictureBox calcPicture;
        private System.Windows.Forms.TextBox result;
        private System.Windows.Forms.Label lbl_result;
        private System.Windows.Forms.Button btn_1;
        private System.Windows.Forms.Button btn_2;
        private System.Windows.Forms.Button btn_3;
        private System.Windows.Forms.Button btn_4;
        private System.Windows.Forms.Button btn_5;
        private System.Windows.Forms.Button btn_6;
        private System.Windows.Forms.Button btn_7;
        private System.Windows.Forms.Button btn_8;
        private System.Windows.Forms.Button btn_9;
        private System.Windows.Forms.Button btn_0;
        private System.Windows.Forms.Button btn_clear;
        private System.Windows.Forms.Button btn_dot;
        private System.Windows.Forms.Label lbl_op;
        private System.Windows.Forms.Button btn_add;
        private System.Windows.Forms.Button btn_subtract;
        private System.Windows.Forms.Button btn_multiply;
        private System.Windows.Forms.Button btn_divide;
        private System.Windows.Forms.Panel calculatorChoice;
        private System.Windows.Forms.RadioButton rbtn_simple;
        private System.Windows.Forms.RadioButton rbtn_scientific;
        private System.Windows.Forms.Button btn_equal;
        private System.Windows.Forms.GroupBox grpBox_scientific;
        private System.Windows.Forms.RadioButton power;
        private System.Windows.Forms.RadioButton squareRoot;
        private System.Windows.Forms.RadioButton sin;
        private System.Windows.Forms.RadioButton cos;
        private System.Windows.Forms.GroupBox grpBox_design;
        private System.Windows.Forms.CheckBox fontColor;
        private System.Windows.Forms.CheckBox backColor;

    }
}

