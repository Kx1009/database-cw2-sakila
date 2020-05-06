<!DOCTYPE html>
<html>
<head>
	<title>Film Category</title> 
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
    <h3 class="head">FILM CATEGORY</h3>
    <div class="accordion">
        <div class="accordion_button">INSERT NEW DATA</div>
        <div class="accordion_content">
        <form class="accordion_form" method="post">
    	<label>Film ID: <br><input class="inputbox" type="text" name="filmIdInsert" placeholder=" Film ID"></label><br>
        <label>Category ID: <br><input class="inputbox" type="text" name="categoryIdInsert" placeholder=" Category ID"></label><br>
    	<input class="submitbutton" type="submit" name="insert" value="INSERT">
        </form>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion_button">UPDATE EXISTING DATA</div>
        <div class="accordion_content">
        <form class="accordion_form" method="post">
    	<label>Old Film ID: <br><input class="inputbox" type="text" name="oldFilmIdUpdate" placeholder=" Old Film ID"></label><br>
        <div class="newdatamargin">
    	<label class="newdata"><u>NEW DATA</u></label><br>
        </div>
    	<label>Film ID: <br><input class="inputbox" type="text" name="filmIdUpdate" placeholder=" New Film ID"></label><br>
        <label>Category ID: <br><input class="inputbox" type="text" name="categoryIdUpdate" placeholder=" New Category ID"></label><br>
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
    		<th>Film ID</th>
    		<th>Category ID</th>
    		<th>Last Update</th>
    		<th>Delete</th>
    	</tr>

    <?php
    	if(isset($_POST['search'])){
    		$valueToSearch = $_POST['valueToSearch'];
    		$sql = "SELECT * FROM film_category WHERE CONCAT(`film_id`,`category_id`,`last_update`) LIKE '%".$valueToSearch."%' ORDER BY film_id,category_id ASC";
    		$result = mysqli_query($conn,$sql);
    	}
    	else{
    		$sql = "SELECT * FROM film_category ORDER BY film_id,category_id ASC";
    		$result = mysqli_query($conn,$sql);
    	}               
        while($row = mysqli_fetch_array($result)):
        $id = $row['film_id'];
        $id2 = $row['category_id'];
    ?>
    	<tr class="datarow">
    		<td><?php echo $row['film_id'] ?></td>
    		<td><?php echo $row['category_id'] ?></td>
    		<td><?php echo $row['last_update'] ?></td>
    		<td align="middle"><form method="POST"><input type="hidden" name="id" value=<?php echo $id ?>><input type="hidden" name="id2" value=<?php echo $id2 ?>><input class="delete" type="submit" name="delete" value="Delete"></form></td>
    	</tr>
	<?php endwhile; ?>
	</table>
	<?php
		if(isset($_POST['delete'])){
			$delete_film_id = $_POST['id'];
            $delete_category_id = $_POST['id2'];
			mysqli_query($conn,"DELETE FROM film_category WHERE film_id = '$delete_film_id' AND category_id = '$delete_category_id'");
			echo '<script type="text/javascript">'; 
        	echo 'alert("You have deleted the data.");';
        	echo 'window.location= "https://hfyks3.mercury.nottingham.edu.my/sakila/film_category.php";';
        	echo '</script>'; 
		}
        date_default_timezone_set('Asia/Kuala_Lumpur');
        if(isset($_POST['insert'])){
            // Edit here (If the data is uppercase, put strtoupper())
            $filmid = $_POST['filmIdInsert'];
            $categoryid = $_POST['categoryIdInsert'];
            $lastupdate = date("Y-m-d H:i:s",time());
            $insert = "INSERT INTO `film_category`(`film_id`, `category_id`, `last_update`) VALUES ('$filmid','$categoryid','$lastupdate')";
            mysqli_query($conn,$insert);
            if(mysqli_errno($conn) == 1062){
                echo '<script type="text/javascript">'; 
                echo 'alert("Insert failed!\nNew data has duplicate primary key with existing data!");'; 
                // Edit here by change the file name
                echo 'window.location= "https://hfyks3.mercury.nottingham.edu.my/sakila/film_category.php";';
                echo '</script>'; 
            }
            else{
                echo '<script type="text/javascript">'; 
                echo 'alert('.$filmid.');';
                echo 'alert('.$categoryid.');';
                echo 'alert('.$lastupdate.');';
                echo 'alert("You have inserted new data.");'; 
                // Edit here by change the file name
                echo 'window.location= "https://hfyks3.mercury.nottingham.edu.my/sakila/film_category.php";';
                echo '</script>'; 
            }
        }
		if(isset($_POST['update'])){
        	$oldfilmid = $_POST['oldFilmIdUpdate'];
			$newfilmid = $_POST['filmIdUpdate'];
            $newcategoryid = $_POST['categoryIdUpdate'];
			$newlastupdate = date("Y-m-d H:i:s",time());
			$update = "UPDATE `film_category` SET `film_id`='$newfilmid',`category_id`='$newcategoryid',`last_update`='$newlastupdate' WHERE film_id = '$oldfilmid'";
			mysqli_query($conn,$update);
			echo '<script type="text/javascript">'; 
        	echo 'alert("You have updated new data.");';
        	echo 'window.location= "https://hfyks3.mercury.nottingham.edu.my/sakila/film_category.php";';
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