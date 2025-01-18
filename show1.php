
<html>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=text], input[type=number] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

        .container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
            </style>
    <body>
    
				
    <center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add a Product details</button></center>
         
        
         <div id="id01" class="modal">
           
           <form class="modal-content animate" action="show1.php" method="post">
             <div class="imgcontainer">
               <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
               <h2>Stack Quantity login</h2>
               <img src="bio.jpeg" alt="Avatar" class="avatar">
         
             </div>
         
             <div class="container">
               
               Product Name<input type="text" placeholder="Enter the product name" name="usname" id="usname" required>
             Product id<input type="text" placeholder="Enter the product id" name="pass" id="pass" required>
             Product Quantity<input type="number" placeholder="Enter the product quantity" name="quan" id="quan" required>
             
               <center>  
               <button class="button" type="submit" name="submit" onclick="fun1()" id="submit">submit</button>
              
         </center>

             </div>
         
            
           </form>
         </div>
         
         <script>
         // Get the modal
         var modal = document.getElementById('id01');
         
         // When the user clicks anywhere outside of the modal, close it
         window.onclick = function(event) {
             if (event.target == modal) {
                 modal.style.display = "none";
             }
         }
         
         </script>
         
         
         
     
        <center>
    <table border="2">
			<tr>
				<th>Product Name</th>
				<th>Product quantity</th>
				<th>Produt Id</th>
        <th>Product details updated</th>
        <th>Product delete</th>
			</tr>
            
        <?php
        
   	   
 
        // Username is root
        $user = 'root';
        $password = '';
        
        // Database name is geeksforgeeks
        $database = 'geeksforgeeks';
        
        // Server is localhost with
        // port number 3306
        $servername='localhost:3306';
        $mysqli = new mysqli("localhost","root","","stack");
        
        // Checking for connections
        if ($mysqli->connect_error) {
          die('Connect Error (' .
          $mysqli->connect_errno . ') '.
          $mysqli->connect_error);
        }
        
        // SQL query to select data from database
        $sql = " SELECT * FROM product ";
        $result = $mysqli->query($sql);
        $mysqli->close();
        while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['pname'];?></td>
				<td><?php echo $rows['kg'];?></td>
				<td><?php echo $rows['pid'];?></td>
       
	      <td>
          <a href="edit.php?pid=<?php echo $rows['pid'];?>" class="btn btn-primary">Update</a>
        </td>
        <td>
          <form action="delete.php" method="POST">
            <input type="hidden" class="btn"  name="delete-id" value="<?php echo $rows['pid'];?>" id="delete-id">
            <button  type="submit" class="btn btn-danger" id="delete-btn" name="delete-btn">Delete</button></form>
          </td></tr>
          
			<?php
        }	
      if(isset($_POST["submit"]))      
    {
      
    $name=$_POST["usname"];
    $phn=$_POST["pass"];
    $age=$_POST["quan"];
    $link=mysqli_connect("localhost","root","","stack");
     $result= mysqli_select_db($link,"stack");  
    mysqli_query($link,"select * from product");
    mysqli_query($link,"INSERT INTO product(pname,kg,pid)VALUES('$name',$age,'$phn');");
    //while($rows=$result->fetch_assoc())
				//{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['pname'];?></td>
				<td><?php echo $rows['kg'];?></td>
				<td><?php echo $rows['pid'];?></td>
	
			</tr>
    </table>
			<?php
        }

?>
    
</center>
</body>
</html>