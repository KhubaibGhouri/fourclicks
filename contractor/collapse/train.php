<div class="collapse" id="collapseExample10003">
<div class="well">
<table class="table table-striped table-hover disply">
					            <thead>
					                <th></th>
					            	<th>File Name</th>
					            	<th>Start Date</th>
					            	<th>End Date</th>
					            	<th>Action</th>
					            </thead>
					                <tbody>
					                <?php
					                 
												$result = "SELECT * FROM coder";

												$sql = $conn->query($result);
												if ($sql->num_rows > 0) {
					                while($row = $sql->fetch_assoc()) { ?>
					                <tr>
					                    <td width="40px">Contrator A </td>
					                    <td width="40px"><a href="upload/<?php echo $row['File']; ?>" target="_blank"><?php echo $row['File']; ?></a></td>
					                    <td width="40px"><?php echo $row['Startdate'] ?> </td>
					                    <td width="40px"><?php echo $row['Enddate'] ?> </td>
					                    
					                    <td id="last">
                                             <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-<?php echo $row['ID'];?>">Edit</button>

					                    <div id="edit-<?php echo $row['ID'];?>" class="modal fade" role="dialog">
									       <div class="modal-dialog">

									         <!-- Modal content-->
									         <div class="modal-content">
									           <div class="modal-header">
									             <button type="button" class="close" data-dismiss="modal">&times;</button>
									             <h4 class="modal-title">Modal Header</h4>
									           </div>
									           <div class="modal-body">
									             <form action="home1.php" id="testing" enctype="multipart/form-data"  method="post"> 
									             			<input type="hidden" id="<?php echo $row['ID'];?>" value="<?php echo $row['ID'];?>">
									                         <div class="form-group">
									                              <label for="name">Name</label>
									                            <input name="name" class="form-control"  id="mn-<?php echo $row['ID'];?> type="text"  value="<?php echo $row['Name'];?>" />
									                       </div>

									                              <label for="">Document Type</label>
									                         <div class="radio">
									                                    <label><input type="radio" name="m" value="Public Laibility Insurance"  <?php if($row['Documenttype']=="Public Laibility Insurance"){ echo "checked";}?>>1. Public Laibility Insurance </label>
									                              </div> 
									                              <div class="radio">
									                                    <label><input type="radio" name="radio" value="Worker Comp Insurance" <?php if($row['Documenttype']=="Worker Comp Insurance"){ echo "checked";}?>>2. Worker Comp Insurance </label>
									                              </div>
									                              <div class="radio">
									                                    <label><input type="radio" name="radio" value="Indemnity Insurance" <?php if($row['Documenttype']=="PIndemnity Insurance"){ echo "checked";}?>>3. Indemnity Insurance </label>
									                              </div> 
									                              <div class="radio">
									                                    <label><input type="radio" name="radio" value="Risk Assesment" <?php if($row['Documenttype']=="Risk Assesment"){ echo "checked";}?>>4. Risk Assessment  </label>
									                              </div>
									                              <div class="radio">
									                                   <label><input type="radio" name="radio" value="Safe Work Method Statement" <?php if($row['Documenttype']=="Safe Work Method Statement"){ echo "checked";}?>>5. Safe Work Method Statement </label>
									                              </div>
									                        
									                       <div class="form-group">
									                            <label for="Startdate">Start Date</label>
									                             <input id="datepicker"  id="nm-<?php echo $row['ID'];?> class="form-control" class="datepicker" type="text" name="start" required="" value="<?php echo $row['Startdate'];?>" /> 
									                       </div>
									                       <div class="form-group">
									                            <label for="Enddate">End Date</label>
									                            <input id="datepicker1" id="ed-<?php echo $row['ID'];?> class="form-control datepicker" type="text" name="end" required="" value="<?php echo $row['Enddate'];?>" />
									                       </div>
									                       <div class="form-group">
									                            <label for="Users">Users</label>
									                            <input type="text" id="us-<?php echo $row['ID'];?> class="form-control" name="users" value="<?php echo $row['Users'];?>" />
									                       </div>
									                       <div class="form-group">
									                            <label for="Fileupload">File Upload</label>
									                            <input  id="fil-<?php echo $row['ID'];?>type="file" class="form-control" name="file" class="file" name="file" required="" value="<?php echo $row['File'];?>">
									                       </div>
									                       
									                        <button type="submit" id="submit" class="btn btn-primary submitbutton" name="submit">Submit</button>
									                  </form>
									           </div>
									           <div class="modal-footer">
									             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									           </div>
									         </div>

									       </div>
									     </div>
									     
									     </td>
									      <td id="last"><a class = 'echo_link btn btn-info btn-sm' href='delete.php?del=<?php echo $row['ID'] ?>' onclick="return confirm('Are you sure you want to delete it?');"> Delete </a></td>
					                 </tr>
					               <?php }?>
					                <?php } ?>
                                     
					                </tbody>
					            </table>
</div>
</div>