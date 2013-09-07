<?php   
    if( $_POST['eventick_hidden'] == 'Y' ) {  
        //Form data sent  
        $username = $_POST['eventick_username'];  
        update_option('eventick_username', $username);  
          
        $password = $_POST['eventick_password'];  
        update_option('eventick_password', $password);  
        ?>  
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
        <?php  
    } else {  
        //Normal page display  
        $username = get_option('eventick_username');  
        $password = get_option('eventick_password');  
    }  
?>  
<div class="wrap">

	<div id="icon-options-general" class="icon32"><br></div>
	<h2><?php echo __( 'Eventick Setings', 'eventick_trdom' ) ?></h2>
      
    <form name="eventick_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
        <input type="hidden" name="eventick_hidden" value="Y">  
        <table class="form-table">
        	<tbody>
        		<tr>
        			<th scope="row"><?php _e("Username: " ); ?></th>
        			<td><input type="text" name="eventick_username" value="<?php echo $username; ?>" size="20"><?php _e(" ex: you@domain.com" ); ?></td>
        		</tr>
        		<tr>
        			<th scope="row"><?php _e("Password: " ); ?></th>
        			<td><input type="password" name="eventick_password" value="<?php echo $password; ?>" size="20"><?php _e(" ex: secretpassword" ); ?></td>
        		</tr>
        	</tbody>
        </table>
        <p class="submit">  
        	<input type="submit" name="submit" class="button button-primary" value="<?php _e('Update Options', 'eventick_trdom' ) ?>" />  
        </p>
    </form>

</div>