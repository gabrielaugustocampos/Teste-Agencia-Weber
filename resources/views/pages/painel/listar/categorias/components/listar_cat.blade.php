<div class="col-md-12">
    <div class="card shadow mb-4">
        @component('pages.painel.listar.categorias.components.listar_cat_ajax', ['categorias' => $categorias])
        @endcomponent
    </div>
</div>

<script>
    $(document).on('click', '#deletar', function() {
        let id_categoria = $(this).val();

        $.ajax({
            url: '{{ route('categorias.deletar')}}',
            type: 'post',
            data: {
                _token: '{!!csrf_token()!!}',
                id_categoria: id_categoria
            },

            success: function(result) {
                $('.tabela').empty();
                $('.tabela').html(result);
            }
        })
    })
</script>

{{-- <script>
    $('.delete-confirm').on('click', function(e) {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Tem certeza?',
            text: 'Isso irá deletar a categoria permanentemente',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Deletar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                window.location.href = url;
                Swal.fire({
                    title: 'Sucesso',
                    text: 'Categoria deletada',
                    type: 'success',
                })
            }
        })
    });
</script> --}}