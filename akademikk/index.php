<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .mx-auto {
        width: 800px
    }

    .card {
        margin-top: 10 px;
    }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <h5 class="card-header">Create / Edit Data</h5>
            <div class="card-body">
                <form action="create.php" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="nim" name="nim">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="fakultas" id="fakultas" required>
                                <option value="">- Pilih Fakultas -</option>
                                <option value="FT">Fakultas Teknik (FT)</option>
                                <option value="FKIP">FKIP</option>
                                <option value="FE">Fakultas Ekonomi (FE)</option>
                                <option value="FH">Fakultas Hukum (FH)</option>
                                <option value="FAI">Fakultas Agama Islam (FAI)</option>
                                <option value="FIK">Fakultas Ilmu Kesehatan (FIK)</option>
                                <option value="FISIP">Fakultas Ilmu Pemerintahan (FISIP)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="mt-2 card">
            <h5 class="card-header text-white bg-secondary">Data Mahasiswa</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM mahasiswa";
                        $data = mysqli_query($koneksi, $sql);
                        $urut = 1;
                        while ($i = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++; ?></th>
                            <td scope="row"> <?php echo $i['nim']; ?></td>
                            <td scope="row"> <?php echo $i['nama']; ?></td>
                            <td scope="row"> <?php echo $i['alamat']; ?></td>
                            <td scope="row"> <?php echo $i['fakultas']; ?></td>
                            <td scope="row">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#static<?php echo $i['nim']; ?>">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="static<?php echo $i['nim'];?>" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="static<?php echo $i['nim'];?>Label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="static<?php echo $i['nim'];?>Label">Update
                                                    Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="update.php" method="POST">
                                                    <div class="mb-3 row">
                                                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                                        <div class="col-sm-10">
                                                            <input required type="text" class="form-control" id="nim"
                                                                name="nim" value="<?php echo $i['nim']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class=" mb-3 row">
                                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input required type="text" class="form-control" id="nama"
                                                                name="nama" value="<?php echo $i['nama']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class=" mb-3 row">
                                                        <label for="alamat"
                                                            class="col-sm-2 col-form-label">Alamat</label>
                                                        <div class="col-sm-10">
                                                            <input required type="text" class="form-control" id="alamat"
                                                                name="alamat" value="<?php echo $i['alamat']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class=" mb-3 row">
                                                        <label for="fakultas"
                                                            class="col-sm-2 col-form-label">Fakultas</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="fakultas" id="fakultas"
                                                                required>
                                                                <option value="">- Pilih Fakultas -</option>
                                                                <option value="FT">Fakultas Teknik (FT)</option>
                                                                <option value="FKIP">FKIP
                                                                </option>
                                                                <option value="FE">Fakultas Ekonomi (FE)</option>
                                                                <option value="FH">Fakultas Hukum (FH)</option>
                                                                <option value="FAI">Fakultas Agama Islam (FAI)</option>
                                                                <option value="FIK">Fakultas Ilmu Kesehatan (FIK)
                                                                </option>
                                                                <option value="FISIP">Fakultas Ilmu Pemerintahan (FISIP)
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Perbarui">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- button delete -->
                                <a href="delete.php?nim=<?php echo $i['nim'] ?>"
                                    onclick="return confirm('Yakin mau delete data?')"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                    </thead>
                </table>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
</body>

</html>