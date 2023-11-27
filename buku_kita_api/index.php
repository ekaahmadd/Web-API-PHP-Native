
<?php 

$curl = curl_init(); // Mendefinisikan objek CurlHandle

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/api_buku_kita/php_restapi.php?function=get_buku',// harus sesuai direktori
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$response_data = json_decode($response);

$buku_data = $response_data->data;

curl_close($curl);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css>
</head>
<body>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Judul Buku</th>
                <th>Penerbit</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Kategori Id</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($buku_data as $data): ?>
            <tr>
                <td><?= $data->id ?></td>
                <td><?= $data->judul ?></td>
                <td><?= $data->penerbit ?></td>
                <td><?= $data->pengarang ?></td>
                <td><?= $data->tahun ?></td>
                <td><?= $data->kategori_id ?></td>
                <td><?= $data->harga ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        <tfoot>
        </tfoot>
    </table>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
  new DataTable('#example');
  </script>
</body>
<script>
</html>