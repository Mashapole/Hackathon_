
 <div class="container">
 <br />

 <?php
session_start();
include "Connection/Db.php";

 $query = "SELECT * from books where Category ='".$_POST['selected_price']."'";
 $result = mysqli_query($connect, $query);
 
 if(mysqli_num_rows($result) > 0)
 {
 while($row = mysqli_fetch_array($result))
 {
 ?>
 <div class="col-md-4">
 <form method="post" >
  
 <div style="border:3px solid blue;  border-radius:5px; padding:16px;  
         max-width: 450px;
         min-width: 350px;
         max-height:auto;
         min-height: 350px;" align="center">
 <h4 class="text-info"><?php echo $row["Tittle"]; ?></h4>
  <a href="SelectedBookAction.php?bookID=<?php echo $row['Book_Id']; ?>">
 <img src="./upload/images/<?php echo $row['Image']; ?>" height="300px" width="80%"></img><br>
 </a>
  <br>
 
 <table>
  <tr>
    <td style="width:90px">Author :</td>
    <td><?php echo $row["author_name"]; ?><br></td>
  </tr>
    <tr>
    <td>Publisher:</td>
     <td><?php echo $row["Publisher"]; ?></td>
  </tr>
    <tr>
    <td>ISBN :</td>
      <td><?php echo $row["ISBN"]; ?></td>
  </tr>
 </table>
  <br>
 </div>
 
 </form>
 <br>
 </div>
 <?php } }?>
 

