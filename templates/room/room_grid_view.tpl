{include file="user_header.tpl"}
{include file="user_navigation.tpl"}

 	<section class="content">
  		  <div class="nav-tabs-custom">
  			  <div class="tab-content">
   				 <div class="row">
     			   <div class="col-lg-12">
                     <h2><strong>Rooms </strong></h2>
               		</div>
		 
		<div class="row">	
 			<div class="col-lg-12" >	
 				<section class="content">
    				<div class="nav-tabs-custom">
    					<div class="tab-content">
    
    						<div class="row">
        						<div class="col-xs-12">
                					{php}list_rooms_in_home();{/php}
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

