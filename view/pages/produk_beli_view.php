<?php create_breadcrumb(['Produk Jual']) ?>
<div class="mt-2">
    <div class="bg-white p-3 shadow-sm">
        <div class="button-area">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_barang"> <i
                    class="mdi mdi-plus-circle"></i> &nbsp;Tambah</button>
        </div>
    </div>
    <div class="mt-3 bg-white shadow-sm">
        <table style='width:100%;' id="tabel-barang"
            class="table text-center table-hover table-responsive table-bordered">
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
                        <input required type="text" class='form-control' id='nama_produk' name='nama'>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input required type="text" class='form-control' id='nama_produk' name='harga'>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select required class="form-control" name="satuan" id="satuan">
                            <option value="">--select satuan---</option>
                            <option value="KG">KG</option>
                            <option value="PCS">PCS</option>
                            <option value="LUSIN">LUSIN</option>
                            <option value="BIJI">BIJI</option>
                            <option value="/1KG">/1KG</option>
                            <option value="/1BIJI">/1BIJI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea placeholder='(optional)' name="deskripsi" id="" cols="30" rows="4"
                            class="form-control"></textarea>
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
<div class="modal-edit">
    <div class="modal" id="exampleModal" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end modal -->
<script>
//jika kontent selesai di load
function button_loading($message, $disabled = false) {
    form.button_submit.innerHTML = $message;
    if ($disabled) {
        form.button_submit.type = 'disabled';
        form.button_submit.disabled = true;
    } else {
        form.button_submit.type = 'submit';
        form.button_submit.disabled = false;
    }
}
const request_url = '<?= base_url('ajax/barang/barang_beli.php') ?>';
const data_table = $('#tabel-barang').DataTable({
    ajax: request_url + '?type=result',
});
window.addEventListener('load', event => {
    /**
     * tambah data 
     */
    const form = document.form;
    form.addEventListener('submit', e => {
        e.preventDefault();
        button_loading("LOADING...", true);
        const data = new FormData(e.target);
        $.ajax({
            url: request_url + '?type=add',
            type: "POST",
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            //success ajax request
            success: function(response) {
                button_loading("SIMPAN", false);
                if (response.code == 200 && response.status == true) {
                    data_table.ajax.reload(null, true);
                    swal.fire("success", response.message, 'success');
                } else {
                    Swal.fire(`Error ${response.code}`, response.message, 'error');
                }
            },
        })

    });
    /**
     * hapus data
     */
    const button_delete = document.querySelectorAll('#button_delete_table');
    for (let i = 0; i < button_delete.length; i++) {
        button_delete[i].onclick = function() {
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus data ini?',
                showCancelButton: true,
                confirmButtonText: 'Oke',
            }).then(result => {
                if (result.isConfirmed) {
                    const id = button_delete[i].getAttribute('data_id');
                    $.ajax({
                        url: request_url + '?type=delete&id=' + id,
                        type: 'GET',
                        success: function(response) {
                            if (response.code == 200 && response.status == true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data berhasil di hapus!',
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                setTimeout(function() {
                                    window.location.reload(true);
                                }, 2000);
                            }
                        }
                    });
                }
            });
        }
    }
    /**
     * edit data
     */
    function show_edit_modal() {
        const button_edit = document.querySelectorAll('#button_edit_table');
        for (var i = 0; i < button_edit.length; i++) {
            button_edit[i].addEventListener('click', function(e) {
                const id = e.target.getAttribute('data_id');

                function request(callback, id) {
                    $.ajax({
                        url: request_url + '?type=get_data_by_id&id=' + id,
                        type: 'GET',
                        success: function(e) {
                            if(e.status==true && e.code == 200 ){
                            const data = Swal.fire({
                                title: 'EDIT DATA',
                                html: `
                                <style>
                                    .swal2-input{
                                        padding:20px;
                                        width:70%!important;
                                        box-sizing: border-box;
                                        transition: border-color .1s,box-shadow .1s;
                                        border: 1px solid #d9d9d9;
                                        border-radius: 0.1875em;
                                        background: 0 0;
                                        box-shadow: inset 0 1px 1px #dedede transparent;
                                        color: inherit;
                                        font-size: 13px;
                                    }
                                    textarea.swal2-input{
                                        height:auto;
                                    }
                                    select.swal2-input{
                                        padding:0;
                                        margin:0;
                                        height:60px;

                                    }
                                    .form-group{
                                        margin-bottom:3px!important;
                                    }
                                </style>
                                <div class='form-group'>
                                    <label>Nama</label>
                                      <br>
                                    <input id='nama' value='${e.data.nama}' class='swal2-input'>
                                </div>
                                <div class='form-group'>
                                    <label>Harga baru</label>
                                    <br>
                                    <input id='harga' placeholder='ketikan harga baru (kosongkan jika tidak di update)' class='swal2-input'>
                                </div>
                                <div  class='form-group'>
                                    <label>Satuan</label>
                                    <br>
                                    <select id='satuan_edit' value='${e.data.satuan}' class='swal2-input'>
                                        <option ${e.data.satuan == "KG" ? 'selected="true"' : ''} value="KG">KG</option>
                                        <option ${e.data.satuan == "PCS" ? 'selected="true"' : ''}  value="PCS">PCS</option>
                                        <option ${e.data.satuan == "LUSIN" ? 'selected="true"' : ''} value="LUSIN">LUSIN</option>
                                        <option ${e.data.satuan == "BIJI" ? 'selected="true"' : ''} value="BIJI">BIJI</option>
                                        <option ${e.data.satuan == "/1KG" ? 'selected="true"' : ''} value="/1KG">/1KG</option>
                                        <option ${e.data.satuan == "/1BIJI" ? 'selected="true"' : ''} value="/1BIJI">/1BIJI</option>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <label>Deskripsi</label>
                                                    <br>

                                    <textarea id='deskripsi' value='${e.data.deskripsi}' class='swal2-input'>
                                        ${e.data.deskripsi}
                                    </textarea>
                                </div>
                                `,
                                focusConfirm: false,
                                confirmButtonText: 'Edit sekarang',
                                preConfirm: () => {
                                    return {
                                        'nama' : document.getElementById("nama").value,
                                        'harga' : document.getElementById("harga").value,
                                        'satuan' : document.getElementById("satuan_edit").value,
                                        'deskripsi' : document.getElementById("deskripsi").value,

                                    }
                                }
                            });
                            data.then(function(e) {
                                callback(e);
                            });
                            }
                            
                        }
                    });
                }
               request(function(e) {
                    const data = new FormData();
                    for(s in e.value) {
                        data.append(s,e.value[s]);
                    }
                    $.ajax({
                        type : "POST",
                        url : request_url+'?type=edit&id='+id,
                        cache : false,
                        processData: false,
                        contentType: false,
                        data : data,
                        success : function(e) {
                            if (e.code == 200 && e.status == true) {
                                Swal.fire("success",e.message,'success');
                                setTimeout(() => {
                                    window.location.reload(true);
                                }, 2000);
                            }
                        }
                    })
                }, id);
            });
        }
    }
    const edit = show_edit_modal();
    
    
});
</script>