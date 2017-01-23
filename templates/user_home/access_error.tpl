{include file="user_header.tpl"}
{include file="user_navigation.tpl"}
 	<section class="content">
  		  <div class="nav-tabs-custom">
  			  <div class="tab-content">
   				 <div class="row">
     			   <div class="col-lg-12">
						{if $error_report=='on'}
							<div class="error_report" style="margin-top: 10px;">
								<strong>{$error_message}</strong>
							</div>
						{/if}
		
					</div>
					</div>
				</div>
			</div>
		</section>
	
{include file="user_footer.tpl"}