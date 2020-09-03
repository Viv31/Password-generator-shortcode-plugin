<?php
/**
* Plugin Name:  Password Generator
* Plugin URI:
* Description:A Widget for generating random password.
* Version:1.0
* Author:Vaibhav Gangrade
* Author URI:
*/

if(!defined('ABSPATH')){
	 exit;
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); //calling main plugin file

function pgw_load_admin_js() {
    wp_enqueue_script( array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'pgw_load_admin_js' );

function generateRandomPassword(){
	?>
	<style type="text/css">
		#generated_password{
  		background-color: lightgrey;
  		max-height: 70px;
  		height: 70px;
  		width: auto;
  		padding: 5px;
  		font-size: 22px;
  		text-align: center;
  		color: black;
  		border-radius: 15px;
  		margin-bottom: 5px;
  	}

  	#password_gen_div{
  		background-color: rgba(0,0,0,0.6);
  		margin-top: 5px;
  		color: white;
  		border-radius: 15px;
  		padding: 10px;
  	}
  	input{
  		margin-left: 3px;
  	}

  	img{
  		margin-left: auto;
  		margin-right: auto;
  		display: block;
  		height: 80px;
  		width: auto;
  	}

</style>

<h4 style="color:#fff;"> Password Generator Widget</h4>
		<img src="<?php echo plugins_url('',__FILE__).'/pg.png'?>" height="100" width="auto">
		<div id="generated_password"></div>
<div class="form-group">
					<input type="number" name="length" id="length" class="form-control" onchange=" return generate_pw(length);" placeholder="Default value is 30" minlength="1">
				</div>
				<br>
				<div class="form-group">


					<select class="form-control" name="select_para"  id="select_para" onchange = "return generate_pw(this.value,length);">
						<option value="" id="" >----SELECT PARAMETER---</option>
						<option value="all" id="all" >All</option>
						<option value="only_alphabet" id="only_alphabet">Only Alphabet</option>
						<option value="only_numbers" id="only_numbers">Only Numbers</option>
						<option value="only_specialcharacters" id="only_specialcharacters">only Special charaters</option>
						<option value="alphabet_and_specialcharacters" id="alphabet_and_specialcharacters">Alphabet & Special charaters</option>
						<option value="alphabet_and_numbers" id="alphabet_and_numbers">Alphabet & Numbers</option>
						<option value="specialchar_and_numbers" id="specialchar_and_numbers">Specialchar & Numbers</option>


					</select>
				</div>
			</form>
			<script type="text/javascript">
		
		function generate_pw($valueByUser){
		//alert($valueByUser);
		var valueByUser = $valueByUser;
			
		
			var length = jQuery("#length").val();

			if(length == ""){
			var	length = 30;

			}
			
			if(valueByUser == "all" ){
				
			
			
				
				var chars ='0987654321ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%%^&*()';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);
				
				return true;
					

			}
			
			 if(valueByUser == "only_alphabet"){
				var chars ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);




			}
			 if(valueByUser =="only_numbers"){
				var chars ='1234567890';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 

				return jQuery("#generated_password").html(random_password);



			} 
			 if(valueByUser=="only_specialcharacters"){
				var chars ='~`!@#$%^&*()_+=-';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);

			}
			 if( valueByUser == "specialchar_and_numbers"){
				var chars ='1234567890~`!@#$%^&*()_+=-';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);

			}
			 if(valueByUser =="alphabet_and_numbers"){
				var chars ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);

			}

			if(valueByUser =="alphabet_and_specialcharacters"){
				var chars ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz~`!@#$%^&*()_+=-';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);

			}

			 
			
	}
	</script>

<?php
}
add_shortcode('GenerateShortcode','generateRandomPassword');
?>