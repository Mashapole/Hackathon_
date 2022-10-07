
<table   class="table table-striped table-responsive">
	<tr>
		  <th>#</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                         
	</tr>
<?php
session_start();
include "../Connection/Db.php";

$query="SELECT * from trace_book where Status ='".$_POST['selected_price']."'";
$result1=mysqli_query($connect,$query);

if(mysqli_num_rows($result1) > 0)
{
while($row2=mysqli_fetch_array($result1))
{
	
	?>
	
	<tr>
										   <td class="center"><?php echo $row2["trace_id"]; ?></td>                                      
                                            <td class="center"><?php echo $row2["Description"]; ?></td>
                                            <td class="center">
											 <div style="border:3px solid blue;  border-radius:5px; padding:16px;  
												 max-width: 450px;
												 min-width: 350px;
												 max-height:auto;
												 min-height: 350px;" align="center">
												 
										 <h4 class="text-info"><?php echo $row2["Tittle"]; ?></h4>
										  
										 <img src="../upload/images/<?php echo $row2['Image']; ?>" height="300px" width="80%"></img><br>
									
										  <br>
										  
										   <table>
    <tr>
    <td>Publisher:</td>
     <td><?php echo $row2["Publisher"]; ?></td>
  </tr>
    <tr>
    <td>ISBN :</td>
      <td><?php echo $row2["ISBN"]; ?></td>
  </tr>
   <tr>
    <td>Date_Borrowed:</td>
     <td><?php echo $row2["Date_Borrowed"]; ?></td>
  </tr>
    <tr>
    <td>Valid Period :</td>
      <td><?php echo $row2["Date_Expected_Returned"]; ?></td>
  </tr>
  <tr>
    <td>Date_Of_Return :</td>
      <td><?php echo $row2["Date_Of_Return"]; ?></td>
  </tr>
  <tr>
    <td>Status:</td>
      <td><?php echo $row2["Status"]; ?></td>
  </tr>
 </table>
											 </div>
											</td>
										
											
                                        </tr> 
	<?php
}
							 }
?>
</table>