<div class="container">
 <br />

 <?php
session_start();
include "../Connection/Db.php";

 $query = "SELECT* FROM trace_book where Status Is Null";
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
 <img src="../upload/images/<?php echo $row['Image']; ?>" height="300px" width="80%"></img><br>
  <br>
 
 <table>
    <tr>
    <td>Publisher:</td>
     <td><?php echo $row["Publisher"]; ?></td>
  </tr>
    <tr>
    <td>ISBN :</td>
      <td><?php echo $row["ISBN"]; ?></td>
  </tr>
  <tr>
    <td>Date Borrowed:</td>
     <td><?php echo $row["Date_Borrowed"]; ?></td>
  </tr>
  <tr>
    <td>Valid For:</td>
     <td><?php echo $row["Date_Expected_Returned"]; ?></td>
  </tr>
  <tr>
    <td>Borrowed By:</td>
     <td><?php echo $row["Student_Number"]; ?></td>
  </tr>
  
 </table>
  <br>

<div  style="padding:10px;">

<a href="Remind.php?bookID=<?php echo $row['Student_Number']; ?>" ><span></span> Remind Student</a>&nbsp;&nbsp;
<a href="Returned.php?bookID=<?php echo $row['trace_id'];?>" ><span ></span> Returned</a>&nbsp;&nbsp;


</div>
 
 </form>
 <br>
 </div>
 <?php } }?>
 
