<?php create_breadcrumb(['Produk Jual']) ?>
<div class="mt-2">
    <div class="bg-white p-3 shadow-sm">
        <div class="button-area">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_barang"> <i class="mdi mdi-plus-circle"></i> &nbsp;Tambah</button>
        </div>
    </div>
    <div class="mt-3 bg-white shadow-sm">
        <table style='width:100%;' id="tabel-barang" class="table text-center table-hover table-responsive table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>SATUAN</th>
                    <th>HARGA SEKARANG</th>
                    <th>HARGA KEMARIN</th>
                    <th>DESKRIPSI</th>
                    <th>ACT</th>
                </tr>
            </thead>
           <tbody>
               
           </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_add_barang" tabindex="-1" aria-labelledby="modal_add_barangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_add_barangLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-backspace"></i> </span>
                </button>
            </div>
            <div class="modal-body">
                <form name='form' method='post' action="">
                    <div class="form-group">
                        <label for="nama_produk">Nama</label>
                        <input  required type="text" class='form-control' id='nama_produk' name='nama'>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input  required type="text" class='form-control' id='nama_produk' name='harga'>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select required  class="form-control" name="satuan" id="satuan">
                            <option value="">--select satuan---</option>
                            <option value="KG">KG</option>
                            <option value="PCS">PCS</option>
                            <option value="LUSIN">LUSIN</option>
                            <option value="BIJI">BIJI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea placeholder='(optional)' name="deskripsi" id="" cols="30" rows="4" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name='button_submit' class="btn btn-primary">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
<script>
    //jika kontent selesai di load
    function button_loading($message, $disabled = false) {
         form.button_submit.innerHTML = $message;
        if($disabled) {
         form.button_submit.type = 'disabled';
         form.button_submit.disabled = true;
        } else {
              form.button_submit.type = 'submit';
             form.button_submit.disabled = false;
        }
    }
    const request_url =  '<?= base_url('ajax/barang/barang_beli.php') ?>';
    window.addEventListener('DOMContentLoaded', event=>{
        //data table
        const data_table = $('#tabel-barang').DataTable({
            ajax : request_url+'?type=result',
        });
        const form = document.form;
        form.addEventListener('submit', e => {
            e.preventDefault();
           button_loading("LOADING...", true);
            const data = new FormData(e.target);
            $.ajax({
                 url : request_url+'?type=add',
                 type : "POST",
                 processData: false,
                 contentType: false,
                 cache: false,
                 data : data,
                 //success ajax request
                 success : function(response) {
                    button_loading("SIMPAN", false);
                    if(response.code == 200 && response.status == true) {
                        data_table.ajax.reload(null,false);
                        swal.fire("success",response.message,'success');
                    } else{
                         swal.fire(`Error ${response.code}`,response.message,'error');
                    }
                 },
            })
            
        });
    });
</script>