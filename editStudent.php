<?php include 'inc/connect.php'; ?>
<?php
	$id=$_GET["id"];

	if(isset($id)){
		$sql="SELECT * FROM sinhvien WHERE id='{$id}'";
		$row=mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);

		if(isset($_POST["edit"])){
				$masv=$_POST["masv"];
				$hoten=$_POST["tensv"];
				isset($_POST["gioitinh"])?$gioitinh=$_POST["gioitinh"] : 0;
				$quequan=$_POST["quequan"];

				$sql="UPDATE sinhvien SET masv='{$masv}',hoten='{$hoten}',gioitinh='{$gioitinh}',quequan='{$quequan}' WHERE id='{$id}'";

				$query=mysqli_query($conn,$sql);

				if($query){
					echo "<script>alert('Sửa sinh viên thành công !!!'); </script>";
				}else{
					echo "<script>alert('Sửa sinh viên thất bại !!!'); </script>";
				}
		}
	}else{
		die("Bài viết không tồn tại");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sinh viên mới</title>
	<meta charset="utf-8">
</head>
<body>
<a href="designstudent.php"><< Quay lại</a>
<h2>Sửa sinh viên: <?=$row['hoten']; ?></h2>

<form action="" method="post">
	<table>
		<tr>
			<td>Mã sinh viên</td>
			<td><input type="text" name="masv" value="<?=$row['masv']; ?>" readonly="readonly"></td>
		</tr>
		<tr>
			<td>Tên sinh viên</td>
			<td><input type="text" name="tensv" value="<?=$row['hoten']; ?>"></td>
		</tr>
		<tr>
			<td>Giới tính</td>
			<td>
				<input type="radio" name="gioitinh" <?php if($row['gioitinh']==1){echo "checked"; } ?> value="1"> Nam
				<input type="radio" name="gioitinh" <?php if($row['gioitinh']==0){echo "checked"; } ?> value="0"> Nữ
			</td>
		</tr>
		<tr>
			<td>Quê quán</td>
			<td><input type="text" name="quequan" value="<?=$row['quequan']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type="submit" name="edit">Sửa sinh viên</button>
			</td>
		</tr>
	</table>
</form>

<style>
	table,td,tr{
		border:1px solid #ddd;
		border-collapse: collapse;
		padding:8px;
	}
</style>
</table>
</body>
</html>
