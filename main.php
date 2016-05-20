<!-- 

+--------------------------------+
|                                |
|             Title              |
|                                |
+---------------+----------------+
|               |                |
|               |                |
|               |                |
|   diary_      |   read         |
|   list.php    |   _diary.php   |
|               |                |
|               |                |
|               |                |
|               |                |
|               |                |
|               |                |
+---------------+----------------+
|                                |
|                                |
+---------------+----------------+

위와 같이 페이지 레이아웃을 구성해주세요.
-->

<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>My Diary</title>
	</head>

	<?
		//session check
		if( !file_exists("session.key") ) {
			echo 
				"<script>
					alert('세션이 만료되었습니다.');
					window.location.replace(\"login.html\");
				</script>";
		}
		else {
			$session = file("session.key");
			$session = $session[0];

			$contents = file("passwd.txt");
			$id = trim($contents[0]);
			$pw = trim($contents[1]);

			$temp_session = md5("".$id.$pw);

			if( $session != $temp_session ) {
				echo "$session"."<br>";
				echo "$temp_session"."<br>";
				echo 
					"<script>
						alert('세션이 만료되었습니다.');
						window.location.replace(\"login.html\");
					</script>";
			}
		}
	?>

	<body>

		<div>
			<? include("diary_list.php") ?>
		</div>

		<div>
			<? include("read_diary.php") ?>
			<input type="button" value="일기 수정" onclick="window.location.replace('write_diary.php?mode=update')"\>
		</div>
		<div>
			<input type="button" value="새로운 일기 쓰기" onclick="window.location.replace('write_diary.php?mode=new')"\>
		</div>

	</body>

</html>

