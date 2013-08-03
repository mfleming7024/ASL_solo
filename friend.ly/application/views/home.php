<div id="header">
	    <a href="/"><img src="/images/logo.png" alt="blah" />
		<h1>Friend.ly</h1></a>
		<form id="login_form" enctype="multipart/form-data" method="post" action="/user/login">
			<input type="text" name="username" id="username" placeholder="Username" />
			<input type="password" name="password" id="password" placeholder="Password" />
			<input type="submit" class="login" id="login_btn" value="Login" />
			<p><?php if(isset($message)){echo $message;} ?></p>
		</form>
    </div>

    <div id="container">
	    <div class="cta">
			<div class="register_title">
				<h1>Create your account today!</h1>
				<img src="/images/happy-face.png" />
			</div>
			<div class="register">
				<form id="register_form" enctype="multipart/form-data" method="post" action="/user/perform_register">
					<p><?php if(isset($error)){echo $error;} ?></p>
					<input type="text" name="username" id="r_user_name" placeholder="Username" />
					<input type="password" name="password" id="r_password" placeholder="Password" />
					<input type="email" name="email" id="r_email" placeholder="E-mail" />
					<input type="submit" id="r_submit" class="sign_up" value="Register" />
				</form>
			</div>
		</div>
		
		<div class="information">
			<div class="additional">
				<p>Friend.ly is a <span class="free">free</span> to use private messenger application<br />
			Join today to get access to all these cool features!</p>
			</div>
			<div class="column">
				<h2>Keep all your stuff safe</h2>
				<img src="/images/database.png" alt="database" width="32" height="32">
				<p>We keep everything backed up to a database so you never have to worry about erased conversations or internet fails.</p>
			</div>
			<div class="column">
				<h2>Sync all of your contacts</h2>
				<img src="/images/mobile2.png" alt="mobile2" width="32" height="32">
				<p>By integrating with the Facebook API you can instantly sync all of your friends contact information into your chat window</p>
			</div>
			<div class="column">
				<h2>Manage your conversations</h2>
				<img src="/images/chat-.png" alt="chat-" width="32" height="32">
				<p>Memory can be used as a tool to manage all of your projects in one place. You are able to add, edit and delete existing or new projects.</p>
			</div>
		</div>
    </div>
