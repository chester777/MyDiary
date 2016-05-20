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
					
					if($mode == "new") { ?>

				<td><input type="text" name="new_diaryName"></td>
			</tr>
			<tr>
				<td>날짜</td>
				<td><input type="text" name="new_diaryDate"></td>
			</tr>
			<tr>
				<td>내용</td>
				<td><textarea name="new_diaryContents"></textarea></td>
			</tr>
			<tr>
				<td rowspan=2><input type="submit" value="저장하기"></td>
			</tr>
					<?
						
					}
					else if($mode == "update") {
						$diaryId = $_GET['diaryId'];

						$contents = file("./diary/".$diaryId);
						$diaryName = $contents[0];

						$diaryDate = explode('.', $diaryId);
						$diaryDate = $diaryDate[0];

						$diaryContents = file_get_contents("./diary/".$diaryId);
				?>
					<td><input type="text" value="<?echo $diaryName?>"></td>
				</tr>
				<tr>
					<td>날짜</td>
					<td><input type="text" value="<?echo $diaryDate?>"></td>
				</tr>
				<tr>
					<td>내용</td>
					<td><textarea><?echo $diaryContents?></textarea></td>
				</tr>
				<tr>
					<td rowspan=2><input type="submit" value="수정하기"></td>
				</tr>
				<?}?>
		</table>
	</body>
</html>
