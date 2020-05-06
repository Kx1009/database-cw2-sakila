<!DOCTYPE html>
<html>
<head>
<title>Payment</title> 
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://hfyks3.mercury.nottingham.edu.my/sakila/background.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script>
        function openSlideMenu(){
            document.getElementById('menu').style.width = '250px';
            document.getElementById('content').style.marginLeft= '250px'
        }
        function closeSlideMenu(){
            document.getElementById('menu').style.width = '0';
            document.getElementById('content').style.marginLeft= '0'
        }
    </script>
</head>
<body>
	<?php
        $servername = "localhost";
        $username = "hfyks3";
        $password = "kaixuan1009";
        $dbname = "hfyks3_sakila";
        $conn = mysqli_connect($servername, $username, $password,$dbname);
        if (!$conn){
            die("Conection failed: ". mysqli_connect_error);
        }
        mysqli_set_charset($conn,"utf8")
    ?>
    <div id="content">
    <span class="slide">
        <a onclick="openSlideMenu()">
            <i class="fas fa-bars"></i>
        </a>
    </span>
    <span class="slide">
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/homepage.html">
            <i class="fas fa-home"></i>
        </a>
    </span>
    <div id="menu" class="nav">
        <a class="close" onclick="closeSlideMenu()">
            <i class="fas fa-times"></i>
        </a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/">Index</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/actor.php">Actor</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/address.php">Address</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/category.php">Category</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/city.php">City</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/country.php">Country</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/customer.php">Customer</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/film.php">Film</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/film_actor.php">Film Actor</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/film_category.php">Film Category</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/film_text.php">Film Text</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/inventory.php">Inventory</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/language.php">Language</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/payment.php">Payment</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/rental.php">Rental</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/staff.php">Staff</a>
        <a href="https://hfyks3.mercury.nottingham.edu.my/sakila/store.php">Store</a>
        <a></a>
    </div>
    <h3 class="head">PAYMENT</h3>
    <div class="accordion">
        <div class="accordion_button">INSERT NEW DATA</div>
        <div class="accordion_content">
        <form class="accordion_form" method="post">
        <label>Payment ID: <br><input class="inputbox" type="text" name="paymentIdInsert" placeholder=" Payment ID"></label><br>
        <label>Customer ID: <br><input class="inputbox" type="text" name="customerIdInsert" placeholder=" Customer ID"></label><br>
        <label>Staff ID: <br><input class="inputbox" type="text" name="staffIdInsert" placeholder=" Staff ID"></label><br>
        <label>Rental ID: <br><input class="inputbox" type="text" name="rentalIdInsert" placeholder=" Rental ID"></label><br>
    	<label>Amount: <br><input class="inputbox" type="text" name="amountInsert" placeholder=" Amount"></label><br>
    	<label>Payment Date: <br><input class="inputbox" type="text" name="paymentDateInsert" placeholder=" Payment Date"></label><br>
    	<input class="submitbutton" type="submit" name="insert" value="INSERT">
        </form>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion_button">UPDATE EXISTING DATA</div>
        <div class="accordion_content">
        <form class="accordion_form" method="post">
        <label>Old Payment ID: <br><input class="inputbox" type="text" name="oldPaymentIdUpdate" placeholder=" Old Payment ID"></label><br>
        <div class="newdatamargin">
    	<label class="newdata"><u>NEW DATA</u></label><br>
        </div>
        <label>Payment ID: <br><input class="inputbox" type="text" name="paymentIdUpdate" placeholder=" New Payment ID"></label><br>
        <label>Customer ID: <br><input class="inputbox" type="text" name="customerIdUpdate" placeholder=" New Customer ID"></label><br>
        <label>Staff ID: <br><input class="inputbox" type="text" name="staffIdUpdate" placeholder=" New Staff ID"></label><br>
        <label>Rental ID: <br><input class="inputbox" type="text" name="rentalIdUpdate" placeholder=" New Rental ID"></label><br>
    	<label>Amount: <br><input class="inputbox" type="text" name="amountUpdate" placeholder=" New Amount"></label><br>
    	<label>Payment Date: <br><input class="inputbox" type="text" name="paymentDateUpdate" placeholder=" New Payment Date"></label><br>
    	<input class="submitbutton" type="submit" name="update" value="UPDATE">
        </form>
        </div>
    </div>
    <br><br>
    <div class="container">
    <form method="post">
        <fieldset>
        <legend>FILTER VIEW</legend>
        <label>Search: <br></label>
        <input class="inputbox" type="text" name="valueToSearch" placeholder=" Value To Search"><br>
        <input class="submitbutton" type="submit" name="reset" value="ALL DATA">
        <input class="submitbutton" type="submit" name="search" value="SEARCH">
        </fieldset>
    </form>
    <br><br>
    <script>
        let accHeading = document.querySelectorAll('.accordion_button');
        let accPanel = document.querySelectorAll(".accordion_content");
        for(let i=0;i<accHeading.length;i++){
            accHeading[i].onclick = function(){
                if(this.nextElementSibling.style.maxHeight){
                    hidePanels();
                }
                else{
                    showPanel(this);
                }
            }
        }
        function showPanel(elem){
            hidePanels();
            elem.classList.add("active");
            elem.nextElementSibling.style.maxHeight = elem.nextElementSibling.scrollHeight + "px";
        }
        function hidePanels(){
            for(let i=0;i<accPanel.length;i++){
                accPanel[i].style.maxHeight = null;
                accHeading[i].classList.remove("active");
            }
        }
    </script>
    <table>
    	<tr class="headingrow">
    		<th>Payment ID</th>
            <th>Customer ID</th>
            <th>Staff ID</th>
            <th>Rental ID</th>
    		<th>Amount</th>
    		<th>Payment Date</th>
    		<th>Last Update</th>
    		<th>Delete</th>
    	</tr>
    <?php
    	if(isset($_POST['search'])){
    		$valueToSearch = $_POST['valueToSearch'];
            $sql = "SELECT * FROM payment WHERE CONCAT(`payment_id`,`customer_id`,`staff_id`,`rental_id`,`amount`,`payment_date`,`last_update`) LIKE '%".$valueToSearch."%' ORDER BY payment_id ASC LIMIT 500";
    		$result = mysqli_query($conn,$sql);
    	}
    	else{
            $sql = "SELECT * FROM payment ORDER BY payment_id ASC LIMIT 500";
    		$result = mysqli_query($conn,$sql);
    	}               
        while($row = mysqli_fetch_array($result)):
         $id = $row['payment_id'];
    ?>
    	<tr class="datarow">
            <td><?php echo $row['payment_id'] ?></td>
    		<td><?php echo $row['customer_id'] ?></td>
            <td><?php echo $row['staff_id'] ?></td>
    		<td><?php echo $row['rental_id'] ?></td>
    		<td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['payment_date'] ?></td>
    		<td><?php echo $row['last_update'] ?></td>
    		<td align="middle"><form method="POST"><input type="hidden" name="id" value=<?php echo $id ?>><input class="delete" type="submit" name="delete" value="Delete"></form></td>
    	</tr>
	<?php endwhile; ?>
	</table>
	<?php 
		if(isset($_POST['delete'])){
			$delete_id = $_POST['id'];
            mysqli_query($conn,"DELETE FROM payment WHERE payment_id = '$delete_id'");
			echo '<script type="text/javascript">'; 
        	echo 'alert("You have deleted the data.");';
            echo 'window.location= "https://hfyks3.mercury.nottingham.edu.my/sakila/payment.php";';
        	echo '</script>'; 
		}
		date_default_timezone_set('Asia/Kuala_Lumpur');
		if(isset($_POST['insert'])){
            $paymentid = $_POST['paymentIdInsert'];
            $customerid = $_POST['customerIdInsert'];
            $staffid = $_POST['staffIdInsert'];
            $rentalid = $_POST['rentalIdInsert'];
			$amount = $_POST['amountInsert'];
			$paymentdate = $_POST['paymentDateInsert'];
			$lastupdate = date("Y-m-d H:i:s",time());
			$insert = "INSERT INTO `payment`(`payment_id`,`customer_id`,`staff_id`,`rental_id`,`amount`,`payment_date`,`last_update`) VALUES ('$paymentid','$customerid','$staffid','$rentalid','$amount','$paymentdate','$lastupdate')";
			mysqli_query($conn,$insert);
			if(mysqli_errno($conn) == 1062){
				echo '<script type="text/javascript">'; 
        		echo 'alert("Insert failed!\nNew data has duplicate primary key with existing data!");';
                echo 'window.location= "https://hfyks3.mercury.nottingham.edu.my/sakila/payment.php";';
        		echo '</script>'; 
			}
			else{
				echo '<script type="text/javascript">'; 
        		echo 'alert("You have inserted new data.");'; 
                echo 'window.location= "https://hfyks3.mercury.nottingham.edu.my/sakila/payment.php";';
        		echo '</script>'; 
        	}
		}
		if(isset($_POST['update'])){
            $oldpaymentid = $_POST['oldpaymentIdUpdate'];
            $newpaymentid = $_POST['paymentIdUpdate'];
            $customerid = $_POST['customerIdUpdate'];
            $staffid = $_POST['staffIdUpdate'];
            $rentalid = $_POST['rentalIdUpdate'];
			$amount = $_POST['amountUpdate'];
			$paymentdate = $_POST['paymentDateUpdate'];
			$newlastupdate = date("Y-m-d H:i:s",time());
			$update = "UPDATE `payment` SET `payment_id`='$newpaymentid',`customer_id`='$newcustomerid',`staff_id`='$newstaffid',`rental_id`='$newrentalid',`amount`='$newamount',`last_update`='$newlastupdate' WHERE payment_id = '$oldpaymentid'";
			mysqli_query($conn,$update);
			echo '<script type="text/javascript">'; 
        	echo 'alert("You have updated new data.");';
            echo 'window.location= "https://hfyks3.mercury.nottingham.edu.my/sakila/payment.php";';
        	echo '</script>'; 
        }
	?>
    <?php $conn -> close(); ?>
    <br>
    <button class="totop" type="button" onclick="window.location.href='#content'">Back to the top</button>
    </div>
    </div>
</body>
</html>

        
        
        
        