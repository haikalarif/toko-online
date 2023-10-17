<?php
$styleHeight = '';
if (count($this->cart->contents()) == 0) {
    $styleHeight = 'height: 35vh;';
}
?>
<div class="container-fluid px-5 mt-lg-5 mb-lg-3" style="<?php echo $styleHeight ?>">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-info">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4><strong>Total Belanja Anda: Rp. " . number_format($grand_total, 0, ',', '.') . "</strong></h4>";
                ?>
            </div><br><br>

            <h3><strong>Input Alamat Pengiriman dan Pembayaran</strong></h3>
            <hr style="border-top: 2px solid rgb(133, 135, 150);">

            <form action="<?php echo base_url('dashboard/proses_pesanan') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda...">
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap Anda...">
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon Anda...">
                </div>
                <div class="form-group">
                    <label>Pilih Jasa Pengiriman</label>
                    <select name="jasa_kirim" class="form-control">
                        <option>-- Pilih Jasa Pengiriman --</option>
                        <option value="JNE">JNE</option>
                        <option value="JNT">JNT</option>
                        <option value="Ninja-Xpress">Ninja Xpress</option>
                        <option value="Sicepat">Sicepat</option>
                        <option value="Pos-Indonesia">Pos Indonesia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="metode_bayar">Pilih Metode Pembayaran</label>
                    <select name="metode_bayar" id="metode_bayar" class="form-control" onchange="toggleFileInput();showNoRek();">
                        <option>-- Pilih Bank --</option>
                        <?php foreach ($metode->result() as $key => $item) { ?>
                            <option value="<?php echo $item->id; ?>"><?php echo $item->nama_metode; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group" id="no_rek_container" style="display: none;">
                    <h5>Nomor Rekening : <span id="no_rek"></span></h4>
                        <hr style="border-top: 3px solid rgba(0,0,0,.1);">
                </div>
                <div class="form-group" id="bukti_pembayaran" style="display: none;">
                    <label for="bukti_bayar">Bukti Pembayaran</label>
                    <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
                </div>

                <button type="submit" class="btn btn-sm btn-primary mb-3 mt-3">Lanjutkan Pemesanan</button>
            </form>

        </div>

        <div class="col-md-2"></div>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Keranjang Belanja Anda Masih Kosong!</h4>
    </div>
<?php } ?>
</div>

<script>
    function toggleFileInput() {
        var selectedValue = document.getElementById("metode_bayar").value;
        var fileInput = document.getElementById("bukti_pembayaran");
        if (selectedValue === "6") {
            fileInput.style.display = "none";
        } else {
            fileInput.style.display = "block";
        }
    }

    function showNoRek() {
        var selectedValue = document.getElementById("metode_bayar").value;
        var noRekContainer = document.getElementById("no_rek_container");
        var noRekField = document.getElementById("no_rek");

        if (selectedValue !== "") {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = this.responseText;
                    let data = JSON.parse(response);
                    let noRek = data.no_rek;
                    noRekField.textContent = noRek;
                    noRekContainer.style.display = "block";
                }
            };
            xhr.open("GET", "<?= base_url() ?>dashboard/getMetode/" + selectedValue, true); // Ganti get_no_rek.php dengan URL yang sesuai
            xhr.send();
        } else {
            noRekContainer.style.display = "none";
        }
    }
</script>