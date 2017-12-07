<?php
session_start();
include "config.php"; 
foreach ($_GET as $var => $value) {
  $$var =$value; 
 }
foreach ($_POST as $var => $value) {
  $$var =$value; 
 }
?>
<?php
error_reporting(0);
 include 'config.php';
$sql_loginlocation = "select id, location_id from access_log where user_id = '$_SESSION[corporate]' or user_id = '$_SESSION[adminname]' order by id desc limit 1"; 
	$exe_loginlocation=mysqli_query($link, $sql_loginlocation);
	$loginLocation = mysqli_fetch_array($exe_loginlocation,MYSQLI_ASSOC);
if (isset($cvlogout)) {
	$today = date('d-m-Y');
		$gmt = date("H:i") ;
		$sec = date('i');
		$ourtime = $gmt +6;
		$cur_time = $today.'|'.$ourtime.':'.$sec;
	$sql_logout_log="update access_log set logout_time = '$cur_time' where id = '$loginLocation[id]'"; 
	$exe_logout_log=mysqli_query($link, $sql_logout_log);
  session_destroy(); 
	$host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = "index.php?pid=usrlogin"; 
	  print("
			<script language=\"javascript\">
				window.location = \"http://$host$uri/$extra\";
			</script>
		 ");
     exit();
 }
   $sql_login = "select branch_id, login_name from tbl_user where id = '$_SESSION[adminname]' or id = '$_SESSION[corporate]' ";
	$exe_login = mysqli_query($link,$sql_login);
	$login_company = mysqli_fetch_array($exe_login,MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nature Care System</title>
<meta name="keywords" content="Customized Accounting Software" />
<meta name="description" content="Next IT Solution" />
<link href="bttit_style.css" rel="stylesheet" type="text/css" />
<link href="menu_assets/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php  include('header.php');  ?>

  <!-- Main Header -->
  <?php  include('topbar.php');  ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php  include('sidebar.php');  ?>

  <!-- Content Wrapper. Contains page content -->
  <?php
		if ($pid=='')
		{$page_heading  = "Nature Care";
		$page_sub_heading  = "Dashboard";
		include "content.php";
		}
	
		else if ($pid=='pwd') 
		include "change_password.php";

		else if ($pid=='customer')
		{$page_heading  = "Customer";
		$page_sub_heading  = "Customer Record";			
		include "customer/customer.php";
		}
		
		else if ($pid=='customer_history') 
		include "customer_history.php";
		
		else if ($pid=='invoice_history') 
		include "invoice_history.php";
		
		else if ($pid=='supplier')
		{
		$page_heading  = "Supplier";
		$page_sub_heading  = "Supplier Record";
		include "supplier.php";
		}
		
		else if ($pid=='supplier_history') 
		include "supplier_history.php";
		
		else if ($pid=='user') 
		include "user.php";

		else if ($pid=='update_human')
		{
		$page_heading  = "Supplier";
		$page_sub_heading  = "Update Supplier";
		include "update_human.php";
		}
							
		else if ($pid=='in_ex') 
		include "income_expense.php";
		
		else if ($pid=='update_expense') 
		include "update_expense.php";
	
		else if ($pid=='update_income') 
		include "update_income.php";
		
		else if ($pid=='expense_history') 
		include "expense_history.php";
							
		else if ($pid=='category')
		include "product_category.php";
		
		else if ($pid=='update_category')
		{
		$page_heading  = "System Configuration";
		$page_sub_heading  = "Update Product Catagory";
		include "update_category.php";
		}
		
		else if ($pid=='update_model')
		{
		$page_heading  = "System Configuration";
		$page_sub_heading  = "Update Model";
		include "update_model.php";
		}
		
		else if ($pid=='update_role')
		{
		$page_heading  = "System Configuration";
		$page_sub_heading  = "Update Role";
		include "update_role.php";
		}
		
		else if ($pid=='banking') 
		include "banking.php";
				
		else if ($pid=='update_banking') 
		include "update_banking.php";
		
		else if ($pid=='loan') 
		include "loan_management.php";
		
		else if ($pid=='pay_loan') 
		include "pay_loan.php";
		
		else if ($pid=='receive_loan') 
		include "receive_loan.php";
		
		else if ($pid=='stock') // this is for stock page
		include "stock.php";
		
		else if ($pid=='product') 
		include "product.php";
	
		else if ($pid=='p-product') 
		{
		$page_heading  = "Product";
		$page_sub_heading  = "Product List";
		include "product_list.php";  //ajax
		}
		
		else if ($pid=='psm-product') 
		{
		$page_heading  = "Product";
		$page_sub_heading  = "Price Sheet Management";
		include "price_list_management.php";  //ajax
		}
		
		else if ($pid=='mps-product') 
		{
		$page_heading  = "Product";
		$page_sub_heading  = "Mass Price Sheet";
		include "pricesheet/mass_price_sheet.php";  //ajax
		}
		
		else if ($pid=='osb-product') 
		{
		$page_heading  = "Product";
		$page_sub_heading  = "Opening Stock Balance";
		include "opening_stock_balance.php";  //ajax
		}
		
		else if ($pid=='pricesheet') 
		include "pricesheet/pricesheet.php";
		
		else if ($pid=='mass-pricesheet') 
		include "pricesheet/mass-pricesheet.php";
		
		else if ($pid=='update_product')
		{
		$page_heading  = "Product";
		$page_sub_heading  = "Update Product";
		include "update_product.php";
		}
		
		else if ($pid=='update_area')
		{
		$page_heading  = "System Configuration";
		$page_sub_heading  = "Update Area";
		include "update_area.php";	
		}
		
		else if ($pid=='update_price') 
		include "update_price.php";	
		
		else if ($pid=='product_inventory') 
		include "product_inventory.php";
		
		else if ($pid=='product_history') 
		include "product_history.php";
		
		else if ($pid=='reporting') 
		include "reporting.php";
			
		else if ($pid=='branch_report') 
		include "branch_report.php";
		
		else if ($pid=='sales_report') 
		include "sales_report.php";
		
		else if ($pid=='purchase_report') 
		include "purchase_report.php";
		
		else if ($pid=='bank_balance') 
		include "banking_report.php";
		
		else if ($pid=='business_report') 
		include "business_report.php";
		
		else if ($pid=='expense_report') 
		include "expense_report.php";
		
		else if ($pid=='staff_report') 
		include "reporting/staff_report.php";
		
		else if ($pid=='cashbook') 
		include "cashbook.php";
		
		else if ($pid=='sale')
		{
		$page_heading  = "Sale";
		$page_sub_heading  = "Customer Billing";
		include "pre_sale.php"; //ajax
		}
		
		else if ($pid=='return')
		{
		$page_heading  = "Sale";
		$page_sub_heading  = "Return Sale";
		include "pre_return.php"; //ajax
		}
		
		else if ($pid=='return-details') 
		include "return-details.php"; //ajax
		
		else if ($pid=='collection')
		{
		$page_heading  = "Collection";
		$page_sub_heading  = "Existing Customer for Collection";
		include "collection.php"; //ajax
		}
		
		else if ($pid=='sales_register') 
		include "sales_register.php"; //ajax
		
		else if ($pid=='sales_return') 
		include "sales_return.php"; //ajax
		
		else if ($pid=='purchase') 
		include "pre_purchase.php"; //ajax
		
		else if ($pid=='purchase_register') 
		include "purchase_register.php"; //ajax
		
		else if ($pid=='update_opening_stock')
		{
		$page_heading  = "Product";
		$page_sub_heading  = "Update Opening Stock Balance";
		include "update_opening_stock.php"; //ajax
		}
		else if ($pid=='receipt') 
		include "purchase.php"; //ajax
		
		else if ($pid=='pre_invoice') 
		include "pre_invoice.php"; //ajax
		
		else if ($pid=='invoice') 
		include "invoice.php"; //ajax
		
		else if ($pid=='secondary-invoice') 
		include "secondary-invoice.php"; //ajax
		
		else if ($pid=='make-quotation')
		{
		$page_heading  = "Sales";
		$page_sub_heading  = "New Quotation Entry";
		include "make_quotation.php"; //ajax
		}
		
		else if ($pid=='quotation') 
		include "quotation.php"; //ajax
		
		else if ($pid=='pos') 
		include "pos.php"; //ajax
		
		else if ($pid=='stock-transfer') 
		include "stock-transfer.php"; //ajax
		
		else if ($pid=='transfer-record') 
		include "transfer-record.php"; //ajax
		
		else if ($pid=='pos_record') 
		include "pos_record.php"; //ajax
		
		else if ($pid=='account_receivable') 
		include "account_receivable.php"; //ajax
		
		else if ($pid=='ar_details') 
		include "ar_details.php"; //ajax
		
		else if ($pid=='account_payable') 
		include "account_payable.php"; //ajax
		
		else if ($pid=='loan') 
		include "loan_book.php"; //ajax
		
		else if ($pid=='advance') 
		include "advance.php"; //ajax
		
		else if ($pid=='sup-advance') 
		include "sup-advance.php"; //ajax
		
		else if ($pid=='ap_details') 
		include "ap_details.php"; //ajax
		
		else if ($pid=='getuser') 
		include "getuser.php"; //ajax
		
		else if ($pid=='setup')
		{
		$page_heading  = "System Configuration";
		$page_sub_heading  = "Main Company Setup"; 
		include "setup.php"; //ajax
		
		}
	
		else if ($pid=='mc-setup') 
		{
		$page_heading  = "System Configuration";
		$page_sub_heading  = "Main Company Setup";
		include "company_setup.php"; //ajax
		}
	
		else if ($pid=='as-setup') 
		{
		$page_heading  = "System Configuration";
		$page_sub_heading  = "Access Point/Station Setup";
		include "station_setup.php";  //ajax
		}
	
		else if ($pid=='b-setup')
		{
		$page_heading  = "System Configuration";
		$page_sub_heading  = "Bank Setup";
		include "bank_setup.php";  //ajax
		}
		
		else if ($pid=='pc-setup') 
		{$page_heading  = "System Configuration";
		$page_sub_heading  = "Product Category Setup"; 
		include "product_catagory_setup.php";  
		}//ajax
	    
		else if ($pid=='pps-setup') 
		{$page_heading  = "System Configuration";
		$page_sub_heading  = "Product Pack Size Setup"; 
		include "product_pack_size_setup.php";  
		}//ajax
	
		else if ($pid=='bl-setup') 
		{$page_heading  = "System Configuration";
		$page_sub_heading  = "Business Location Setup";
		include "business_location_setup.php";  //
		}
		
		else if ($pid=='er-setup')
		{$page_heading  = "System Configuration";
		$page_sub_heading  = "Employee Role Setup";
		include "employee_role_setup.php";  //ajax
		}
	
		else if ($pid=='ce-setup')
		{$page_heading  = "System Configuration";
		$page_sub_heading  = "Cash Expenditure Setup";
		include "cash_expenditure_setup.php";  //ajax
		}
		
		else if ($pid=='st-setup')
		{$page_heading  = "System Configuration";
		$page_sub_heading  = "Sales Target Setup";
		include "sales_target_setup.php";  //ajax
		}
		
		else if ($pid=='update_branch') 
		{$page_heading  = "System Configuration";
		$page_sub_heading  = "Update Branch";
		include "update_branch.php"; //ajax
		}
		
		else if ($pid=='update_bank') 
		{$page_heading  = "System Configuration";
		$page_sub_heading  = "Update Bank Account"; 
		include "update_bank_account.php"; //ajax
		}
		
		else if ($pid=='hr-employee')
		{$page_heading  = "HR";
		$page_sub_heading  = "Employee Record";
		include "hr_dept/employee.php"; 
		}
		
		else if ($pid=='hr-salary') 
		include "hr_dept/salary.php"; 
		
		else if ($pid=='hr-monthly-record') 
		include "hr_dept/monthly_emp_record.php"; 
		
		else if ($pid=='hr-monthly-profile') 
		include "hr_dept/monthly_profile.php"; 
		
		else if ($pid=='hr-bonus-settings') 
		include "hr_dept/bonus_settings.php"; 
		
		else if ($pid=='update_hr')
		{$page_heading  = "HR";
		$page_sub_heading  = "Update Employee"; 			
		include "hr_dept/update_hr.php"; //ajax
		}
		
		else if ($pid=='memo_record')
		{$page_heading  = "Memo";
		$page_sub_heading  = "Invoice/Voucher Record"; 
		include "memo_record.php"; //ajax
		}
		
		else if ($pid=='barcode-list') 
		include "barcode_list.php"; //ajax
		
		else if ($pid=='temp_report') 
		include "temporary_report/temp_report.php"; 
		
		else if ($pid=='temp_form') 
		include "temporary_report/temp_form.php"; 
		
		else if ($pid=='total_expense') 
		include "temporary_report/total_expense.php"; 
		
		else if ($pid=='stationary') 
		include "stationary/stationary.php"; 
		
		else if ($pid=='st-inventory') 
		include "stationary/st-inventory.php";
		
		else if ($pid=='track-equipments') 
		include "stationary/track-equipments.php"; 
		
		else if ($pid=='stationary-transfer') 
		include "stationary/stationary-transfer.php"; 
		
		else if ($pid=='update-expense-head') 
		include "update-expense-head.php";
	
		else
		{$page_heading  = "System Configuration";
		$page_sub_heading  = "Dashboard";
		include "index2.php";
		}
	
	?>
  <?php  //include('content.php');  ?>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php  include('footerbar.php');  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  
  
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  <?php  include('footer.php');  ?>