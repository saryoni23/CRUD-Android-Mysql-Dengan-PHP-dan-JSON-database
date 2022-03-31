<?php
/*
 * By 		: Indra Saryoni Simanjuntak
 * URL 		: https://saryoni23.github.io/
 * email 	: indrasaryoni@gmail.com
 * facebook	: facebook.com/indrasaryoni23
 * twitter 	: twitter.com/Isaryoni
 * */

$server = "localhost";
$username = "root";
$password = "";
$database = "db_crud";

$dbconnek = mysqli_connect($server, $username, $password) or die("<h1>Koneksi Mysql Error : </h1>" . mysqli_error());
mysqli_select_db($dbconnek, $database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysqli_error());

@$operasi = $_GET['operasi'];

switch ($operasi) {
    case "view":
        /* Source code untuk Menampilkan Biodata */

        $query_tampil_biodata = mysqli_query("SELECT * FROM tabel_biodata") or die(mysqli_error());
        $data_array = array();
        while ($data = mysqli_fetch_assoc($query_tampil_biodata)) {
            $data_array[] = $data;
        }
        echo json_encode($data_array);

        // print json_encode($data_array);
        // [{"id":"1","nama":"Indra Saryoni Simanjuntak","Alamat":"Sipahutar"},{"id":"2","nama":"Berkat Junaidi Banurea","Alamat":"Sidikalang"},{"id":"3","nama":"Totok BluesMan Silalahi","Alamat":"Medan"}]

        break;
    case "insert":
        /* Source code untuk Insert data */
        @$nama = $_GET['nama'];
        @$alamat = $_GET['alamat'];
        $query_insert_data = mysqli_query("INSERT INTO tabel_biodata (nama, alamat) VALUES('$nama', '$alamat')");
        if ($query_insert_data) {
            echo "Data Berhasil Disimpan";
        } else {
            echo "Error Inser Biodata " . mysqli_error();
        }

        break;
    case "get_biodata_by_id":
        /* Source code untuk Edit data dan mengirim data berdasarkan id yang diminta */
        @$id = $_GET['id'];

        $query_tampil_biodata = mysqli_query("SELECT * FROM tabel_biodata WHERE id='$id'") or die(mysqli_error());
        $data_array = array();
        $data_array = mysql_fetch_assoc($query_tampil_biodata);
        echo "[" . json_encode($data_array) . "]";


        break;
    case "update":
        /* Source code untuk Updatedata */
        @$nama = $_GET['nama'];
        @$alamat = $_GET['alamat'];
        @$id = $_GET['id'];
        $query_update_biodata = mysqli_query("UPDATE tabel_biodata SET nama='$nama', alamat='$alamat' WHERE id='$id'");
        if ($query_update_biodata) {
            echo "Update Data Berhasil";
        } else {
            echo mysqli_error();
        }
        break;
    case "delete":
        /* Source code untuk Deletedata */
        @$id = $_GET['id'];
        $query_delete_biodata = mysqli_query("DELETE FROM tabel_biodata WHERE id='$id'");
        if ($query_delete_biodata) {
            echo "Delete Data Berhasil";
        } else {
            echo mysqli_error();
        }

        break;

    default:
        break;
}
