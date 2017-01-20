{include file="user_header.tpl"}
{include file="user_navigation.tpl"}

 	<section class="content">
  		  <div class="nav-tabs-custom">
  			  <div class="tab-content">
   				 <div class="row">
     			   <div class="col-lg-12">
                     <h2><strong>Available Rooms</strong></h2>
               		</div>
		 
		<div class="row">	
 			<div class="col-lg-12" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    
    						<div class="row">
        						<div class="col-xs-12">
                					{php}list_available_rooms();{/php}
            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	 	</div>

		<div class="row">	
 			<div class="col-lg-6" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    					<h2><strong> Booked Rooms </strong></h2>
    						<div class="row">
        						<div class="col-xs-12">
                					{php}list_booked_rooms();{/php}
            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	
 			<div class="col-lg-6" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    					<h2><strong> Occupied Rooms </strong></h2>
    						<div class="row">
        						<div class="col-xs-12">
                					{php}list_occupied_room();{/php}
            					</div>
        					</div>
    					</div>
    				</div>
				</section>
			</div>		   
	 	</div>


	 </div>
	</div>
	</section>
</div>
</body>

{include file="footer.tpl"}
{include file="user_footer.tpl"}

