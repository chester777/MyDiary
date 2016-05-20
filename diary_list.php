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

		if( $_GET['redirect'] != "" ) {
			redirect($_GET['redirect']);
			echo "window.location.replace('main.php');";
		}

		//fetch diary name

		function diaryName($file)
		{
			$contents = file("./diary/".$file);
			$diaryName = $contents[0];
			
			echo $diaryName;
		}

		function diaryDate($file)
		{
			$diaryDate = explode('.', $file);
			$diaryDate = $diaryDate[0];
			
			echo $diaryDate;
		}

		function redirect($file)
		{
			$_SESSION["diaryId"] = $file;

			$contents = file("./diary/".$file);
			$_SESSION["diaryName"] = $contents[0];

			$diaryDate = explode('.', $file);
			$diaryDate = $diaryDate[0];
			$_SESSION["diaryDate"] = $diaryDate;
		}
	?>

	<body>
		<?
			$files = scandir("./diary/");

			if(count($files) <= 2) {
				?>
				작성된 일기가 없습니다.
				<?
			}
			else {
				?>
				<table>
					<tr>
						<td>일기 제목</td>
						<td>작성일</td>
					</tr>
					<?
					foreach ($files as $file) {
						if($file == "." || $file == "..") continue;
						?>
						
						<tr>
							<td>
								<a href="diary_list.php?redirect=true"><? diaryName($file); ?></a>
							</td>
							<td><?diaryDate($file)?></td>
						</tr>

						<?
					}
					?>
				</table>
				<?
			}

		?>
	</body>

</html>