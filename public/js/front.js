const { map, divide } = require("lodash");

$('#bayar').click(function(e) {
    e.preventDefault();
    // alert('sukses');
    let total = $('#total').val()
    let nama_barang = $('.nama_barang').map((i, e) => e.value).get();
    let harga = $('.harga').map((i, e) => e.value).get();
    let qty = $('.qty').map((i, e) => e.value).get();
    console.log(nama_barang);

    // alert(total);
    $.ajax({
        type: "get",
        url: "payments",
        data: { total: total, nama_barang: nama_barang, harga: harga, qty: qty },
        dataType: "json",
        success: function(response) {
            console.log(response);
            window.snap.pay(response.snap, {
                onSuccess: function(result) {
                    // for testing
                    console.log(result);
                    /* You may add your own implementation here */
                    // console.log(result.status_code);
                    // window.open("https://www.w3schools.com/", "_self")
                    //  window.open("http://127.0.0.1:8000/", "_self")
                    $.ajax({
                        type: "get",
                        url: "cekoutTrue",
                        data: { result: result.order_id, code: result.status_code },
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            location.reload();
                            // var hasil = document.getElementById("bayar");
                            // hasil.innerHTML = response;
                            // if (response.result == 200 ) {
                            // }

                            // $.ajax({
                            //     type: "get",
                            //     url: "cekoutTrue",
                            //      data: { result: result =  },
                            //     dataType: "json",
                            //     success: function (response) {

                            //     }
                            // });
                        }
                    });

                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    console.log(result);
                    send_response_to_form(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    console.log(result);
                    send_response_to_form(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                    console.log('gagal');
                    $.ajax({
                        type: "get",
                        url: "cekoutTrue",
                        data: { result: response.order_id, code: 401 },
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            location.reload();
                        }

                    });
                }

            })
        }
    });

});

function ambil_id(id) {
    $.ajax({
        type: "get",
        url: "ceklist",
        data: { id: id },
        dataType: "json",
        success: function(response) {
            console.log(response);
            let csrf = $('meta[name="csrf-token"]').attr('content')
                // console.log(csrf);
            $('#produk').children().remove();
            $('#pagination').remove();
            response.map((e, i) => $('#produk').append(`
             <div class="col-md-4 mb-4">
             <div class="card ">
                            <img class="img-thumbnail" style="width:100%; height:200px; object-fit: contain"
                                src="storage/${ e.gambar}" alt="k">
                            <div class="card-body ">
                                <h5 class="card-title">${ e.nama_barang }</h5>
                                <p class="card-text">${e.harga }</p>
                                <form  action="tambah_keranjang" method="POST" enctype="multipart/form-data">
                                                                    
                                    <input type="hidden" value="${csrf }" name="_token">
                                    <input type="hidden" value="${e.id }" name="id">
                                    <input type="hidden" value="${e.nama_barang }" name="name">
                                    <input type="hidden" value="1" name="quantity">
                                    <input type="hidden" value="${ e.harga }" name="price">
                                    <input type="hidden" value="${e.gambar }" name="image">

                                    <div class="tambah_keranjang">
                                        <button class="btn btn-primary">Beli Sekarang</button>
                                    </div>
                                </form>
                               
                            </div>
                        </div>
                        
                         </div>
                                               
                        `))
        }

    });


    // console.log(terima);
    $(function() {
        $('#page').pagination({
            items: 100,
            itemsOnPage: 10,
            cssStyle: 'light-theme'
        });
    });
}