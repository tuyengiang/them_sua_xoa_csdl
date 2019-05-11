<?php
      $conn = mysqli_connect('localhost', 'root', '', 'qlsv');
      if ($conn) {
          mysqli_set_charset($conn, 'utf8');
      } else {
          die('Kết nối csdl không thành công').mysqli_error($conn);
      }

      function giang(){

      }
