{include file="header.tpl"}
	
	<div id="adbox" style="height: 400px;">
		<div style="margin-top: 80px; padding-top: 10px; width: 300px; height: 200px; background: #FBFBF0; border-radius: 1px; box-shadow: 0px 0px 0px 8px rgba(0,0,0,0.3); z-index: 9; font-family: arial;"> 
			<form name="login" action="login.php?job=login" method="post" class="login">
				<br />
				<center><input type="text" name="user_name" value="{$user_name}"required placeholder="Username"/></center>
				<center><input type="password" name="password" value="{$password}" required placeholder="Password"/></center><br />
				<center><input type="submit" name="ok" value="Login" /></center><br />
				<center>
										<a href='forget.php'>Forget Password</a>
					
				</center><br />
			</form>
		</div>
	</div>

{include file="footer.tpl"}
{include file="user_footer.tpl"}