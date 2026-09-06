namespace CarInsurance
{
    partial class Form2
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
            this.components = new System.ComponentModel.Container();
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form2));
            System.Windows.Forms.Label claimIDLabel;
            System.Windows.Forms.Label caridLabel;
            System.Windows.Forms.Label accidentDateLabel;
            System.Windows.Forms.Label typeLabel;
            this.tbl_claimsTableAdapter = new CarInsurance.myDSTableAdapters.tbl_claimsTableAdapter();
            this.myDS = new CarInsurance.myDS();
            this.tbl_claimsBindingSource = new System.Windows.Forms.BindingSource(this.components);
            this.tableAdapterManager = new CarInsurance.myDSTableAdapters.TableAdapterManager();
            this.tbl_claimsBindingNavigator = new System.Windows.Forms.BindingNavigator(this.components);
            this.bindingNavigatorMoveFirstItem = new System.Windows.Forms.ToolStripButton();
            this.bindingNavigatorMovePreviousItem = new System.Windows.Forms.ToolStripButton();
            this.bindingNavigatorSeparator = new System.Windows.Forms.ToolStripSeparator();
            this.bindingNavigatorPositionItem = new System.Windows.Forms.ToolStripTextBox();
            this.bindingNavigatorCountItem = new System.Windows.Forms.ToolStripLabel();
            this.bindingNavigatorSeparator1 = new System.Windows.Forms.ToolStripSeparator();
            this.bindingNavigatorMoveNextItem = new System.Windows.Forms.ToolStripButton();
            this.bindingNavigatorMoveLastItem = new System.Windows.Forms.ToolStripButton();
            this.bindingNavigatorSeparator2 = new System.Windows.Forms.ToolStripSeparator();
            this.bindingNavigatorAddNewItem = new System.Windows.Forms.ToolStripButton();
            this.bindingNavigatorDeleteItem = new System.Windows.Forms.ToolStripButton();
            this.tbl_claimsBindingNavigatorSaveItem = new System.Windows.Forms.ToolStripButton();
            this.tbl_claimsDataGridView = new System.Windows.Forms.DataGridView();
            this.dataGridViewTextBoxColumn1 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.dataGridViewTextBoxColumn2 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.dataGridViewTextBoxColumn3 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.dataGridViewTextBoxColumn4 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.claimIDTextBox = new System.Windows.Forms.TextBox();
            this.caridTextBox = new System.Windows.Forms.TextBox();
            this.accidentDateDateTimePicker = new System.Windows.Forms.DateTimePicker();
            this.typeTextBox = new System.Windows.Forms.TextBox();
            this.tbl_carsBindingSource = new System.Windows.Forms.BindingSource(this.components);
            this.tbl_carsTableAdapter = new CarInsurance.myDSTableAdapters.tbl_carsTableAdapter();
            this.tbl_carsDataGridView = new System.Windows.Forms.DataGridView();
            this.dataGridViewTextBoxColumn5 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.dataGridViewTextBoxColumn6 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.dataGridViewTextBoxColumn7 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.dataGridViewTextBoxColumn8 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.dataGridViewTextBoxColumn9 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            claimIDLabel = new System.Windows.Forms.Label();
            caridLabel = new System.Windows.Forms.Label();
            accidentDateLabel = new System.Windows.Forms.Label();
            typeLabel = new System.Windows.Forms.Label();
            ((System.ComponentModel.ISupportInitialize)(this.myDS)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_claimsBindingSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_claimsBindingNavigator)).BeginInit();
            this.tbl_claimsBindingNavigator.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_claimsDataGridView)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_carsBindingSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_carsDataGridView)).BeginInit();
            this.SuspendLayout();
            // 
            // tbl_claimsTableAdapter
            // 
            this.tbl_claimsTableAdapter.ClearBeforeFill = true;
            // 
            // myDS
            // 
            this.myDS.DataSetName = "myDS";
            this.myDS.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // tbl_claimsBindingSource
            // 
            this.tbl_claimsBindingSource.DataMember = "tbl_claims";
            this.tbl_claimsBindingSource.DataSource = this.myDS;
            // 
            // tableAdapterManager
            // 
            this.tableAdapterManager.BackupDataSetBeforeUpdate = false;
            this.tableAdapterManager.tbl_carsTableAdapter = null;
            this.tableAdapterManager.tbl_claimsTableAdapter = this.tbl_claimsTableAdapter;
            this.tableAdapterManager.UpdateOrder = CarInsurance.myDSTableAdapters.TableAdapterManager.UpdateOrderOption.InsertUpdateDelete;
            // 
            // tbl_claimsBindingNavigator
            // 
            this.tbl_claimsBindingNavigator.AddNewItem = this.bindingNavigatorAddNewItem;
            this.tbl_claimsBindingNavigator.BindingSource = this.tbl_claimsBindingSource;
            this.tbl_claimsBindingNavigator.CountItem = this.bindingNavigatorCountItem;
            this.tbl_claimsBindingNavigator.DeleteItem = this.bindingNavigatorDeleteItem;
            this.tbl_claimsBindingNavigator.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.bindingNavigatorMoveFirstItem,
            this.bindingNavigatorMovePreviousItem,
            this.bindingNavigatorSeparator,
            this.bindingNavigatorPositionItem,
            this.bindingNavigatorCountItem,
            this.bindingNavigatorSeparator1,
            this.bindingNavigatorMoveNextItem,
            this.bindingNavigatorMoveLastItem,
            this.bindingNavigatorSeparator2,
            this.bindingNavigatorAddNewItem,
            this.bindingNavigatorDeleteItem,
            this.tbl_claimsBindingNavigatorSaveItem});
            this.tbl_claimsBindingNavigator.Location = new System.Drawing.Point(0, 0);
            this.tbl_claimsBindingNavigator.MoveFirstItem = this.bindingNavigatorMoveFirstItem;
            this.tbl_claimsBindingNavigator.MoveLastItem = this.bindingNavigatorMoveLastItem;
            this.tbl_claimsBindingNavigator.MoveNextItem = this.bindingNavigatorMoveNextItem;
            this.tbl_claimsBindingNavigator.MovePreviousItem = this.bindingNavigatorMovePreviousItem;
            this.tbl_claimsBindingNavigator.Name = "tbl_claimsBindingNavigator";
            this.tbl_claimsBindingNavigator.PositionItem = this.bindingNavigatorPositionItem;
            this.tbl_claimsBindingNavigator.Size = new System.Drawing.Size(964, 25);
            this.tbl_claimsBindingNavigator.TabIndex = 0;
            this.tbl_claimsBindingNavigator.Text = "bindingNavigator1";
            // 
            // bindingNavigatorMoveFirstItem
            // 
            this.bindingNavigatorMoveFirstItem.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image;
            this.bindingNavigatorMoveFirstItem.Image = ((System.Drawing.Image)(resources.GetObject("bindingNavigatorMoveFirstItem.Image")));
            this.bindingNavigatorMoveFirstItem.Name = "bindingNavigatorMoveFirstItem";
            this.bindingNavigatorMoveFirstItem.RightToLeftAutoMirrorImage = true;
            this.bindingNavigatorMoveFirstItem.Size = new System.Drawing.Size(23, 22);
            this.bindingNavigatorMoveFirstItem.Text = "Move first";
            // 
            // bindingNavigatorMovePreviousItem
            // 
            this.bindingNavigatorMovePreviousItem.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image;
            this.bindingNavigatorMovePreviousItem.Image = ((System.Drawing.Image)(resources.GetObject("bindingNavigatorMovePreviousItem.Image")));
            this.bindingNavigatorMovePreviousItem.Name = "bindingNavigatorMovePreviousItem";
            this.bindingNavigatorMovePreviousItem.RightToLeftAutoMirrorImage = true;
            this.bindingNavigatorMovePreviousItem.Size = new System.Drawing.Size(23, 22);
            this.bindingNavigatorMovePreviousItem.Text = "Move previous";
            // 
            // bindingNavigatorSeparator
            // 
            this.bindingNavigatorSeparator.Name = "bindingNavigatorSeparator";
            this.bindingNavigatorSeparator.Size = new System.Drawing.Size(6, 25);
            // 
            // bindingNavigatorPositionItem
            // 
            this.bindingNavigatorPositionItem.AccessibleName = "Position";
            this.bindingNavigatorPositionItem.AutoSize = false;
            this.bindingNavigatorPositionItem.Name = "bindingNavigatorPositionItem";
            this.bindingNavigatorPositionItem.Size = new System.Drawing.Size(50, 23);
            this.bindingNavigatorPositionItem.Text = "0";
            this.bindingNavigatorPositionItem.ToolTipText = "Current position";
            // 
            // bindingNavigatorCountItem
            // 
            this.bindingNavigatorCountItem.Name = "bindingNavigatorCountItem";
            this.bindingNavigatorCountItem.Size = new System.Drawing.Size(35, 15);
            this.bindingNavigatorCountItem.Text = "of {0}";
            this.bindingNavigatorCountItem.ToolTipText = "Total number of items";
            // 
            // bindingNavigatorSeparator1
            // 
            this.bindingNavigatorSeparator1.Name = "bindingNavigatorSeparator";
            this.bindingNavigatorSeparator1.Size = new System.Drawing.Size(6, 6);
            // 
            // bindingNavigatorMoveNextItem
            // 
            this.bindingNavigatorMoveNextItem.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image;
            this.bindingNavigatorMoveNextItem.Image = ((System.Drawing.Image)(resources.GetObject("bindingNavigatorMoveNextItem.Image")));
            this.bindingNavigatorMoveNextItem.Name = "bindingNavigatorMoveNextItem";
            this.bindingNavigatorMoveNextItem.RightToLeftAutoMirrorImage = true;
            this.bindingNavigatorMoveNextItem.Size = new System.Drawing.Size(23, 20);
            this.bindingNavigatorMoveNextItem.Text = "Move next";
            // 
            // bindingNavigatorMoveLastItem
            // 
            this.bindingNavigatorMoveLastItem.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image;
            this.bindingNavigatorMoveLastItem.Image = ((System.Drawing.Image)(resources.GetObject("bindingNavigatorMoveLastItem.Image")));
            this.bindingNavigatorMoveLastItem.Name = "bindingNavigatorMoveLastItem";
            this.bindingNavigatorMoveLastItem.RightToLeftAutoMirrorImage = true;
            this.bindingNavigatorMoveLastItem.Size = new System.Drawing.Size(23, 20);
            this.bindingNavigatorMoveLastItem.Text = "Move last";
            // 
            // bindingNavigatorSeparator2
            // 
            this.bindingNavigatorSeparator2.Name = "bindingNavigatorSeparator";
            this.bindingNavigatorSeparator2.Size = new System.Drawing.Size(6, 6);
            // 
            // bindingNavigatorAddNewItem
            // 
            this.bindingNavigatorAddNewItem.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image;
            this.bindingNavigatorAddNewItem.Image = ((System.Drawing.Image)(resources.GetObject("bindingNavigatorAddNewItem.Image")));
            this.bindingNavigatorAddNewItem.Name = "bindingNavigatorAddNewItem";
            this.bindingNavigatorAddNewItem.RightToLeftAutoMirrorImage = true;
            this.bindingNavigatorAddNewItem.Size = new System.Drawing.Size(23, 22);
            this.bindingNavigatorAddNewItem.Text = "Add new";
            // 
            // bindingNavigatorDeleteItem
            // 
            this.bindingNavigatorDeleteItem.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image;
            this.bindingNavigatorDeleteItem.Image = ((System.Drawing.Image)(resources.GetObject("bindingNavigatorDeleteItem.Image")));
            this.bindingNavigatorDeleteItem.Name = "bindingNavigatorDeleteItem";
            this.bindingNavigatorDeleteItem.RightToLeftAutoMirrorImage = true;
            this.bindingNavigatorDeleteItem.Size = new System.Drawing.Size(23, 20);
            this.bindingNavigatorDeleteItem.Text = "Delete";
            // 
            // tbl_claimsBindingNavigatorSaveItem
            // 
            this.tbl_claimsBindingNavigatorSaveItem.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image;
            this.tbl_claimsBindingNavigatorSaveItem.Image = ((System.Drawing.Image)(resources.GetObject("tbl_claimsBindingNavigatorSaveItem.Image")));
            this.tbl_claimsBindingNavigatorSaveItem.Name = "tbl_claimsBindingNavigatorSaveItem";
            this.tbl_claimsBindingNavigatorSaveItem.Size = new System.Drawing.Size(23, 23);
            this.tbl_claimsBindingNavigatorSaveItem.Text = "Save Data";
            this.tbl_claimsBindingNavigatorSaveItem.Click += new System.EventHandler(this.tbl_claimsBindingNavigatorSaveItem_Click);
            // 
            // tbl_claimsDataGridView
            // 
            this.tbl_claimsDataGridView.AutoGenerateColumns = false;
            this.tbl_claimsDataGridView.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.tbl_claimsDataGridView.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.dataGridViewTextBoxColumn1,
            this.dataGridViewTextBoxColumn2,
            this.dataGridViewTextBoxColumn3,
            this.dataGridViewTextBoxColumn4});
            this.tbl_claimsDataGridView.DataSource = this.tbl_claimsBindingSource;
            this.tbl_claimsDataGridView.Location = new System.Drawing.Point(12, 55);
            this.tbl_claimsDataGridView.Name = "tbl_claimsDataGridView";
            this.tbl_claimsDataGridView.Size = new System.Drawing.Size(430, 220);
            this.tbl_claimsDataGridView.TabIndex = 1;
            // 
            // dataGridViewTextBoxColumn1
            // 
            this.dataGridViewTextBoxColumn1.DataPropertyName = "ClaimID";
            this.dataGridViewTextBoxColumn1.HeaderText = "ClaimID";
            this.dataGridViewTextBoxColumn1.Name = "dataGridViewTextBoxColumn1";
            this.dataGridViewTextBoxColumn1.ReadOnly = true;
            // 
            // dataGridViewTextBoxColumn2
            // 
            this.dataGridViewTextBoxColumn2.DataPropertyName = "carid";
            this.dataGridViewTextBoxColumn2.HeaderText = "carid";
            this.dataGridViewTextBoxColumn2.Name = "dataGridViewTextBoxColumn2";
            // 
            // dataGridViewTextBoxColumn3
            // 
            this.dataGridViewTextBoxColumn3.DataPropertyName = "accidentDate";
            this.dataGridViewTextBoxColumn3.HeaderText = "accidentDate";
            this.dataGridViewTextBoxColumn3.Name = "dataGridViewTextBoxColumn3";
            // 
            // dataGridViewTextBoxColumn4
            // 
            this.dataGridViewTextBoxColumn4.DataPropertyName = "type";
            this.dataGridViewTextBoxColumn4.HeaderText = "type";
            this.dataGridViewTextBoxColumn4.Name = "dataGridViewTextBoxColumn4";
            // 
            // claimIDLabel
            // 
            claimIDLabel.AutoSize = true;
            claimIDLabel.Location = new System.Drawing.Point(93, 314);
            claimIDLabel.Name = "claimIDLabel";
            claimIDLabel.Size = new System.Drawing.Size(49, 13);
            claimIDLabel.TabIndex = 2;
            claimIDLabel.Text = "Claim ID:";
            // 
            // claimIDTextBox
            // 
            this.claimIDTextBox.DataBindings.Add(new System.Windows.Forms.Binding("Text", this.tbl_claimsBindingSource, "ClaimID", true));
            this.claimIDTextBox.Location = new System.Drawing.Point(176, 311);
            this.claimIDTextBox.Name = "claimIDTextBox";
            this.claimIDTextBox.Size = new System.Drawing.Size(200, 20);
            this.claimIDTextBox.TabIndex = 3;
            // 
            // caridLabel
            // 
            caridLabel.AutoSize = true;
            caridLabel.Location = new System.Drawing.Point(93, 340);
            caridLabel.Name = "caridLabel";
            caridLabel.Size = new System.Drawing.Size(33, 13);
            caridLabel.TabIndex = 4;
            caridLabel.Text = "carid:";
            // 
            // caridTextBox
            // 
            this.caridTextBox.DataBindings.Add(new System.Windows.Forms.Binding("Text", this.tbl_claimsBindingSource, "carid", true));
            this.caridTextBox.Location = new System.Drawing.Point(176, 337);
            this.caridTextBox.Name = "caridTextBox";
            this.caridTextBox.Size = new System.Drawing.Size(200, 20);
            this.caridTextBox.TabIndex = 5;
            // 
            // accidentDateLabel
            // 
            accidentDateLabel.AutoSize = true;
            accidentDateLabel.Location = new System.Drawing.Point(93, 367);
            accidentDateLabel.Name = "accidentDateLabel";
            accidentDateLabel.Size = new System.Drawing.Size(77, 13);
            accidentDateLabel.TabIndex = 6;
            accidentDateLabel.Text = "accident Date:";
            // 
            // accidentDateDateTimePicker
            // 
            this.accidentDateDateTimePicker.DataBindings.Add(new System.Windows.Forms.Binding("Value", this.tbl_claimsBindingSource, "accidentDate", true));
            this.accidentDateDateTimePicker.Location = new System.Drawing.Point(176, 363);
            this.accidentDateDateTimePicker.Name = "accidentDateDateTimePicker";
            this.accidentDateDateTimePicker.Size = new System.Drawing.Size(200, 20);
            this.accidentDateDateTimePicker.TabIndex = 7;
            // 
            // typeLabel
            // 
            typeLabel.AutoSize = true;
            typeLabel.Location = new System.Drawing.Point(93, 392);
            typeLabel.Name = "typeLabel";
            typeLabel.Size = new System.Drawing.Size(30, 13);
            typeLabel.TabIndex = 8;
            typeLabel.Text = "type:";
            // 
            // typeTextBox
            // 
            this.typeTextBox.DataBindings.Add(new System.Windows.Forms.Binding("Text", this.tbl_claimsBindingSource, "type", true));
            this.typeTextBox.Location = new System.Drawing.Point(176, 389);
            this.typeTextBox.Name = "typeTextBox";
            this.typeTextBox.Size = new System.Drawing.Size(200, 20);
            this.typeTextBox.TabIndex = 9;
            // 
            // tbl_carsBindingSource
            // 
            this.tbl_carsBindingSource.DataMember = "tbl_cars";
            this.tbl_carsBindingSource.DataSource = this.myDS;
            // 
            // tbl_carsTableAdapter
            // 
            this.tbl_carsTableAdapter.ClearBeforeFill = true;
            // 
            // tbl_carsDataGridView
            // 
            this.tbl_carsDataGridView.AutoGenerateColumns = false;
            this.tbl_carsDataGridView.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.tbl_carsDataGridView.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.dataGridViewTextBoxColumn5,
            this.dataGridViewTextBoxColumn6,
            this.dataGridViewTextBoxColumn7,
            this.dataGridViewTextBoxColumn8,
            this.dataGridViewTextBoxColumn9});
            this.tbl_carsDataGridView.DataSource = this.tbl_carsBindingSource;
            this.tbl_carsDataGridView.Location = new System.Drawing.Point(496, 96);
            this.tbl_carsDataGridView.Name = "tbl_carsDataGridView";
            this.tbl_carsDataGridView.Size = new System.Drawing.Size(300, 220);
            this.tbl_carsDataGridView.TabIndex = 10;
            // 
            // dataGridViewTextBoxColumn5
            // 
            this.dataGridViewTextBoxColumn5.DataPropertyName = "id";
            this.dataGridViewTextBoxColumn5.HeaderText = "id";
            this.dataGridViewTextBoxColumn5.Name = "dataGridViewTextBoxColumn5";
            // 
            // dataGridViewTextBoxColumn6
            // 
            this.dataGridViewTextBoxColumn6.DataPropertyName = "brand";
            this.dataGridViewTextBoxColumn6.HeaderText = "brand";
            this.dataGridViewTextBoxColumn6.Name = "dataGridViewTextBoxColumn6";
            // 
            // dataGridViewTextBoxColumn7
            // 
            this.dataGridViewTextBoxColumn7.DataPropertyName = "model";
            this.dataGridViewTextBoxColumn7.HeaderText = "model";
            this.dataGridViewTextBoxColumn7.Name = "dataGridViewTextBoxColumn7";
            // 
            // dataGridViewTextBoxColumn8
            // 
            this.dataGridViewTextBoxColumn8.DataPropertyName = "makeyear";
            this.dataGridViewTextBoxColumn8.HeaderText = "makeyear";
            this.dataGridViewTextBoxColumn8.Name = "dataGridViewTextBoxColumn8";
            // 
            // dataGridViewTextBoxColumn9
            // 
            this.dataGridViewTextBoxColumn9.DataPropertyName = "Price";
            this.dataGridViewTextBoxColumn9.HeaderText = "Price";
            this.dataGridViewTextBoxColumn9.Name = "dataGridViewTextBoxColumn9";
            // 
            // Form2
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(964, 462);
            this.Controls.Add(this.tbl_carsDataGridView);
            this.Controls.Add(claimIDLabel);
            this.Controls.Add(this.claimIDTextBox);
            this.Controls.Add(caridLabel);
            this.Controls.Add(this.caridTextBox);
            this.Controls.Add(accidentDateLabel);
            this.Controls.Add(this.accidentDateDateTimePicker);
            this.Controls.Add(typeLabel);
            this.Controls.Add(this.typeTextBox);
            this.Controls.Add(this.tbl_claimsDataGridView);
            this.Controls.Add(this.tbl_claimsBindingNavigator);
            this.Name = "Form2";
            this.Text = "Form2";
            this.Load += new System.EventHandler(this.Form2_Load);
            ((System.ComponentModel.ISupportInitialize)(this.myDS)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_claimsBindingSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_claimsBindingNavigator)).EndInit();
            this.tbl_claimsBindingNavigator.ResumeLayout(false);
            this.tbl_claimsBindingNavigator.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_claimsDataGridView)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_carsBindingSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.tbl_carsDataGridView)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private myDSTableAdapters.tbl_claimsTableAdapter tbl_claimsTableAdapter;
        private myDS myDS;
        private System.Windows.Forms.BindingSource tbl_claimsBindingSource;
        private myDSTableAdapters.TableAdapterManager tableAdapterManager;
        private System.Windows.Forms.BindingNavigator tbl_claimsBindingNavigator;
        private System.Windows.Forms.ToolStripButton bindingNavigatorAddNewItem;
        private System.Windows.Forms.ToolStripLabel bindingNavigatorCountItem;
        private System.Windows.Forms.ToolStripButton bindingNavigatorDeleteItem;
        private System.Windows.Forms.ToolStripButton bindingNavigatorMoveFirstItem;
        private System.Windows.Forms.ToolStripButton bindingNavigatorMovePreviousItem;
        private System.Windows.Forms.ToolStripSeparator bindingNavigatorSeparator;
        private System.Windows.Forms.ToolStripTextBox bindingNavigatorPositionItem;
        private System.Windows.Forms.ToolStripSeparator bindingNavigatorSeparator1;
        private System.Windows.Forms.ToolStripButton bindingNavigatorMoveNextItem;
        private System.Windows.Forms.ToolStripButton bindingNavigatorMoveLastItem;
        private System.Windows.Forms.ToolStripSeparator bindingNavigatorSeparator2;
        private System.Windows.Forms.ToolStripButton tbl_claimsBindingNavigatorSaveItem;
        private System.Windows.Forms.DataGridView tbl_claimsDataGridView;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn1;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn2;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn3;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn4;
        private System.Windows.Forms.TextBox claimIDTextBox;
        private System.Windows.Forms.TextBox caridTextBox;
        private System.Windows.Forms.DateTimePicker accidentDateDateTimePicker;
        private System.Windows.Forms.TextBox typeTextBox;
        private System.Windows.Forms.BindingSource tbl_carsBindingSource;
        private myDSTableAdapters.tbl_carsTableAdapter tbl_carsTableAdapter;
        private System.Windows.Forms.DataGridView tbl_carsDataGridView;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn5;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn6;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn7;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn8;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn9;
    }
}