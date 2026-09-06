<style>
    .ft{
        font-size: 50px;
        font-weight: bold;
    }
</style>
<h1 class="ft">Welcome to <?php echo $_settings->info('name') ?></h1>
<hr>
<?php 


?>
<?php if($_settings->userdata('type') == 1){?>
<div class="row ft">
          <div class="col-12 col-sm-4 col-md-4">
           <a href="<?php echo base_url ?>admin/?page=categories">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Categories List</span>
                  <span class="info-box-number text-right">
                    <?php 
                      $category = $conn->query("SELECT * FROM category_list where delete_flag = 0 and `status` = 1")->num_rows;
                      echo format_num($category);
                    ?>
                    <?php ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-4 col-md-4">
           <a href="<?php echo base_url ?>admin/?page=clients">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Client List</span>
                  <span class="info-box-number text-right">
                    <?php 
                      $no_name = $conn->query("SELECT * FROM clients")->num_rows;
                      echo format_num($no_name);
                    ?>
                    <?php ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-4 col-md-4">
            <a href="<?php echo base_url ?>admin/?page=products">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-mug-hot"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Products List</span>
                  <span class="info-box-number text-right">
                    <?php 
                      $product = $conn->query("SELECT * FROM product_list where delete_flag = 0 and `status` = 1")->num_rows;
                      echo format_num($product);
                    ?>
                    <?php ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-4 col-md-4">
            <a href="<?php echo base_url ?>admin/?page=reports">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-calendar-day"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Today's Sales</span>
                  <span class="info-box-number text-right">
                    <?php 
                    $date = date('Y-m-d');
                      if($_settings->userdata('type') == 3):
                        $total = $conn->query("SELECT sum(amount) as total FROM sale_list where user_id = '{$_settings->userdata('id')}' ");
                      else:
                        $total = $conn->query("SELECT sum(amount) as total FROM sale_list where date(date_updated) = '$date'");
                      endif;
                      $total = $total->num_rows > 0 ? $total->fetch_array()['total'] : 0; 
                      $total = $total > 0 ? $total : 0;
                      echo format_num($total);
                    ?>
                    <?php ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            <!-- /.info-box -->
            </a>
          </div>
          <div class="col-12 col-sm-4 col-md-4">
            <a href="<?php echo base_url ?>admin/?page=reports">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-calendar-day"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Month's Sales</span>
                  <span class="info-box-number text-right">
                  <?php 
                  $date1 = date('Y-m'); // Example: Get current year-month format

                    if ($_settings->userdata('type') == 3):
                      $total = $conn->query("SELECT SUM(amount) as total FROM sale_list WHERE user_id = '{$_settings->userdata('id')}'");
                    else:
                      $total = $conn->query("SELECT SUM(amount) as total FROM sale_list WHERE DATE_FORMAT(date_updated, '%Y-%m') = '$date1'");
                    endif;

                    $total = ($total && $total->num_rows > 0) ? $total->fetch_array()['total'] : 0; 
                    echo format_num($total);
                  ?>

                    
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            <!-- /.info-box -->
            </a>
          </div>
          <div class="col-12 col-sm-4 col-md-4">
            <a href="<?php echo base_url ?>admin/?page=report_expenses">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-calendar-day"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Today's Expensen</span>
                  <span class="info-box-number text-right">
                    <?php 
                      $date2 = date('Y-m-d');
                      if($_settings->userdata('type') == 3):
                        $total = $conn->query("SELECT sum(amount) as total FROM expenses where user_id = '{$_settings->userdata('id')}' ");
                      else:
                        $total = $conn->query("SELECT sum(amount) as total FROM expenses where date(date) = '$date2'");
                      endif;
                      $total = $total->num_rows > 0 ? $total->fetch_array()['total'] : 0; 
                      $total = $total > 0 ? $total : 0;
                      echo format_num($total);
                    ?>
                    <?php ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            <!-- /.info-box -->
            </a>
          </div>
          <div class="col-12 col-sm-4 col-md-4">
            <a href="<?php echo base_url ?>admin/?page=report_expenses">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-calendar-day"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Month's Expensens</span>
                  <span class="info-box-number text-right">
                  <?php 
                    $date3 = date('Y-m'); // Get current Year-Month

                    if ($_settings->userdata('type') == 3):
                      $total = $conn->query("SELECT SUM(amount) as total FROM expenses WHERE user_id = '{$_settings->userdata('id')}'");
                    else:
                      $total = $conn->query("SELECT SUM(amount) as total FROM expenses WHERE DATE_FORMAT(date, '%Y-%m') = '$date3'");
                    endif;

                    $total = ($total && $total->num_rows > 0) ? $total->fetch_array()['total'] : 0; 
                    echo format_num($total);
                  
                   
                    ?>
                  
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            <!-- /.info-box -->
            </a>
          </div>
          <div class="col-12 col-sm-4 col-md-4">
            <a href="<?php echo base_url ?>admin/?page=reports_delevery">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-calendar-day"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Today's Delevry</span>
                  <span class="info-box-number text-right">
                    <?php 
                      $date4 = date('Y-m-d');
                      if($_settings->userdata('type') == 3):
                        $total = $conn->query("SELECT sum(dev_charg) as total FROM sale_list where user_id = '{$_settings->userdata('id')}' ");
                      else:
                        $total = $conn->query("SELECT sum(dev_charg) as total FROM sale_list where date(date_updated) = '$date4'");
                      endif;
                      $total = $total->num_rows > 0 ? $total->fetch_array()['total'] : 0; 
                      $total = $total > 0 ? $total : 0;
                      echo format_num($total);
                    ?>
                    <?php ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            <!-- /.info-box -->
            </a>
          </div>
          <div class="col-12 col-sm-4 col-md-4">
            <a href="<?php echo base_url ?>admin/?page=reports_delevery">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-calendar-day"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Month's Delevery</span>
                  <span class="info-box-number text-right">
                  <?php 
                    $date5 = date('Y-m'); // Get current Year-Month

                    if ($_settings->userdata('type') == 3) {
                        $stmt = $conn->prepare("SELECT SUM(dev_charg) as total FROM sale_list WHERE user_id = ?");
                        $stmt->bind_param("i", $_settings->userdata('id'));
                    } else {
                        $stmt = $conn->prepare("SELECT SUM(dev_charg) as total FROM sale_list WHERE DATE_FORMAT(date_updated, '%Y-%m') = ?");
                        $stmt->bind_param("s", $date5);
                    }

                    $stmt->execute();
                    $result = $stmt->get_result();
                    $total = ($result && $row = $result->fetch_assoc()) ? $row['total'] : 0;

                    echo format_num($total);
                    ?>
                                        <?php ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->
</div>
<?php }?>
        
<br />
