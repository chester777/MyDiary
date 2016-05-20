<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>My Diary</title>
	</head>

	<body>
		<table>
			<tr>
				<td>제목</td>
				<?
					$mode = $_GET['mode'];

					if($mode == "new") {
						

					}
					else if($mode == "update") {
						$diaryId = $_SESSION['diaryId']; 
						$diaryName = $_SESSION['diaryName'];
						$diaryDate = $_SESSION['diaryDate'];

						echo $diaryId;

						$diaryContents = file_get_contents("./diary/".$diaryId);
					}
				?>
				<td><input type="text" value="<?echo $diaryName?>"></td>
			</tr>
			<tr>
				<td>날짜</td>
				<td><input type="text" value="<?echo $diaryDate?>"></td>
			</tr>
			<tr>
				<td>내용</td>
				<td><input type="textarea" value="<?echo $diaryDate?>"></td>
			</tr>
			<tr>
				<td rowspan=2><input type="submit" value="수정하기"></td>
			</tr>
		</table>
	</body>
</html>
