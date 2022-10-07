

<table   class="table table-striped table-responsive">
			<tr>
										
                                            <th>#</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Category</th>
											
											
								
            </tr>
			
			<?php 

session_start();
include "../Connection/Db.php";

$sql = "SELECT* FROM books ORDER BY Book_Id ASC";
$sendReq = mysqli_query($connect,$sql );
            
							if(mysqli_num_rows($sendReq) > 0)
							 {
							 while($row2 = mysqli_fetch_array($sendReq))
							 {
								 $cnt=1;
							 ?>
							
						
							  
							  
                                        <tr>
										   <td class="center"><?php echo $row2["Book_Id"]; ?></td>                                      
                                            <td class="center"><?php echo $row2["Description"]; ?></td>
                                            <td class="center">
											 <div style="border:3px solid blue;  border-radius:5px; padding:16px;  
												 max-width: 450px;
												 min-width: 350px;
												 max-height:auto;
												 min-height: 350px;" align="center">
												 
										 <h4 class="text-info"><?php echo $row2["Tittle"]; ?></h4>
										  <a href="SelectedBookAction.php?bookID=<?php echo $row2['Book_Id']; ?>">
										 <img src="../upload/images/<?php echo $row2['Image']; ?>" height="300px" width="80%"></img><br>
										 </a>
										  <br>
										  
										   <table>

  <tr>
    <td style="width:90px">Author :</td>
    <td><?php echo $row2["author_name"]; ?><br></td>
  </tr>
    <tr>
    <td>Publisher:</td>
     <td><?php echo $row2["Publisher"]; ?></td>
  </tr>
    <tr>
    <td>ISBN :</td>
      <td><?php echo $row2["ISBN"]; ?></td>
  </tr>
 </table>
											 </div>
											</td>
											<td class="center"><?php echo $row2["Category"]; ?></td>
											<td class="center"><?php echo $row2["Publisher"]; ?></td>
											
                                        </tr>                 
							 <?php  }?>
                                </table>
                            </div>
							 <br>
							<?php }?>







