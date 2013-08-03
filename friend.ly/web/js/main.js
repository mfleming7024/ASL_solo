$(function(){

	var $this = $("#chat_window");
	var $that = $("#sidebar");
	
	var $messageBox = $("#text_input_box");
	
	$this.height($this.height() + $messageBox.height() + 22);
	
	if ($this.height() > $that.height()) {
		$that.height($this.height());
	} else {
		$this.height($that.height());
	}
	
	
	var $container = $("#new_contact");
	var $addBtn = $("#add_button");
	
	$addBtn.on("click", function(e) {
		e.preventDefault();
		
		$addBtn.html("<form method='post' action='/user/add_friend'><input type='text' id='friend_search' placeholder='Search for friends'><input type='submit' id='add_contact' value=''></form>");
		
		return false;
	});
		
});
