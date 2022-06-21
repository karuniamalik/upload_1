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
            }
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
                name: 'gambar'
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
                data: 'kategori',
                name: 'kategori'
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