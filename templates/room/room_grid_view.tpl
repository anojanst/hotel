{include file="user_header.tpl"}
{include file="user_navigation.tpl"}
    <!-- Main content -->
<section class="content">

	<div class="col-lg-6 col-xs-12">


		<div class="box box-danger box-solid">
            <div class="box-header with-border">
              	<i class="fa fa-building"></i>
              		<h3 class="box-title">Rooms</h3>
              <!-- tools box -->
              	<div class="pull-right box-tools">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize">
                  	<i class="fa fa-minus"></i></button>
              	</div>
              <!-- /. tools -->
            </div>

		<div class="box-body">
			{php}list_rooms_in_home();{/php}
		</div>
       
          </div>
	</div>


	


 
		
  <div class="control-sidebar-bg"></div>
</div>
    </section>
 
</body>

{include file="footer.tpl"}
{include file="user_footer.tpl"}

