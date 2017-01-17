{include file="user_header.tpl"}
{include file="user_navigation.tpl"}

 	<section class="content">
  		  <div class="nav-tabs-custom">
  			  <div class="tab-content">
   				 <div class="row">
     			   <div class="col-lg-12">
                     <h2><strong>Add or Remove Permissions | User Name : </strong>{$full_name}</h2>
               		</div>
  			
    <div class="row">
         		
 		<section class="content">
  		  <div class="nav-tabs-custom">

			<div class="col-lg-6"> 
  			 	<div class="tab-content">
   					 <strong>Permissions User already have</strong>
			 	  </div>
				   <div class="panel-body">
			     	  {php}list_user_module($_SESSION['id']);{/php}					
					</div>
			</div>
	
			 <div class="col-lg-6">
					 <div class="tab-content">
			                 <strong>Permissions User Dont have</strong>
			          </div>
			           <div class="panel-body">
			            		{php}list_not_user_module($_SESSION['id']);{/php}			
						</div>
			  </div>

			 </div>
			</section>
		</div>
	
      
 			</div>
	    </div>
	</section>
  </div> 
   	
{include file="footer.tpl"}
{include file="user_footer.tpl"}