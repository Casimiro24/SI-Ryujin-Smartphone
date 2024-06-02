<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Web Form</title>
    <style>
      * {
        box-sizing: border-box;
      }
      body {
        background-color: rgb(91, 207, 243);
        font-family: Arial, Helvetica, sans-serif;
      }

      h1 {
        margin-bottom: 50px;
      }

      .container {
        display: flex;
        flex-direction: column;
        background-color: white;
        width: 30%;
        margin: 20px auto;
        padding: 20px;
        justify-content: center;
        border-radius: 5px;
        box-shadow: 0 4px 5px 2px rgba(0, 0, 0, 0.2);
      }

      .input {
        display: flex;
        padding: 10px;
      }

      label {
        flex-basis: 20%;
        text-align: left;
      }

      .input_form {
        width: 100%;
        padding: 5px;
        margin-left: 20px;
      }

      .button {
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        background: rgb(91, 207, 243);
        border-radius: 3px;
        cursor: pointer;
        border: none;
      }

      .button:hover {
        background-color: rgb(59, 194, 235);
        font-size: 15px;
      }

      textarea {
        width: 100%;
      }
    </style>
  </head>
  <body>
    <center>
      <h1>Data Mahasiswa ITN Malang</h1>
      <div class="container">
        <h3>Input Data Mahasiswa</h3>
        <form action="" method="POST">
          <div class="input">
            <label for="nama">Nama</label>
            <input class="input_form" type="text" name="nama" id="nama" />
          </div>

          <div class="input">
            <label for="nim">Nim</label>
            <input class="input_form" type="text" name="nim" id="nim" />
          </div>
          <div class="input">
            <label for="prodi">Prodi</label>
            <input class="input_form" type="text" name="prodi" id="prodi" />
          </div>
          <div class="input">
            <label for="fakultas">Fakultas</label>
            <input
              class="input_form"
              type="text"
              name="fakultas"
              id="fakultas"
            />
          </div>
          <div class="btn">
            <input
              type="submit"
              class="button"
              name="btn_proses"
              value="Proses"
            />
          </div>
          <div class="input">

             <?php 
                if($_POST) {
                  $nama = $_POST['nama'];
                  $nim = $_POST['nim'];
                  $prodi = $_POST['prodi'];
                  $fakultas = $_POST['fakultas'];
                }

                if($_POST != null) {
                  echo "$nama <br>";
                  echo "$nim <br>";
                  echo "$prodi <br>";
                  echo "$fakultas <br>";
                }
              ?>    
          </div>
        </form>
      </div>
    </center>
  </body>
</html>
