load()

$('#input').click(function(e) {
    e.preventDefault();
    let awal = $('#awal').val()
    let akhir = $('#akhir').val()
    $('#tabeldata').DataTable().destroy();
    load(awal, akhir)
});

$('#reset').click(function(e) {
    e.preventDefault();
    $('#tabeldata').DataTable().destroy();
    load()

});



function load(awal = '', akhir = '') {
    $('#tabeldata').DataTable({
        processing: true,
        serveside: true,
        ajax: {
            url: "barang",
            type: 'GET',
            data: {
                awal: awal,
                akhir: akhir
            },

        },
        columns: [{
                data: 'nama_barang',
                name: 'nama_barang'
            },

            {
                data: 'spesifikasi',
                name: 'spesifikasi'
            },
            {
                data: 'gambar',
                name: 'gambar',
                render: function(data, type, full, meta) {
                    return "<img src=\"storage/" + data + "\" height=\"150\"  alt='No Image'/>";
                }
            },
            {
                data: 'harga',
                name: 'harga'
            },
            {
                data: 'stok',
                name: 'stok'
            },
            {
                data: 'status',
                name: 'status'
            },

            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'action',
                name: 'action'
            },


        ],
        order: [
            [0, 'asc']
        ]
    });
}
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});