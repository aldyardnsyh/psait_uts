<?php

require_once "config.php";

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (!empty($_GET["nim"])) {
            $nim = $_GET["nim"];
            tampilkanNilaiMahasiswa($nim);
        } else {
            tampilkanNilai();
        }
        break;
    case 'POST':
        insertNilai();
        break;
    case 'PUT':
        if (!empty($_GET["nim"]) && !empty($_GET["kode_mk"])) {
            $nim = $_GET["nim"];
            $kode_mk = $_GET["kode_mk"];
            updateNilai($nim, $kode_mk);
        } else {
            header("HTTP/1.0 400 Bad Request");
            echo json_encode(array("status" => 0, "message" => "Parameter tidak lengkap"));
        }
        break;
    case 'DELETE':
        if (!empty($_GET["nim"]) && !empty($_GET["kode_mk"])) {
            $nim = $_GET["nim"];
            $kode_mk = $_GET["kode_mk"];
            deleteNilai($nim, $kode_mk);
        } else {
            header("HTTP/1.0 400 Bad Request");
            echo json_encode(array("status" => 0, "message" => "Parameter tidak lengkap"));
        }
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function tampilkanNilai()
{
    global $mysqli;
    $query = "SELECT * FROM perkuliahans";
    $data = array();
    $result = $mysqli->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message' => 'Get List Nilai Mahasiswa Successfully.',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

function tampilkanNilaiMahasiswa($nim)
{
    global $mysqli;
    $query = "SELECT * FROM perkuliahans WHERE nim = '$nim'";
    $data = array();
    $result = $mysqli->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message' => 'Get Nilai Mahasiswa Successfully.',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

function insertNilai()
{
    global $mysqli;
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['nim']) && isset($data['kode_mk']) && isset($data['nilai'])) {
        $nim = $data['nim'];
        $kode_mk = $data['kode_mk'];
        $nilai = $data['nilai'];

        $query_check = "SELECT * FROM perkuliahans WHERE nim = '$nim' AND kode_mk = '$kode_mk'";
        $result_check = $mysqli->query($query_check);

        if ($result_check->num_rows > 0) {
            $query_update = "UPDATE perkuliahans SET nilai = $nilai WHERE nim = '$nim' AND kode_mk = '$kode_mk'";
            if (mysqli_query($mysqli, $query_update)) {
                $response = array(
                    'status' => 1,
                    'message' => 'Nilai Mahasiswa Updated Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Failed to Update Nilai Mahasiswa.'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Combination of nim and kode_mk does not exist.'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Parameter Do Not Match'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function updateNilai($nim, $kode_mk)
{
    global $mysqli;

    $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : null;

    if ($nilai !== null) {
        $nilai = mysqli_real_escape_string($mysqli, $nilai);

        $query = "UPDATE perkuliahans SET nilai = '$nilai' WHERE nim = '$nim' AND kode_mk = '$kode_mk'";
        if (mysqli_query($mysqli, $query)) {
            $response = array(
                'status' => 1,
                'message' => 'Nilai Mahasiswa Updated Successfully.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Failed to Update Nilai Mahasiswa.'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Parameter Do Not Match'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function deleteNilai($nim, $kode_mk)
{
    global $mysqli;
    $nim = mysqli_real_escape_string($mysqli, $nim);
    $kode_mk = mysqli_real_escape_string($mysqli, $kode_mk);

    $query = "DELETE FROM perkuliahans WHERE nim = '$nim' AND kode_mk = '$kode_mk'";
    if (mysqli_query($mysqli, $query)) {
        $response = array(
            'status' => 1,
            'message' => 'Nilai Mahasiswa Deleted Successfully.'
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Failed to Delete Nilai Mahasiswa.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


