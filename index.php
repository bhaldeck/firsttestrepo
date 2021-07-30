<?php
  include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      table{
        width: 840px;
        margin: auto;
      }
      h1{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Tabel Biodata Mahasiswa</h1>
    <center><a href="input.php">Input Data &Gt; </a></center>
    <br/>
    <table border="1">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Fakultas</th>
        <th>Jurusan</th>
        <th>IPK</th>
        <th>Pilihan</th>
      </tr>
      <?php
      $query = "SELECT * FROM data_mahasiswa ORDER BY nim ASC";
      $result = mysqli_query($link, $query);
      if(!$result){
        die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
      }

      
      $no = 1;
      while($data = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td>$no</td>"; 
        echo "<td>$data[nim]</td>";
        echo "<td>$data[nama]</td>";
        echo "<td>$data[fakultas]</td>";
        echo "<td>$data[jurusan]</td>"; 
        echo "<td>$data[ipk]</td>";echo '<td>
          <a href="edit.php?id='.$data['id'].'">Edit</a> /
          <a href="hapus.php?id='.$data['id'].'"
      		  onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
        </td>';
        echo "</tr>";
        $no++; 
      }
      ?>
    </table>
  </body>
</html>