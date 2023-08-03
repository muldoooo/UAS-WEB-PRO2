<section class="content pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-center">Daftar Produk</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i>Tambah</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Kode Produk</th>
                                    <th class="text-center">Nama Produk</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Kualitas</th>
                                    <th class="text-center">UOM</th>
                                    <th class="text-center">GRID</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($daftar_produk as $produk) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td class="text-center">
                                            <img src="<?= base_url() ?>assets/img/<?= $produk->photo; ?>" alt="" height="100px">
                                        </td>
                                        <td class="text-center"><?= $produk->kode_produk; ?></td>
                                        <td class="text-center"><?= $produk->nama_produk; ?></td>
                                        <td class="text-center"><?= $produk->nama_kategori; ?></td>
                                        <td class="text-center"><?= $produk->kwalitas; ?></td>
                                        <td class="text-center"><?= $produk->uom; ?></td>
                                        <td class="text-center"><?= $produk->grid; ?></td>
                                        <td class="text-center"><?= $produk->qty; ?></td>
                                        <td>
                                            <!-- Modal Edit Produk -->
                                            <section class="content">
                                                <div class="modal fade" id="modal-edit<?= $produk->id_produk; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Data Produk</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form name="frmassets" enctype="multipart/form-data" method="post" action="<?php base_url() ?>/produk/simpan_edit">
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="">Foto Produk</label>
                                                                            <input type="file" class="form-control" id="" name="photo" placeholder="Lampirkan JPG/JPEG/PNG">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Kode Produk</label>
                                                                            <input type="text" class="form-control" id="" name="kode_produk" value="<?= $produk->kode_produk ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Nama Produk</label>
                                                                            <input type="text" class="form-control" id="" name="nama_produk" value="<?= $produk->nama_produk ?>">
                                                                        </div>
                                                                        <div class="">
                                                                            <label for="Pilih Kategori">Kategori</label>
                                                                            <select name="kategori" id="" class="form-control">
                                                                                <option value="">Pilih</option>
                                                                                <?php
                                                                                foreach ($kategori as $kat) { ?>
                                                                                    <option value="<?= $kat->id_kategori; ?>" <?php if (
                                                                                                                                    $produk->kategori == $kat->id_kategori
                                                                                                                                ) echo "selected"; ?>>
                                                                                        <?= $kat->nama_kategori; ?>
                                                                                    </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Kualitas</label>
                                                                            <input type="text" class="form-control" id="" name="kwalitas" value="<?= $produk->kwalitas ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">UOM</label>
                                                                            <input type="text" class="form-control" id="" name="uom" value="<?= $produk->uom; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Letak Grid</label>
                                                                            <input type="text" class="form-control" id="" name="grid" value="<?= $produk->grid; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">QTY</label>
                                                                            <input type="number" class="form-control" id="" name="qty" value="<?= $produk->qty ?>">
                                                                        </div>

                                                                        <br>
                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                    <div class="box-footer col-12 pb-3 d-flex justify-content-between float-right">
                                                                        <button id="simpan" type="submit" class="btn  btn-primary mr-3"><i class="fa fa-save"></i> Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </section>
                                            <div class="text-center">
                                                <a href="" data-toggle="modal" data-target="#modal-edit<?= $produk->id_produk; ?>" class="btn btn-warning edit"><i class="fa fa-edit" title="Edit"></i> </a>
                                                <a href="produk/hapus/<?php echo $produk->id_produk; ?>" onclick="return confirm('Hapus <?php echo $produk->nama_produk; ?> ?')" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>

<!-- Modal Tambah -->
<section class="content">
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="frmproduk" method="post" enctype="multipart/form-data" action="<?php base_url() ?>/produk/simpan">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Foto Aset</label>
                                <input type="file" class="form-control" id="" name="photo" placeholder="Lampirkan JPG/JPEG/PNG">
                            </div>
                            <div class="form-group">
                                <label for="">Kode Produk</label>
                                <input type="text" class="form-control" id="" name="kode_produk" placeholder="Kode Produk" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form-control" id="" name="nama_produk" placeholder="Nama Produk" required>
                            </div>
                            <div class="">
                                <label for="Pilih Kategori">Kategori</label>
                                <select name="kategori" id="" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php
                                    foreach ($kategori as $kat) { ?>
                                        <option value="<?= $kat->id_kategori; ?>" <?php if (
                                                                                        $produk->kategori == $kat->id_kategori
                                                                                    ) echo "selected"; ?>>
                                            <?= $kat->nama_kategori; ?>
                                        </option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kualitas</label>
                                <input type="text" class="form-control" id="" name="kwalitas" value="<?= $produk->kwalitas ?>">
                            </div>
                            <div class="form-group">
                                <label for="">UOM</label>
                                <input type="text" class="form-control" id="" name="uom" placeholder="Satuan Unit Aset" required>
                            </div>
                            <div class="form-group">
                                <label for="">Letak Grid</label>
                                <input type="text" class="form-control" id="" name="grid" placeholder="Penempatan Grid" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Banyaknya</label>
                                <input type="number" class="form-control" id="" name="qty" placeholder="Jumlah Banyaknya" required>
                            </div>
                            <br>
                        </div>
                        <!-- /.card-body -->
                        <div class="box-footer col-12 pb-3 d-flex justify-content-between float-right">
                            <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">BATAL</button>
                            <button id="simpan" type="submit" class="btn  btn-primary mr-3">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>