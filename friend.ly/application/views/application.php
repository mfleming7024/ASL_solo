<div id="header">
	    <a href="/"><img src="/images/logo.png" alt="blah" />
		<h1>Friend.ly</h1></a>
		<form id="login_form" method="post" action="/user/logout">
			<h2>Welcome, <?php echo $this->session->userdata("username");  ?></h2>
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
				foreach($messages as $message) {
					if ($message["recieverId"] == $this->session->userdata("userId")) {
						
					} else {
						$reciever = $message["recieverId"];
					}
				}
				echo "
					<div id='active_user'>
						<h3>" . $username["username"] . "</h3>
						<p><a href='/user/delete/" . $reciever . "'>Delete All Messages</a></p>						
						<hr />
					</div>";
					
				
				foreach($messages as $message) {
					if ($message["recieverId"] == $this->session->userdata("userId")) {
						echo "
					    	<div class='message' id='right'>
			    				<p class='date'>" . $message["date"] . "</p>
			    				<h2>" . $message["message"] . "</h2>
			    			</div>
			    			<hr  class='message_seperator'/>";
					}  else {
						echo "
						    <div class='message' id='left'>
			    				<p class='date'>" . $message["date"] . "</p>
			    				<h2>" . $message["message"] . "</h2>
			    			</div>
			    			<hr class='message_seperator'/>";
			    	}; 
				}
				
			}
			?>
			
			<form id="text_input_box" method="post" action="/user/message/<?php if (isset($username["username"])) {echo $username["username"];}?>"> 
			<?php 
				if (isset($username["username"])) {
					echo "<input type='text' name='message' id='message_box' placeholder='Enter Text Here'>";
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
    			<a href="#" id="add_button"><img src="/images/new_contact.png" /></a>
    			<hr />
    		</div>
    	</div>
	</div>
