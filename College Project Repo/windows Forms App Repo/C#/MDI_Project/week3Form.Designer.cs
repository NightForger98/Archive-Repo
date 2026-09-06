namespace MDI_Project
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
            calcPicture = new PictureBox();
            result = new TextBox();
            lbl_result = new Label();
            btn_1 = new Button();
            btn_2 = new Button();
            btn_3 = new Button();
            btn_4 = new Button();
            btn_5 = new Button();
            btn_6 = new Button();
            btn_7 = new Button();
            btn_8 = new Button();
            btn_9 = new Button();
            btn_0 = new Button();
            btn_clear = new Button();
            btn_dot = new Button();
            lbl_op = new Label();
            btn_add = new Button();
            btn_subtract = new Button();
            btn_multiply = new Button();
            btn_divide = new Button();
            calculatorChoice = new Panel();
            rbtn_scientific = new RadioButton();
            rbtn_simple = new RadioButton();
            btn_equal = new Button();
            grpBox_scientific = new GroupBox();
            power = new RadioButton();
            squareRoot = new RadioButton();
            sin = new RadioButton();
            cos = new RadioButton();
            grpBox_design = new GroupBox();
            fontColor = new CheckBox();
            backColor = new CheckBox();
            ((System.ComponentModel.ISupportInitialize)calcPicture).BeginInit();
            calculatorChoice.SuspendLayout();
            grpBox_scientific.SuspendLayout();
            grpBox_design.SuspendLayout();
            SuspendLayout();
            // 
            // calcPicture
            // 
            calcPicture.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            calcPicture.InitialImage = null;
            calcPicture.Location = new Point(194, 12);
            calcPicture.Name = "calcPicture";
            calcPicture.Size = new Size(120, 120);
            calcPicture.SizeMode = PictureBoxSizeMode.Zoom;
            calcPicture.TabIndex = 0;
            calcPicture.TabStop = false;
            // 
            // result
            // 
            result.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            result.BackColor = SystemColors.ControlLight;
            result.Enabled = false;
            result.Location = new Point(14, 140);
            result.Name = "result";
            result.Size = new Size(300, 22);
            result.TabIndex = 1;
            // 
            // lbl_result
            // 
            lbl_result.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            lbl_result.AutoSize = true;
            lbl_result.Location = new Point(12, 116);
            lbl_result.Name = "lbl_result";
            lbl_result.Size = new Size(43, 15);
            lbl_result.TabIndex = 2;
            lbl_result.Text = "Result";
            // 
            // btn_1
            // 
            btn_1.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_1.Location = new Point(14, 179);
            btn_1.Name = "btn_1";
            btn_1.Size = new Size(50, 25);
            btn_1.TabIndex = 3;
            btn_1.Text = "1";
            btn_1.UseVisualStyleBackColor = true;
            // 
            // btn_2
            // 
            btn_2.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_2.Location = new Point(70, 180);
            btn_2.Name = "btn_2";
            btn_2.Size = new Size(50, 25);
            btn_2.TabIndex = 4;
            btn_2.Text = "2";
            btn_2.UseVisualStyleBackColor = true;
            // 
            // btn_3
            // 
            btn_3.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_3.Location = new Point(126, 179);
            btn_3.Name = "btn_3";
            btn_3.Size = new Size(50, 25);
            btn_3.TabIndex = 5;
            btn_3.Text = "3";
            btn_3.UseVisualStyleBackColor = true;
            // 
            // btn_4
            // 
            btn_4.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_4.Location = new Point(14, 211);
            btn_4.Name = "btn_4";
            btn_4.Size = new Size(50, 25);
            btn_4.TabIndex = 6;
            btn_4.Text = "4";
            btn_4.UseVisualStyleBackColor = true;
            // 
            // btn_5
            // 
            btn_5.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_5.Location = new Point(70, 211);
            btn_5.Name = "btn_5";
            btn_5.Size = new Size(50, 25);
            btn_5.TabIndex = 7;
            btn_5.Text = "5";
            btn_5.UseVisualStyleBackColor = true;
            // 
            // btn_6
            // 
            btn_6.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_6.Location = new Point(126, 212);
            btn_6.Name = "btn_6";
            btn_6.Size = new Size(50, 25);
            btn_6.TabIndex = 8;
            btn_6.Text = "6";
            btn_6.UseVisualStyleBackColor = true;
            // 
            // btn_7
            // 
            btn_7.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_7.Location = new Point(14, 243);
            btn_7.Name = "btn_7";
            btn_7.Size = new Size(50, 25);
            btn_7.TabIndex = 9;
            btn_7.Text = "7";
            btn_7.UseVisualStyleBackColor = true;
            // 
            // btn_8
            // 
            btn_8.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_8.Location = new Point(70, 243);
            btn_8.Name = "btn_8";
            btn_8.Size = new Size(50, 25);
            btn_8.TabIndex = 10;
            btn_8.Text = "8";
            btn_8.UseVisualStyleBackColor = true;
            // 
            // btn_9
            // 
            btn_9.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_9.Location = new Point(126, 243);
            btn_9.Name = "btn_9";
            btn_9.Size = new Size(50, 25);
            btn_9.TabIndex = 11;
            btn_9.Text = "9";
            btn_9.UseVisualStyleBackColor = true;
            // 
            // btn_0
            // 
            btn_0.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_0.Location = new Point(70, 274);
            btn_0.Name = "btn_0";
            btn_0.Size = new Size(50, 25);
            btn_0.TabIndex = 12;
            btn_0.Text = "0";
            btn_0.UseVisualStyleBackColor = true;
            // 
            // btn_clear
            // 
            btn_clear.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_clear.Location = new Point(14, 275);
            btn_clear.Name = "btn_clear";
            btn_clear.Size = new Size(50, 25);
            btn_clear.TabIndex = 13;
            btn_clear.Text = "C";
            btn_clear.UseVisualStyleBackColor = true;
            btn_clear.Click += btn_clear_Click;
            // 
            // btn_dot
            // 
            btn_dot.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_dot.Location = new Point(126, 274);
            btn_dot.Name = "btn_dot";
            btn_dot.Size = new Size(50, 25);
            btn_dot.TabIndex = 14;
            btn_dot.Text = ".";
            btn_dot.UseVisualStyleBackColor = true;
            // 
            // lbl_op
            // 
            lbl_op.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            lbl_op.AutoSize = true;
            lbl_op.Location = new Point(205, 179);
            lbl_op.Name = "lbl_op";
            lbl_op.Size = new Size(98, 15);
            lbl_op.TabIndex = 15;
            lbl_op.Text = "Simple Operator";
            // 
            // btn_add
            // 
            btn_add.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_add.Location = new Point(208, 212);
            btn_add.Name = "btn_add";
            btn_add.Size = new Size(50, 25);
            btn_add.TabIndex = 16;
            btn_add.Text = "+";
            btn_add.UseVisualStyleBackColor = true;
            btn_add.Click += btn_add_Click;
            // 
            // btn_subtract
            // 
            btn_subtract.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_subtract.Location = new Point(264, 212);
            btn_subtract.Name = "btn_subtract";
            btn_subtract.Size = new Size(50, 25);
            btn_subtract.TabIndex = 17;
            btn_subtract.Text = "-";
            btn_subtract.UseVisualStyleBackColor = true;
            btn_subtract.Click += btn_subtract_Click;
            // 
            // btn_multiply
            // 
            btn_multiply.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_multiply.Location = new Point(208, 243);
            btn_multiply.Name = "btn_multiply";
            btn_multiply.Size = new Size(50, 25);
            btn_multiply.TabIndex = 18;
            btn_multiply.Text = "*";
            btn_multiply.UseVisualStyleBackColor = true;
            btn_multiply.Click += btn_multiply_Click;
            // 
            // btn_divide
            // 
            btn_divide.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_divide.Location = new Point(264, 243);
            btn_divide.Name = "btn_divide";
            btn_divide.Size = new Size(50, 25);
            btn_divide.TabIndex = 19;
            btn_divide.Text = "/";
            btn_divide.UseVisualStyleBackColor = true;
            btn_divide.Click += btn_divide_Click;
            // 
            // calculatorChoice
            // 
            calculatorChoice.BorderStyle = BorderStyle.Fixed3D;
            calculatorChoice.Controls.Add(rbtn_scientific);
            calculatorChoice.Controls.Add(rbtn_simple);
            calculatorChoice.Location = new Point(14, 12);
            calculatorChoice.Name = "calculatorChoice";
            calculatorChoice.Size = new Size(94, 80);
            calculatorChoice.TabIndex = 20;
            calculatorChoice.Paint += calculatorChoice_Paint;
            // 
            // rbtn_scientific
            // 
            rbtn_scientific.AutoSize = true;
            rbtn_scientific.Location = new Point(6, 50);
            rbtn_scientific.Name = "rbtn_scientific";
            rbtn_scientific.Size = new Size(78, 19);
            rbtn_scientific.TabIndex = 1;
            rbtn_scientific.TabStop = true;
            rbtn_scientific.Text = "Scientific";
            rbtn_scientific.UseVisualStyleBackColor = true;
            rbtn_scientific.CheckedChanged += rbtn_scientific_CheckedChanged;
            // 
            // rbtn_simple
            // 
            rbtn_simple.AutoSize = true;
            rbtn_simple.Checked = true;
            rbtn_simple.Location = new Point(6, 14);
            rbtn_simple.Name = "rbtn_simple";
            rbtn_simple.Size = new Size(63, 19);
            rbtn_simple.TabIndex = 0;
            rbtn_simple.TabStop = true;
            rbtn_simple.Text = "Simple";
            rbtn_simple.UseVisualStyleBackColor = true;
            rbtn_simple.CheckedChanged += rbtn_simple_CheckedChanged;
            // 
            // btn_equal
            // 
            btn_equal.Anchor = AnchorStyles.Bottom | AnchorStyles.Right;
            btn_equal.Location = new Point(208, 274);
            btn_equal.Name = "btn_equal";
            btn_equal.Size = new Size(106, 23);
            btn_equal.TabIndex = 21;
            btn_equal.Text = "=";
            btn_equal.UseVisualStyleBackColor = true;
            btn_equal.Click += btn_equal_Click;
            // 
            // grpBox_scientific
            // 
            grpBox_scientific.Controls.Add(power);
            grpBox_scientific.Controls.Add(squareRoot);
            grpBox_scientific.Controls.Add(sin);
            grpBox_scientific.Controls.Add(cos);
            grpBox_scientific.Location = new Point(15, 307);
            grpBox_scientific.Name = "grpBox_scientific";
            grpBox_scientific.Size = new Size(299, 47);
            grpBox_scientific.TabIndex = 22;
            grpBox_scientific.TabStop = false;
            grpBox_scientific.Text = "Scientific";
            grpBox_scientific.Visible = false;
            // 
            // power
            // 
            power.AutoSize = true;
            power.Location = new Point(231, 22);
            power.Name = "power";
            power.Size = new Size(57, 19);
            power.TabIndex = 3;
            power.TabStop = true;
            power.Text = "power";
            power.UseVisualStyleBackColor = true;
            power.CheckedChanged += power_CheckedChanged;
            // 
            // squareRoot
            // 
            squareRoot.AutoSize = true;
            squareRoot.Location = new Point(151, 22);
            squareRoot.Name = "squareRoot";
            squareRoot.Size = new Size(47, 19);
            squareRoot.TabIndex = 2;
            squareRoot.TabStop = true;
            squareRoot.Text = "sqrt";
            squareRoot.UseVisualStyleBackColor = true;
            squareRoot.CheckedChanged += squareRoot_CheckedChanged;
            // 
            // sin
            // 
            sin.AutoSize = true;
            sin.Location = new Point(72, 22);
            sin.Name = "sin";
            sin.Size = new Size(42, 19);
            sin.TabIndex = 1;
            sin.TabStop = true;
            sin.Text = "sin";
            sin.UseVisualStyleBackColor = true;
            sin.CheckedChanged += sin_CheckedChanged;
            // 
            // cos
            // 
            cos.AutoSize = true;
            cos.Location = new Point(6, 22);
            cos.Name = "cos";
            cos.Size = new Size(43, 19);
            cos.TabIndex = 0;
            cos.TabStop = true;
            cos.Text = "cos";
            cos.UseVisualStyleBackColor = true;
            cos.CheckedChanged += cos_CheckedChanged;
            // 
            // grpBox_design
            // 
            grpBox_design.Controls.Add(fontColor);
            grpBox_design.Controls.Add(backColor);
            grpBox_design.Location = new Point(15, 360);
            grpBox_design.Name = "grpBox_design";
            grpBox_design.Size = new Size(299, 40);
            grpBox_design.TabIndex = 23;
            grpBox_design.TabStop = false;
            grpBox_design.Text = "Change Design";
            // 
            // fontColor
            // 
            fontColor.AutoSize = true;
            fontColor.Location = new Point(151, 15);
            fontColor.Name = "fontColor";
            fontColor.Size = new Size(84, 19);
            fontColor.TabIndex = 1;
            fontColor.Text = "Font Color";
            fontColor.UseVisualStyleBackColor = true;
            fontColor.CheckedChanged += fontColor_CheckedChanged;
            // 
            // backColor
            // 
            backColor.AutoSize = true;
            backColor.Location = new Point(6, 16);
            backColor.Name = "backColor";
            backColor.Size = new Size(128, 19);
            backColor.TabIndex = 0;
            backColor.Text = "Background Color";
            backColor.UseVisualStyleBackColor = true;
            backColor.CheckedChanged += backColor_CheckedChanged;
            // 
            // Calculator
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            BackColor = Color.Gray;
            ClientSize = new Size(334, 407);
            Controls.Add(grpBox_design);
            Controls.Add(grpBox_scientific);
            Controls.Add(btn_equal);
            Controls.Add(calculatorChoice);
            Controls.Add(btn_divide);
            Controls.Add(btn_multiply);
            Controls.Add(btn_subtract);
            Controls.Add(btn_add);
            Controls.Add(lbl_op);
            Controls.Add(btn_dot);
            Controls.Add(btn_clear);
            Controls.Add(btn_0);
            Controls.Add(btn_9);
            Controls.Add(btn_8);
            Controls.Add(btn_7);
            Controls.Add(btn_6);
            Controls.Add(btn_5);
            Controls.Add(btn_4);
            Controls.Add(btn_3);
            Controls.Add(btn_2);
            Controls.Add(btn_1);
            Controls.Add(lbl_result);
            Controls.Add(result);
            Controls.Add(calcPicture);
            Font = new Font("Times New Roman", 9.75F, FontStyle.Bold, GraphicsUnit.Point, 0);
            MaximizeBox = false;
            Name = "Calculator";
            Text = "Calculator";
            Load += Calculator_Load;
            ((System.ComponentModel.ISupportInitialize)calcPicture).EndInit();
            calculatorChoice.ResumeLayout(false);
            calculatorChoice.PerformLayout();
            grpBox_scientific.ResumeLayout(false);
            grpBox_scientific.PerformLayout();
            grpBox_design.ResumeLayout(false);
            grpBox_design.PerformLayout();
            ResumeLayout(false);
            PerformLayout();
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

