<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_inventory");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$name = htmlspecialchars(ucwords($data["name"]));
    $id_type = $data["id_type"];
    $asset_no = htmlspecialchars(strtoupper($data["asset_no"]));
    $description = htmlspecialchars(ucwords($data["description"]));
    $id_status = $data["id_status"];
    $id_brand = $data["id_brand"];
    $id_vendor = $data["id_vendor"];
    $delivery_date = $data["delivery_date"];
    $warranty = htmlspecialchars(ucwords($data["warranty"]));
    $serial_number = htmlspecialchars($data["serial_number"]);
    $created_by = $data["created_by"];
    $update_by = $data["update_by"];

    $query = "INSERT INTO m_item VALUES ('', '$name', '$id_type', '$asset_no', '$description', '$id_status', '$id_brand', '$id_vendor', '$delivery_date', '$warranty', '$serial_number', '', '$created_by', '', '$update_by')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM m_item WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
    $name = htmlspecialchars(ucwords($data["name"]));
    $id_type = $data["id_type"];
    $asset_no = htmlspecialchars(strtoupper($data["asset_no"]));
    $description = htmlspecialchars(ucwords($data["description"]));
    $id_status = $data["id_status"];
    $id_brand = $data["id_brand"];
    $id_vendor = $data["id_vendor"];
    $warranty = htmlspecialchars(ucwords($data["warranty"]));
    $serial_number = htmlspecialchars($data["serial_number"]);
    $created_at = $data["created_at"];
    $created_by = $data["created_by"];
    $update_at = $data["update_at"];
    $update_by = $data["update_by"];

    $query = "UPDATE `m_item` SET `name` = '$name', `asset_no` = '$asset_no', `description` = '$description', `warranty` = '$warranty', `serial_number` = $serial_number, `update_at` = current_time() WHERE `m_item`.`id` = $id;
    ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM m_item
				WHERE
			  name LIKE '%$keyword%' OR
			  asset_no LIKE '%$keyword%' OR
			  serial_number LIKE '%$keyword%'
			";
	return query($query);
}


function registrasi($data) {
	global $conn;

	$name = htmlspecialchars($data["name"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $password2 = htmlspecialchars($data["password2"]);
    $email = htmlspecialchars($data["email"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM m_user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username is already registered!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('Confirm password is incorrect!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO m_user VALUES ('', '$name', '$username', '$password', '$email', '', '', '', '', '')");

	return mysqli_affected_rows($conn);

}









?>