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
		
});
