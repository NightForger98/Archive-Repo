namespace week_8_linq
{
    partial class frmLinqInteger
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
            this.btnAllInteger = new System.Windows.Forms.Button();
            this.btnEvenNumber = new System.Windows.Forms.Button();
            this.btnNumberInOrder = new System.Windows.Forms.Button();
            this.btnEmployeesSalary = new System.Windows.Forms.Button();
            this.btnEmployeesSoterted = new System.Windows.Forms.Button();
            this.btnEmployeesDistinct = new System.Windows.Forms.Button();
            this.btnExit = new System.Windows.Forms.Button();
            this.listBox = new System.Windows.Forms.ListBox();
            this.btnSalaryBetween = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // btnAllInteger
            // 
            this.btnAllInteger.Location = new System.Drawing.Point(12, 12);
            this.btnAllInteger.Name = "btnAllInteger";
            this.btnAllInteger.Size = new System.Drawing.Size(263, 36);
            this.btnAllInteger.TabIndex = 1;
            this.btnAllInteger.Text = "Show All Integer";
            this.btnAllInteger.UseVisualStyleBackColor = true;
            this.btnAllInteger.Click += new System.EventHandler(this.btnAllInteger_Click);
            // 
            // btnEvenNumber
            // 
            this.btnEvenNumber.Location = new System.Drawing.Point(12, 96);
            this.btnEvenNumber.Name = "btnEvenNumber";
            this.btnEvenNumber.Size = new System.Drawing.Size(263, 36);
            this.btnEvenNumber.TabIndex = 2;
            this.btnEvenNumber.Text = "Show Even  Numbers";
            this.btnEvenNumber.UseVisualStyleBackColor = true;
            this.btnEvenNumber.Click += new System.EventHandler(this.btnEvenNumber_Click);
            // 
            // btnNumberInOrder
            // 
            this.btnNumberInOrder.Location = new System.Drawing.Point(12, 54);
            this.btnNumberInOrder.Name = "btnNumberInOrder";
            this.btnNumberInOrder.Size = new System.Drawing.Size(263, 36);
            this.btnNumberInOrder.TabIndex = 3;
            this.btnNumberInOrder.Text = "Show number in order";
            this.btnNumberInOrder.UseVisualStyleBackColor = true;
            this.btnNumberInOrder.Click += new System.EventHandler(this.btnNumberInOrder_Click);
            // 
            // btnEmployeesSalary
            // 
            this.btnEmployeesSalary.Location = new System.Drawing.Point(12, 138);
            this.btnEmployeesSalary.Name = "btnEmployeesSalary";
            this.btnEmployeesSalary.Size = new System.Drawing.Size(263, 36);
            this.btnEmployeesSalary.TabIndex = 4;
            this.btnEmployeesSalary.Text = "Show Employees (full name) With salary";
            this.btnEmployeesSalary.UseVisualStyleBackColor = true;
            this.btnEmployeesSalary.Click += new System.EventHandler(this.btnEmployeesSalary_Click);
            // 
            // btnEmployeesSoterted
            // 
            this.btnEmployeesSoterted.Location = new System.Drawing.Point(12, 180);
            this.btnEmployeesSoterted.Name = "btnEmployeesSoterted";
            this.btnEmployeesSoterted.Size = new System.Drawing.Size(263, 36);
            this.btnEmployeesSoterted.TabIndex = 5;
            this.btnEmployeesSoterted.Text = "Show Employees with sorted names";
            this.btnEmployeesSoterted.UseVisualStyleBackColor = true;
            this.btnEmployeesSoterted.Click += new System.EventHandler(this.btnEmployeesSoterted_Click);
            // 
            // btnEmployeesDistinct
            // 
            this.btnEmployeesDistinct.Location = new System.Drawing.Point(12, 222);
            this.btnEmployeesDistinct.Name = "btnEmployeesDistinct";
            this.btnEmployeesDistinct.Size = new System.Drawing.Size(263, 36);
            this.btnEmployeesDistinct.TabIndex = 6;
            this.btnEmployeesDistinct.Tag = "";
            this.btnEmployeesDistinct.Text = "Show distinct Lastname";
            this.btnEmployeesDistinct.UseVisualStyleBackColor = true;
            this.btnEmployeesDistinct.Click += new System.EventHandler(this.btnEmployeesDistinct_Click);
            // 
            // btnExit
            // 
            this.btnExit.Location = new System.Drawing.Point(12, 306);
            this.btnExit.Name = "btnExit";
            this.btnExit.Size = new System.Drawing.Size(263, 36);
            this.btnExit.TabIndex = 7;
            this.btnExit.Text = "Exit";
            this.btnExit.UseVisualStyleBackColor = true;
            this.btnExit.Click += new System.EventHandler(this.btnExit_Click);
            // 
            // listBox
            // 
            this.listBox.Font = new System.Drawing.Font("Tahoma", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.listBox.FormattingEnabled = true;
            this.listBox.ItemHeight = 23;
            this.listBox.Location = new System.Drawing.Point(301, 12);
            this.listBox.Name = "listBox";
            this.listBox.Size = new System.Drawing.Size(285, 326);
            this.listBox.TabIndex = 8;
            // 
            // btnSalaryBetween
            // 
            this.btnSalaryBetween.Location = new System.Drawing.Point(12, 264);
            this.btnSalaryBetween.Name = "btnSalaryBetween";
            this.btnSalaryBetween.Size = new System.Drawing.Size(263, 36);
            this.btnSalaryBetween.TabIndex = 9;
            this.btnSalaryBetween.Tag = "";
            this.btnSalaryBetween.Text = "Show Salary between 4000 and 5500 ";
            this.btnSalaryBetween.UseVisualStyleBackColor = true;
            this.btnSalaryBetween.Click += new System.EventHandler(this.btnSalaryBetween_Click);
            // 
            // frmLinqInteger
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(596, 356);
            this.Controls.Add(this.btnSalaryBetween);
            this.Controls.Add(this.listBox);
            this.Controls.Add(this.btnExit);
            this.Controls.Add(this.btnEmployeesDistinct);
            this.Controls.Add(this.btnEmployeesSoterted);
            this.Controls.Add(this.btnEmployeesSalary);
            this.Controls.Add(this.btnNumberInOrder);
            this.Controls.Add(this.btnEvenNumber);
            this.Controls.Add(this.btnAllInteger);
            this.Name = "frmLinqInteger";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Linq  fromArray";
            this.ResumeLayout(false);

        }

        #endregion
        private System.Windows.Forms.Button btnAllInteger;
        private System.Windows.Forms.Button btnEvenNumber;
        private System.Windows.Forms.Button btnNumberInOrder;
        private System.Windows.Forms.Button btnEmployeesSalary;
        private System.Windows.Forms.Button btnEmployeesSoterted;
        private System.Windows.Forms.Button btnEmployeesDistinct;
        private System.Windows.Forms.Button btnExit;
        private System.Windows.Forms.ListBox listBox;
        private System.Windows.Forms.Button btnSalaryBetween;
    }
}

