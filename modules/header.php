<?php      
      //require($resPath."modules/HotelFunctions.php");
	  //$db = new Hotel_Functions(); 
?>


<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark stroke">
			   
				<h1 class="navbar-brand-1"> 
				    <a class="navbar-brand" href="<?php echo $resPath;?>index.php">
						<span class="sub-logo">INDEXMAP</span>
					</a>
				</h1>
				
				
				<!-- if logo is image enable this   
        <a class="navbar-brand" href="#index.html">
            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
        </a> -->
				<button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
					data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
					<span class="navbar-toggler-icon fa icon-close fa-times"></span>
					</span>
				</button>
                 
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02" >
					
					
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo $resPath;?>index.php">
							    <span class="fa fa-home"></span>
							     Home<span class="sr-only">(current)</span>
						    </a>
						</li>
						
						<li class="nav-item ">
						    <div class="user-bar">
			                     <a href="#domain" class="nav-link not-loged-in" data-toggle="modal" data-target="#UserModal">
                                     <?php 
					                    if(isset($_SESSION["validUser"]) && !empty($_SESSION["validUser"]))
					                          {
						                            ?>
						                             <span class="fa fa-user"></span>
						                             <b>My Account</b>
						                            <?php
					                           }
					                    else
					                           {
						                        ?>
						                          <span class="fa fa-sign-in"></span>
						                           <b>Sign In</b>
						                        <?php 
					                            }
                                                ?>					
					
				              </a>
				   
				          </div>
							
						</li>
						
						
						
						
						
					</ul>
					
					
					
					
					
				    
				</div>
			
			    
			    	
			</nav>
</div>






		













	