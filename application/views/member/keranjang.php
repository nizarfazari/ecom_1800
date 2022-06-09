<div id="app">
    <div class="main-wrapper container">
        <!-- Main Content -->
        <div class="main-content">
            <section class="main">
                <div class="container mt-5">
                    <table class="table table striped ">
                        <tr>
                            <th>NO</th>
                            <th>Nama Produk</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Sub total</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $no = 1;
                        $total = 0;
                        $cart = $this->cart->contents();
                        foreach ($cart as $item) :
                            $total += $item['subtotal'];
                        ?>
                            <tr>
                                <td><?= $no++  ?></td>
                                <td><?= $item['name'];  ?></td>
                                <td><?= $item['gambar'];  ?></td>
                                <td><?= $item['price'];  ?></td>
                                <td><input type="number" value="<?= $item['qty'];  ?>"></td>
                                <td><?= number_format($item['price'] * $item['qty']);  ?></td>
                                <td>
                                    <a href="<?= site_url('user/home/hapus_cart/' . $item['rowid']); ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <th>Total</th>
                            <th><?= $total; ?></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <a href="<?= site_url('user/home/selesai_belanja'); ?>" class="btn btn-success">Selesai Belanja</a>
                            </th>
                        </tr>
                    </table>

                </div>
            </section>
        </div>

    </div>
</div>