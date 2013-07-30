<div id="header">
	    <a href="/"><img src="/images/logo.png" alt="blah" />
		<h1>Friend.ly</h1></a>
		<form id="login_form" method="post" action="/user/logout">
			<h2>Welcome, Michael<!--<?php echo $this->session->userdata("username");  ?>--></h2>
			<input type="submit" class="login" id="login_btn" value="Logout" />
		</form>
    </div>

    <div id="app_container">
    	<div id="chat_window">
    		<?php
			if (!isset($messages[0]["recieverId"])) {
				echo "
					<div id='active_user'>
						<h3>Please select a user with messages from your contacts</h3>
						<hr />
					</div>";
			} else {
				echo "
					<div id='active_user'>
						<h3>" . $username["username"] . "</h3>
						<hr />
					</div>";
					
				$counter = 0;
			
				foreach ($messages as $message) {
					if ($counter%2 == 1) {
						echo "
					    	<div class='message' id='right'>
			    				<p class='date'>" . $message["date"] . "</p>
			    				<p class='sender'>Sent by You</p>
			    				<h2>" . $message["message"] . "</h2>
			    			</div>
			    			<hr  class='message_seperator'/>";
					} else {
						echo "
						    <div class='message' id='left'>
			    				<p class='date'>" . $message["date"] . "</p>
			    				<p class='sender'>Sent by You</p>
			    				<h2>" . $message["message"] . "</h2>
			    			</div>
			    			<hr  class='message_seperator'/>";
					}; 
					$counter++;
				};
			}
			
			?>
			<form id="text_input_box" method="post" action="/user/message/<?php if (isset($username["username"])) {echo $username["username"];}?>"> 
			<input type="text" name="message" id="message_box" placeholder="Enter Text Here">
			<?php if (isset($username["username"])) {
				echo "<button type='submit'>";
			}
    		?>	
    		</form>
    	</div>

    	<div id="sidebar">
    		<?php

				foreach ($contacts->result() as $row) {
					echo "
	    				<div class='contact'>
	    				<h4>" . $row->username . "</h4>
	    				<a href='/user/chat/" . $row->userId . "'><img src='/images/chat-02.png'></a>
	    				</div>
	    			";
				};
				
			?>
	    	<div id="new_contact">
    			<hr />
    			<a href="#"><img src="/images/new_contact.png" /></a>
    			<hr />
    		</div>
    	</div>
	</div>
