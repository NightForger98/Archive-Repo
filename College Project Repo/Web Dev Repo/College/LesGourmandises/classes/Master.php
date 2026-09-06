


<?php
require_once('../config.php');
class Master extends DBConnection
{
	private $settings;
	public function __construct()
	{
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct()
	{
		parent::__destruct();
	}
	function capture_err()
	{
		if (!$this->conn->error)
			return false;
		else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function delete_img()
	{
		extract($_POST);
		if (is_file($path)) {
			if (unlink($path)) {
				$resp['status'] = 'success';
			} else {
				$resp['status'] = 'failed';
				$resp['error'] = 'failed to delete ' . $path;
			}
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = 'Unkown ' . $path . ' path';
		}
		return json_encode($resp);
	}
	function save_category()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id'))) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string($v);
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `category_list` where `name` = '{$name}' " . (!empty($id) ? " and id != {$id} " : "") . " ")->num_rows;
		if ($this->capture_err())
			return $this->capture_err();
		if ($check > 0) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Category Name already exists.";
			return json_encode($resp);
			exit;
		}
		if (empty($id)) {
			$sql = "INSERT INTO `category_list` set {$data} ";
		} else {
			$sql = "UPDATE `category_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$bid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if (empty($id))
				$resp['msg'] = "New Category successfully saved.";
			else
				$resp['msg'] = " Category successfully updated.";
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		if ($resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function delete_category()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE FROM`category_list` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', " Category successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function save_product()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id'))) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string($v);
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `product_list` where `name` = '{$name}' " . (!empty($id) ? " and id != {$id} " : "") . " ")->num_rows;
		if ($this->capture_err())
			return $this->capture_err();
		// if($check > 0){
		// 	$resp['status'] = 'failed';
		// 	$resp['msg'] = "Product Name already exists.";
		// 	return json_encode($resp);
		// 	exit;
		// }
		if (empty($id)) {
			$sql = "INSERT INTO `product_list` set {$data} ";
		} else {
			$sql = "UPDATE `product_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$pid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if (empty($id))
				$resp['msg'] = "New Product successfully saved.";
			else
				$resp['msg'] = " Product successfully updated.";
			if (!empty($_FILES['img']['tmp_name'])) {
				$dir = 'uploads/products/';
				if (!is_dir(base_app . $dir))
					mkdir(base_app . $dir);
				$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
				$fname = $dir . $pid . ".png";
				$accept = array('image/jpeg', 'image/png');
				if (!in_array($_FILES['img']['type'], $accept)) {
					$resp['msg'] .= "Image file type is invalid";
				}
				if ($_FILES['img']['type'] == 'image/jpeg')
					$uploadfile = imagecreatefromjpeg($_FILES['img']['tmp_name']);
				elseif ($_FILES['img']['type'] == 'image/png')
					$uploadfile = imagecreatefrompng($_FILES['img']['tmp_name']);
				if (!$uploadfile) {
					$resp['msg'] .= "Image is invalid";
				}
				list($width, $height) = getimagesize($_FILES['img']['tmp_name']);
				if ($width > 640 || $height > 480) {
					if ($width > $height) {
						$perc = ($width - 640) / $width;
						$width = 640;
						$height = $height - ($height * $perc);
					} else {
						$perc = ($height - 480) / $height;
						$height = 480;
						$width = $width - ($width * $perc);
					}
				}
				$temp = imagescale($uploadfile, $width, $height);
				if (is_file(base_app . $fname))
					unlink(base_app . $fname);
				$upload = imagepng($temp, base_app . $fname, 6);
				if ($upload) {
					$this->conn->query("UPDATE `product_list` set image_path = CONCAT('{$fname}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$pid}' ");
				}
				imagedestroy($temp);
			}
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		if ($resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function delete_product()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE  FROM `product_list` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', " Product successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	
	function save_sale()
	{
		if (empty($_POST['id'])) {
			$_POST['user_id'] = $this->settings->userdata('id');
			$prefix = "0";
			$code = sprintf("%'.04d", 100);
			while (true) {
				$check = $this->conn->query("SELECT * FROM `sale_list` where code = '{$prefix}{$code}' ")->num_rows;
				if ($check > 0) {
					$code = sprintf("%'.04d", abs($code) + 1);
				} else {
					$_POST['code'] = $prefix . $code;
					break;
				}
			}
		}

		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id')) && !is_array($_POST[$k])) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string($v);
				$data .= " `{$k}`='{$v}' ";
			}
		}

		if (empty($id)) {
			$sql = "INSERT INTO `sale_list` SET {$data}";
		} else {
			$sql = "UPDATE `sale_list` SET {$data} WHERE id = '{$id}'";
		}

		$save = $this->conn->query($sql);

		if ($save) {
			$sid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['sid'] = $sid;
			$resp['status'] = 'success';
			if (empty($id)) {
				$resp['msg'] = "New Sale successfully saved.";
			} else {
				$resp['msg'] = "Sale successfully updated.";
			}

			if (isset($product_id)) {
				$data = "";
				foreach ($product_id as $k => $v) {
					$pid = $v;
					$price = $this->conn->real_escape_string($product_price[$k]);
					$qty = $this->conn->real_escape_string($product_qty[$k]);
					$name = $this->conn->real_escape_string($product_name[$k]);
					$cheked = $this->conn->real_escape_string($product_cheked[$k]);
					if (!empty($data)) $data .= ", ";
					$data .= "('{$sid}', '{$pid}', '{$qty}', '{$price}', '{$name}', '{$cheked}')";
				}

				if (!empty($data)) {
					$this->conn->query("DELETE FROM `sale_products` WHERE sale_id = '{$sid}'");
					$sql_product = "INSERT INTO `sale_products` (`sale_id`, `product_id`, `qty`, `price`, `prod_name`, `prod_cheked`) VALUES {$data}";
					$save_products = $this->conn->query($sql_product);
					if (!$save_products) {
						$resp['status'] = 'failed';
						$resp['sql'] = $sql_product;
						$resp['error'] = $this->conn->error;
						if (empty($id)) {
							$resp['msg'] = "Sale Transaction has failed to save.";
							$this->conn->query("DELETE FROM `sale_products` WHERE sale_id = '{$sid}'");
						} else {
							$resp['msg'] = "Sale Transaction has failed to update.";
						}
						return json_encode($resp);
					}
				}
			}
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}

		if ($resp['status'] == 'success') {
			$this->settings->set_flashdata('success', $resp['msg']);
		}

		return json_encode($resp);
	}
	function save_expenses() {
		extract($_POST);
		$data = [];
		$sid = !empty($id) ? $id : 0;
	
		foreach ($_POST as $k => $v) {
			if (!in_array($k, ['id']) && !is_array($_POST[$k])) {
				$v = $this->conn->real_escape_string($v);
				$data[$k] = $v;
			}
		}
	
		if (empty($id)) {
			$sql = "INSERT INTO `expenses` SET " . implode(', ', array_map(fn($k, $v) => "`$k`='$v'", array_keys($data), $data));
		} else {
			$sql = "UPDATE `expenses` SET " . implode(', ', array_map(fn($k, $v) => "`$k`='$v'", array_keys($data), $data)) . " WHERE id = '$id'";
		}
	
		$save = $this->conn->query($sql);
	
		if ($save) {
			$sid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['sid'] = $sid;
			$resp['status'] = 'success';
			$resp['msg'] = empty($id) ? "New Expense successfully saved." : "Expense successfully updated.";
	
			if (isset($item_name)) {
				$items_data = [];
				foreach ($item_name as $k => $v) {
					$iname = $this->conn->real_escape_string($item_name[$k]);
					$iqty = $this->conn->real_escape_string($item_qty[$k]);
					$iprice = $this->conn->real_escape_string($item_price[$k]);
					$items_data[] = "('$sid', '$iname', '$iqty', '$iprice')";
				}
	
				if (!empty($items_data)) {
					$this->conn->query("DELETE FROM `sale_items` WHERE expense_id = '$sid'");
					$sql_items = "INSERT INTO `sale_items` (`expense_id`, `item_name`, `quantity`, `price`) VALUES " . implode(', ', $items_data);
					$save_items = $this->conn->query($sql_items);
	
					if (!$save_items) {
						$resp['status'] = 'failed';
						$resp['msg'] = "Failed to save sale items.";
						$resp['error'] = $this->conn->error;
						return json_encode($resp);
					}
				}
			}
		} else {
			$resp['status'] = 'failed';
			$resp['msg'] = "Failed to save expense.";
			$resp['error'] = $this->conn->error;
		}
	
		return json_encode($resp);
	}



