<div class="col-md-12">
    <div class="contents">
        <h4 class="text-info">Form Penawaran Sparepart</h4>
        <hr>
        <form class="form-horizontal">
            <!-- Left Column -->
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label class="col-md-4 control-label">Sparepart</label>
                    <div class="col-md-6">
                        <select id="optionSparepart" class="form-control">
                            <option value="-">-- Pilih Sparepart --</option>
                        <?php foreach($daftar_sparepart as $cf){ ?> 
                            <option value="<?php echo $cf['sparepart_id'] ?>"><?php echo $cf['sparepart_name'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label">Kuantitas</label>
                    <div class="col-md-4">
                        <input type="text" id="txtKuantitasSparepart" class="form-control" placeholder="">
                    </div>
                    <span class="col-md-4 text-danger">item</span>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label">Harga (IDR)</label>
                    <div class="col-md-6">
                        <input type="text" id="txtHargaSparepart" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Diskon (%)</label>
                    <div class="col-md-6">
                        <input type="text" id="txtDiskonSparepart" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">
                        <button type="button" id="btnSubmitSparepart" class="btn btn-info">Submit</button>
                        <button type="button" id="btnKembali" class="btn btn-warning">Kembali</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Tabel Detail Penawaran Sparepart</h3>
        </div>
        <div class="panel-body table-responsive">
            <table id="tblPenawaranSparepart" class="table table-hover table-boder nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>SPAREPART</th>
                        <th>KUANTITAS</th>
                        <th>HARGA (IDR)</th>
                        <th>DISKON</th>
                        <th>STATUS</th>
                        <th>CREATE DATE</th>
                        <th>UPDATE DATE</th>
                        <th>#</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>