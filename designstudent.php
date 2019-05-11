<?php include 'inc/connect.php'; ?>
<?php
	if(isset($_POST["add"])){

		$masv=$_POST["masv"];
		$hoten=$_POST["tensv"];
		$gioitinh=$_POST["gioitinh"];
		$quequan=$_POST["quequan"];

		$sql="INSERT INTO sinhvien(masv,hoten,gioitinh,quequan)
			VALUES('{$masv}','{$hoten}','{$gioitinh}','{$quequan}')
		";

		$query=mysqli_query($conn,$sql);

		if($query){
			echo "<script>alert('Thêm sinh viên thành công !!!'); </script>";
		}else{
			echo "<script>alert('Thêm sinh viên thất bại !!!'); </script>";
		}
	}

	if(isset($_POST["btn-delete"])){
		$delete=$_POST["delete"];
		$sql="DELETE FROM sinhvien WHERE id='{$delete}'";
		$query=mysqli_query($conn,$sql);
		if($query){
			echo "<script>alert('Xóa sinh viên thành công !!!'); </script>";
		}else{
			echo "<script>alert('Xóa sinh viên thất bại !!!'); </script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sinh viên mới</title>
	<meta charset="utf-8">
</head>
<body>

<h2>Thêm mới sinh viên</h2>

<form action="" method="post">
	<table>
		<tr>
			<td>Mã sinh viên</td>
			<td><input type="text" name="masv" placeholder="Nhập mã sinh viên"></td>
		</tr>
		<tr>
			<td>Tên sinh viên</td>
			<td><input type="text" name="tensv" placeholder="Nhập tên sinh viên"></td>
		</tr>
		<tr>
			<td>Giới tính</td>
			<td>
				<input type="radio" name="gioitinh" value="1"> Nam
				<input type="radio" name="gioitinh" value="0"> Nữ
			</td>
		</tr>
		<tr>
			<td>Quê quán</td>
			<td><input type="text" name="quequan" placeholder="Nhập quê quán"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type="submit" name="add">Thêm sinh viên</button>
				<button type="reset">Nhập lại</button>
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
<h2 style="margin-top:50px;">Danh sách sinh viên</h2>

<table style="margin-top:10px; border:1px solid #ddd;">
	<tbody>
			<tr style="background:#ff3333; color:#fff;">
				<td>STT</td>
				<td>Mã sinh viên</td>
				<td>Tên sinh viên</td>
				<td>Giới tính</td>
				<td>Quê quán</td>
				<td>Hoạt động</td>
			</tr>
			<?php
				$sql1="SELECT * FROM sinhvien";
				$query=mysqli_query($conn,$sql1);
				while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):

			?>
			<tr>
				<td><?=$row["id"]; ?></td>
				<td><?=$row["masv"]; ?></td>
				<td><?=$row["hoten"]; ?></td>
				<td>
					<?php
							if($row["gioitinh"]==1){
								echo "Nam";
							}else{
								echo "Nữ";
							}
					?>
				</td>
				<td><?=$row["quequan"]; ?></td>
				<td>
					<a style="float:left;" href="editStudent.php?id=<?=$row['id']; ?>">Sửa</a>
					<span style="float:left;margin:0 5px 0 10px;">|</span>
					<form style="float:left;" action="" method="post">
						<input type="hidden" name="delete" value="<?=$row['id']; ?>">
						<button style="cursor: pointer;background: transparent;border: 0px !important;color: #ff3333;text-decoration: underline;" type="submit" name="btn-delete" onclick="return confirm('Bạn muốn xóa sinh viên hay không? '); ">Xóa</button>
					</form>
				</td>
			</tr>

		<?php endwhile;?>

	</tbody>
</table>
</body>
</html>
