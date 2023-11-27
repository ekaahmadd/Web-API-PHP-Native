
<?php


require_once "koneksi.php";

if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_buku()
{
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM buku");
    while($row = mysqli_fetch_object($query))
    {
        $data[] = $row;
    }
    $response=array(
        "status" => 1,
        "messege" => "success",
        "data" => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}
function get_buku_id()
{
    global $koneksi;
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    }
    $query = $koneksi->query("SELECT * FROM buku WHERE id=$id");
    while($row = mysqli_fetch_object($query))
    {
        $data[] = $row;
    }
    $response=array(
        'status' => 1,
        'messege' => 'success',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

function post_buku(){
    global $koneksi;
    $check = array('judul'=>'', 'penerbit'=>'', 'pengarang'=>'', 'tahun'=>'', 'kategori_id'=>'','harga'=>'',);
    $check_match = count(array_intersect_key($_POST,$check));
    if($check_match == count($check)){
        // $id = $_POST['id'];
        $judul = $_POST['judul'];
        $penerbit = $_POST['penerbit'];
        $pengarang = $_POST['pengarang'];
        $tahun = $_POST['tahun'];
        $kategori_id = $_POST['kategori_id'];
        $harga = $_POST['harga'];
        
        $result = mysqli_query($koneksi, "INSERT INTO buku ( judul, penerbit, pengarang, tahun, kategori_id, harga) VALUES (
            
            '$judul',
            '$penerbit',
            '$pengarang'
            '$tahun'
            '$kategori_id'
            '$harga'

        )");

        $data[] = $result; 

        if($result){
            $response = array(
                'status' => 1,
                'messege' => 'sukses',
                'data' => $data
            );
        }else{
            $response = array(
                'status' => 0,
                'messege' => 'eror'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

function update_buku()
{
    global $koneksi;
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    }

    $check = array('judul'=>'', 'penerbit'=>'', 'pengarang'=>'', 'tahun'=>'', 'kategori_id'=>'','harga'=>'',);
    $check_match = count(array_intersect_key($_POST,$check));
    if($check_match == count($check)){
        $id = $_GET['id'];
        $judul = $_POST['judul'];
        $penerbit = $_POST['penerbit'];
        $pengarang = $_POST['pengarang'];
        $tahun = $_POST['tahun'];
        $kategori_id = $_POST['kategori_id'];
        $harga = $_POST['harga'];

        $result = mysqli_query($koneksi, "UPDATE  buku SET           
            judul ='$judul',
            penerbit = '$penerbit',
            pengarang = '$pengarang'
            tahun = '$tahun'
            kategori_id = '$kategori_id'
            harga = '$harga'
            WHERE id = $id
        ");
    }

    if($result){
        $response = array(
            'status' => 1,
            'messege' => 'sukses',
            'data' => [
                'judul' =>'$judul',
                'penerbit' => '$penerbit',
                'pengarang' => '$pengarang',
                'tahun' => '$tahun',
                'kategori_id' => '$kategori_id',
                'harga' => '$harga'
            ]
        );
    }else{
        $response = array(
            'status' => 0,
            'messege' => 'eror',
            'data' => $id
        );
    }
    header('Content-Type: application/json');
        echo json_encode($response);

}

function delete_buku()
{
    global $koneksi;
    $id = $_GET['id'];
    $query = "DELETE FROM buku WHERE id = $id";
    if(mysqli_query($koneksi,$query)){
        $response=array(
            'status' => 1,
            'messege' => 'Delete Success'
        );
    }else{
        $response=array(
            'status' => 1,
            'messege' => 'Delete Faill'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

?>