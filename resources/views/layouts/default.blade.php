
@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        function ConfirmaExclusao(id){
            swal.fire({
                title: 'Confirma exclusão?',
                text: "Esta ação não podera ser revertida!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'sim, excluir',
                cancelButtonText: 'Cancelar!',
                closeOnConfirm: false,
                focusCancel: true,
            }).then(function(isConfirm){
                if (isConfirm.value) {
                    $.get('/'+ @yield('table-delete') +'/'+id+'/destroy', function(data){
                        swal.fire(
                            'deletado',
                            'Exclusão Confirmada.',
                            'Sucess'
                        ).then(function(){
                            window.location.reload();
                        })
                    })
                }
            })
        }
    </script>
@stop