	function delete_sale()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `sale_list` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', " Sale successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delete_expenses()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `expenses` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', " Sale successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function update_status()
	{
		extract($_POST);
		$update = $this->conn->query("UPDATE `sale_list` set `status` = '{$status}' where id = '{$id}'");
		if ($update) {
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'failed';
			$resp['msg'] = "sale's status has failed to update.";
		}
		if ($resp['status'] == 'success')
			$this->settings->set_flashdata('success', 'sale\'s Status has been updated successfully.');
		return json_encode($resp);
	}
	function save_clients()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id'))) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string($v);
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `clients` where `clientName` = '{$clientName}' " . (!empty($id) ? " and id != {$id} " : "") . " ")->num_rows;
		if ($this->capture_err())
			return $this->capture_err();
		if ($check > 0) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Clients Name already exists.";
			return json_encode($resp);
			exit;
		}
		if (empty($id)) {
			$sql = "INSERT INTO `clients` set {$data} ";
		} else {
			$sql = "UPDATE `clients` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$bid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if (empty($id))
				$resp['msg'] = "New Clients successfully saved.";
			else
				$resp['msg'] = " Clients successfully updated.";
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		if ($resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function delete_clients()
	{
		extract($_POST);
		$del = $this->conn->query("UPDATE `clients` set `delete_flag` = 1 where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', " Category successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function save_delevery()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id'))) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string($v);
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `delevery` where `delevery_name` = '{$delevery_name}' " . (!empty($id) ? " and id != {$id} " : "") . " ")->num_rows;
		if ($this->capture_err())
			return $this->capture_err();
		if ($check > 0) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Category Name already exists.";
			return json_encode($resp);
			exit;
		}
		if (empty($id)) {
			$sql = "INSERT INTO `delevery` set {$data} ";
		} else {
			$sql = "UPDATE `delevery` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$bid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if (empty($id))
				$resp['msg'] = "New delevery successfully saved.";
			else
				$resp['msg'] = " delevery successfully updated.";
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		if ($resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function delete_delevery()
	{
		extract($_POST);
		$del = $this->conn->query("UPDATE `delevery` set `delete_flag` = 1 where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', " delevery successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function update_dev()
	{
		extract($_POST);
		$update = $this->conn->query("UPDATE `sale_list` SET `dev_id` = '{$dev_id}' WHERE id = '{$sale_id}'");
		$resp = [];

		if ($update) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "Sale's delivery updated successfully.");
		} else {
			$resp['status'] = 'failed';
			$resp['msg'] = "Failed to update the sale's delivery.";
		}

		// Return JSON response
		return json_encode($resp);
	}
	function update_order()
	{
		error_log("Updated Order Data: " . print_r($_POST['updatedOrder'], true));
		// Ensure the updatedOrder data is received as a string
		$updatedOrder = json_decode($_POST['updatedOrder'], true);

		if (!$updatedOrder) {
			// Handle case where the order data is invalid
			$resp = ['status' => 'failed', 'msg' => 'Invalid order data'];
			return json_encode($resp);
		}
		if (isset($_POST['updatedOrder']) && !empty($_POST['updatedOrder'])) {
			$updatedOrder = json_decode($_POST['updatedOrder'], true);
		} else {
			// Handle error if updatedOrder is missing or invalid
			$resp = ['status' => 'failed', 'msg' => 'Invalid or missing updatedOrder data'];
			return json_encode($resp);
		}

		// Initialize the response array
		$resp = [];

		// Loop through each item in the updatedOrder array
		foreach ($updatedOrder as $item) {
			$id = $item['id']; // Product ID
			$order = $item['order']; // New order value

			// Check if the order value is valid
			if (is_numeric($order) && !empty($id)) {
				// Update the order in the database for each product
				$update = $this->conn->query("UPDATE `product_list` SET `order` = '{$order}' WHERE id = '{$id}'");

				// Check if the update was successful
				if (!$update) {
					$resp['status'] = 'failed';
					$resp['msg'] = "Failed to update the Order for ID: {$id}.";
					return json_encode($resp);  // Return immediately on failure
				}
			} else {
				$resp['status'] = 'failed';
				$resp['msg'] = "Invalid order or ID for product ID: {$id}.";
				return json_encode($resp);
			}
		}

		// If all updates were successful
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success', "Order updated successfully.");

		// Return success response
		return json_encode($resp);
	}
	function search_client()
	{
		// Extract GET parameters
		extract($_GET);

		// Sanitize the input
		$term = trim($term); // Remove whitespace

		// Initialize response array
		$resp = ['status' => 'failed', 'msg' => 'An error occurred'];

		// Prepare the query
		$query = $this->conn->prepare("
        SELECT id, clientName, phone, address 
        FROM clients 
        WHERE clientName LIKE ? OR phone LIKE ? 
        ORDER BY clientName ASC LIMIT 10
    	");

		// Prepare the search term for both fields
		$searchTerm = "%$term%";
		$query->bind_param("ss", $searchTerm, $searchTerm);

		// Execute query and fetch results
		if ($query->execute()) {
			$result = $query->get_result();
			$data = [];

			while ($row = $result->fetch_assoc()) {
				$data[] = [
					'id' => $row['id'],
					'text' => $row['clientName'],
					'phone' => $row['phone'],
					'address' => $row['address']
				];
			}

			// Return JSON response
			header('Content-Type: application/json');
			echo json_encode(['results' => $data]);
			exit;
		} else {
			// Query failed
			$resp['msg'] = "Failed to fetch clients.";
		}

		// Return failure response in JSON format
		header('Content-Type: application/json');
		echo json_encode($resp);
		exit;
	}
	public function save_staff()
	{
		extract($_POST);

		$data = "";
		foreach ($_POST as $k => $v) {
			if ($k !== 'id' && $k !== 'amount' && $k !== 'day_off') { // Exclude 'id', 'amount', and 'day_off'
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string($v);
				$data .= "`{$k}`='{$v}'";
			}
		}

		// Check for duplicate staff name
		$check = $this->conn->query("SELECT * FROM `staff` WHERE `name` = '{$name}'" .
			(!empty($id) ? " AND id != {$id}" : ""))->num_rows;
		if ($this->capture_err()) return $this->capture_err();

		if ($check > 0) {
			$resp = ['status' => 'failed', 'msg' => 'Staff name already exists.'];
			return json_encode($resp);
		}

		if (!empty($amount)) {
			// Insert into `withdrawal` table if $amount is provided
			$staff_id = !empty($id) ? $id : null; // Ensure $id exists
			if (!$staff_id) {
				$resp = ['status' => 'failed', 'msg' => 'Staff ID is required to save withdrawal.'];
				return json_encode($resp);
			}

			$sql_withdrawal = "INSERT INTO `withdrawal` (`staff_id`, `amount`) VALUES ('{$staff_id}', '{$amount}')";
			$save_withdrawal = $this->conn->query($sql_withdrawal);

			if ($save_withdrawal) {
				$resp = ['status' => 'success', 'msg' => 'Withdrawal transaction saved successfully.'];
			} else {
				$resp = ['status' => 'failed', 'err' => $this->conn->error . "[{$sql_withdrawal}]"];
			}
		} else {
			// Insert or update `staff` table if $amount is not provided
			if (empty($id)) {
				$sql = "INSERT INTO `staff` SET {$data}";
			} else {
				$sql = "UPDATE `staff` SET {$data} WHERE id = '{$id}'";
			}

			$save = $this->conn->query($sql);
			if ($save) {
				$resp = [
					'status' => 'success',
					'msg' => empty($id) ? 'New staff added successfully.' : 'Staff updated successfully.'
				];

				// Handle day_off insertion into `absence` table
				if (isset($day_off) && $day_off == '1') {
					$staff_id = empty($id) ? $this->conn->insert_id : $id; // Get staff ID
					$sql_absence = "INSERT INTO `absence` (`staff_id`) VALUES ('{$staff_id}')";
					$save_absence = $this->conn->query($sql_absence);

					if (!$save_absence) {
						$resp = ['status' => 'failed', 'err' => $this->conn->error . "[{$sql_absence}]"];
					}
				}
			} else {
				$resp = ['status' => 'failed', 'err' => $this->conn->error . "[{$sql}]"];
			}
		}

		// Dynamic update of 'day_work' column based on current month
		$year = date('Y');   // Current year
		$month = date('n');  // Current month (1-12)

		// Calculate the number of days in the current month
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		// Update the 'day_work' column for all staff
		$updateQuery = "UPDATE staff SET day_work = '{$daysInMonth}'";
		$updateStmt = $this->conn->query($updateQuery);
		if (!$updateStmt) {
			$resp = ['status' => 'failed', 'err' => $this->conn->error . "[{$updateQuery}]"];
		}

		// Set flash message and return response
		if ($resp['status'] === 'success') {
			$this->settings->set_flashdata('success', $resp['msg']);
		}

		return json_encode($resp);
	}
	function delete_staff()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `staff` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', " Category successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delet_all()
	{
		$del = $this->conn->query("DELETE FROM sale_list");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', " تم حذف جميع المبيعات.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function update_all()
	{
		extract($_POST); // Extracting the values from the POST request

		// Validate inputs
		if (empty($name)) {
			$resp['status'] = 'error';
			$resp['message'] = 'اسم المنتج غير صالح';  // Product name is invalid
			return json_encode($resp);
		}

		if (is_numeric($price) && $price > 0) {
			// Prepare the SQL query to update both name and price
			$sql = "UPDATE product_list SET name = ?, price = ? WHERE id = ?";

			// Prepare the statement
			if ($stmt = $this->conn->prepare($sql)) {
				// Bind parameters: s for string (name), d for double (price), i for integer (id)
				$stmt->bind_param("sdi", $name, $price, $id);

				// Execute the query
				if ($stmt->execute()) {
					$resp['status'] = 'success';
					$this->settings->set_flashdata('success', "Price and name successfully updated.");
				} else {
					$resp['status'] = 'failed';
					$resp['error'] = $this->conn->error;
				}

				// Close the statement
				$stmt->close();
			} else {
				$resp['status'] = 'failed';
				$resp['error'] = 'Unable to prepare the SQL statement';
			}
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = 'السعر غير صالح';  // Invalid price
		}

		return json_encode($resp);
	}
	function limit()
	{
		// Extracting necessary parameters from the POST request
		$draw = $_POST['draw'];
		$start = $_POST['start'];
		$length = $_POST['length'];
		$searchValue = $_POST['search']['value'];

		// Total records
		$totalQuery = $this->conn->query("SELECT COUNT(*) as total FROM `clients` WHERE delete_flag = 0");
		$totalRecords = $totalQuery->fetch_assoc()['total'];

		// Filtered records with search condition
		$searchCondition = $searchValue ? "AND (clientName LIKE '%$searchValue%' OR phone LIKE '%$searchValue%' OR address LIKE '%$searchValue%')" : "";
		$filteredQuery = $this->conn->query("SELECT COUNT(*) as total FROM `clients` WHERE delete_flag = 0 $searchCondition");
		$filteredRecords = $filteredQuery->fetch_assoc()['total'];

		// Fetch data with pagination
		$dataQuery = $this->conn->query("
			SELECT * 
			FROM `clients` 
			WHERE delete_flag = 0 $searchCondition 
			ORDER BY clientName ASC 
			LIMIT $start, $length
		");

		// Prepare data to return
		$data = [];
		while ($row = $dataQuery->fetch_assoc()) {
			$data[] = [
				'id' => $row['id'],
				'date_created' => date("Y-m-d H:i", strtotime($row['date_created'])),
				'clientName' => $row['clientName'],
				'phone' => $row['phone'],
				'address' => $row['address']
			];
		}

		// Return JSON response
		$response = [
			"draw" => intval($draw),
			"recordsTotal" => intval($totalRecords),
			"recordsFiltered" => intval($filteredRecords),
			"data" => $data
		];

		// Set the response header to JSON and output the data

		return json_encode($response);
	}

}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'delete_img':
		echo $Master->delete_img();
		break;
	case 'save_category':
		echo $Master->save_category();
		break;
	case 'delete_category':
		echo $Master->delete_category();
		break;
	case 'save_product':
		echo $Master->save_product();
		break;
	case 'delete_product':
		echo $Master->delete_product();
		break;
	case 'save_sale':
		echo $Master->save_sale();
		break;
	case 'delete_sale':
		echo $Master->delete_sale();
		break;
	case 'update_status':
		echo $Master->update_status();
		break;
	case 'save_clients':
		echo $Master->save_clients();
		break;
	case 'delete_clients':
		echo $Master->delete_clients();
		break;
	case 'save_delevery':
		echo $Master->save_delevery();
		break;
	case 'delete_delevery':
		echo $Master->delete_delevery();
		break;
	case 'update_dev':
		echo $Master->update_dev();
		break;
	case 'update_order':
		echo $Master->update_order();
		break;
	case 'search_client':
		echo $Master->search_client();
		break;
	case 'save_staff':
		echo $Master->save_staff();
		break;
	case 'delete_staff':
		echo $Master->delete_staff();
		break;
	case 'delet_all':
		echo $Master->delet_all();
		break;
	case 'delete_expenses':
		echo $Master->delete_expenses();
		break;
	case 'update_all':
		echo $Master->update_all();
		break;
	case 'save_expenses':
		echo $Master->save_expenses();
		break;
	case 'limit':
		echo $Master->limit();
		break;
	default:
		// echo $sysset->index();
		break;
}
