<?php include_once ('header.php'); ?>
<?php include 'products_per_invoice_crud.php';?> 
 
        <?php if (isset($_GET["invoice_id"])) 
			  {
			  $invoice_id =$_GET["invoice_id"] ;
			   }
		?>
		
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Products Record</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				  <!--button for add new invoice -->
				  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">+ Add Products</button>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><br/>
			<div class="col-md-12">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr >
						  <th style="text-align:center">Purchase Invoice Id</th>
						  <th style="text-align:center">Products Name</th>
						  <th style="text-align:center">IMEI</th>
						  <th style="text-align:center">Expiry Starting Date</th>
						  <th style="text-align:center">Expiry Ending Date</th>
						  <th style="text-align:center">Purchase price</th>
						  <th style="text-align:center">Sale Price</th>
						  <th style="text-align:center">Update</th>
						  <th style="text-align:center">Remove</th>
						</tr>
						</thead>
						<tbody>
							 <?php 
							   $conn = new crudop();
							   $read = $conn->readProductsPerInvoice($invoice_id);
							   while($fetch = $read->fetch_array()){
							 ?>
							<tr>	
								<td align="center">
								<?php echo $fetch['purchase_invoice_id'];?>					
								</td>
								
								<td align="center"><?php echo $fetch['product_name'];?>                   						
								</td>
								
								<td align="center"><?php echo $fetch['imei'];?>						
								</td>
								<td align="center"><?php echo $fetch['expiry_starting_date'];?>						
								</td>
								<td align="center"><?php echo $fetch['expiry_ending_date'];?>						
								</td>
								<td align="center"><?php echo $fetch['purchase_price'];?>						
								</td>
								<td align="center"><?php echo $fetch['sale_price'];?>						
								</td>
								<td align="center">
									<a href="edit_department.php?department_id=<?php echo $fetch['id'];?>" >
										<i class="glyphicon glyphicon-edit"></i> 
										</a>
									</td>
						
								<td align="center">
									<a href="delete_department.php?department_id=<?php echo $fetch['id'];?>">
										<i class="glyphicon glyphicon-remove-circle"></i>
									</a>
								</td>
							</tr>
						<?php
							}
						?>	
						</tbody>
						
					</table>
	
			        </div>
			    </div>	
				
		    </div>
		</div>
	</div>
</div>
</div>
</div>
 <!-- Modal content-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="modal-title" align="center">Add Products</h3>
        </div>
			<div class="modal-body">
			
			 <form  action="" method="post" class="form-horizontal form-label-left">
                <div class="form-group">
					<label class="control-label col-md-4 col-sm-4 col-xs-12"> Products Name <span class="required">*</span>
					</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
							<select class="form-control" name="product_name" id="product_name">
									<?php 
												   $connection = new crudop();
												   $read = $connection-> readProducts();
												   while($fetch = $read->fetch_array()){
												 ?>
									<option	value="<?php echo $fetch["id"]; ?>">
												   <?php echo $fetch["product_name"]; ?>	
									</option>
									<?php } ?>
						    </select>
                      </div>
			    </div>
				
				<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Expiry Starting Date <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="date" name="expiry_starting" id="expiry_starting" required="required" class="form-control col-md-6">
                        </div>
                </div>					

			    <div class="form-group">
				    <label class="control-label col-md-4 col-sm-4 col-xs-12">Expiry Ending Date <span class="required">*</span></label>
					<div class="col-md-7 col-sm-7 col-xs-12">
					<input type="date" name="expiry_ending" id="expiry_ending" required="required" class="form-control col-md-6">
					</div>
			    </div>
			  
			    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Purchase Price<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                         <input type="text" name="purchase_price" id="purchase_price" placeholder="Purchase Price"required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                 </div>
				 
				 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Sale Price<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                         <input type="text" name="sale_price" id="sale_price" placeholder="Sale Price"required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                 </div>
					 
                <div class="form-group">
                        <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-4"><br/>
						    <button type="submit" id="table_heading" class="btn btn-success btn-block" >Display</button>
						  <br>
                        </div>
                </div>					  
            </form>
			<!-- table start tha print the headings and the remaining part of table are defined in the end of this page -->
		<div id="mydata">
			<table  border="2"  id="myTableData" cellpadding="2" style="color:black;">
				<tr>
					<th> Index_No              </th>
					<th> Product_Name          </th>
					<th> Expiry_starting       </th>
					<th> Expiry_ending         </th>
					<th> Purchase_price        </th>
					<th> Selling_price         </th>
					<th> IMEI                  </th>
				</tr>
			</table>
			<br/>
		</div>
		
		<script>
			
			$("#table_heading").click(function(){
				$("#mydata").show();
			});
			let val;
			let invoiceId;
			invoiceId = <?php echo $invoice_id ;?>
			//product_per_invoice code
			//Arrays are declare
			let productIdArr = new Array();
			let expStartingArr = new Array();
			let expEndingArr = new Array();
			let purchasePriceArr = new Array();
			let salePriceArr = new Array();
			let imeiArr = new Array();
			
		    var productName, expStarting, expEnding, purchasePrice, salePrice, imei;
			
		   function getImeiValue()
			{    
			  let imeiValue = document.getElementById("imei").value;
			  return imeiValue;
			}
			function imeiFunction()
			{  
					val = getImeiValue();
					imeiArr.push(val);  
					document.getElementById("imei").value = "";
					
			}
			function insert()
			{
				//get the value from the "form" through specific id that are define in form fields then store in variable
				productId      = document.getElementById("product_id").value;
				expStarting      = document.getElementById("expiry_starting_date").value;
				expEnding        = document.getElementById("expiry_ending_date").value;
				purchasePrice    = document.getElementById("purchase_price").value;
				salePrice        = document.getElementById("sale_price").value;
	
				// push is the method of array in javascript ,..and this method push the new value in array 
					productIdArr.push(productId);
					expStartingArr.push(expStarting);
					expEndingArr.push(expEnding);
					purchasePriceArr.push(purchasePrice); 
					salePriceArr.push(salePrice);
					imeiArr.push(imei);
				   
					let table = document.getElementById("myTableData");
					
					//count the table row
					let rowCount = table.rows.length;
					
					//insert the new row
					let row = table.insertRow(rowCount);
					
					//insert the coulmn against the row
					row.insertCell(0).innerHTML= rowCount;
					row.insertCell(1).innerHTML= productId;
					row.insertCell(2).innerHTML= expStarting;
					row.insertCell(3).innerHTML= expEnding;
					row.insertCell(4).innerHTML= purchasePrice;	 
					row.insertCell(5).innerHTML= salePrice;	 
					row.insertCell(6).innerHTML= val;	
			val = null;					
			}
			let product,expS, expE, pPrice, sPrice,imeiNo;
			function objVariables(){
			            product = productIdArr;
						expS = expStartingArr;
						expE = expEndingArr;
						pPrice = purchasePriceArr;
						sPrice = salePriceArr;
						imeiNo = imeiArr;			
			}	
		
			//let model = JSON.stringify(mobileArr);		
				$(document).ready(function(){
					$('#click').click(function(){
					        $.ajax({
							url:"products_ajax_request.php",
							method: "POST",
							data: { invoice_id:invoiceId, product_id:product, exp_starting:expS, exp_ending:expE, purchase_price:pPrice,sale_price:sPrice,imei_no:imeiNo },
                            success:function(message){
								$('#displayData').html(message);
							}
							}); 						
				        }); // click event
				});// ready 
		
		    </script>
			
        </div> 
        </div>
    </div>
</div>
       
<?php include_once ('footer.php'); ?>        