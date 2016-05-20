<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>My Diary</title>
	</head>

	<body>
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

		if( $_SESSION['diaryId'] != "") {
			$diaryId = $_SESSION['diaryId'];
			$diaryName = $_SESSION['diaryName'];
			$diaryDate = $_SESSION['diaryDate'];

			$diaryContents = file_get_contents("./diary/".$diaryId);	
	?>
		<table>
			<tr>
				<td>제목</td>
				<td><?echo $diaryName?></td>
			</tr>
			<tr>
				<td>날짜</td>
				<td><?echo $diaryDate?></td>
			</tr>
			<tr>
				<td>내용</td>
				<td><?echo $diaryContents?></td>
			</tr>
		</table>

	<?
		} else {
	?>
		일기를 선택해주세요.
	<?
		}
	?>
	</body>

</html>

