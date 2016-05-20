<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
	$inputId = $_REQUEST['id'];
	$inputPasswd = $_REQUEST['passwd'];

	if( file_exists("passwd.txt") ) {

		$contents = file("passwd.txt");
		$id = trim($contents[0]);
		$pw = trim($contents[1]);

		if($inputId == $id && $inputPasswd == $pw) { // login success
			createSession($id, $pw);
			echo 
				"<script>
					window.location.replace(\"main.php\");
				</script>";
		}
		else {
			// login fail
			echo 
				"<script>
					alert('로그인 정보가 틀렸습니다.');
					window.location.replace(\"login.html\");
				</script>";
		}
	}
	else {
		// this branch is error
	}

	function createSession($id, $pw)
	{
		$sessionKey = "".$id.$pw;
		$sessionKey = md5($sessionKey);
		file_put_contents("session.key", $sessionKey);
	}
?>