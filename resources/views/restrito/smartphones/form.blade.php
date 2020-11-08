@extends('adminlte::page')

@section('title', 'Smartphone form')

@section('content_header')
    <h1>Register new Sample</h1>
@stop

@section('content')
    <div class="card card-primary">
        @if (isset($smartphone))
            {!! Form::model($smartphone, ['url' => route('restrito.smartphones.update', $smartphone), 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('restrito.smartphones.store')]) !!}
        @endif
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('model', 'Model') !!}
                    {!! Form::text('model', null, ['class' => 'form-control','required']) !!}
                    @error('model')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('imei', 'IMEI') !!}
                    {!! Form::text('imei', null, ['class' => 'form-control','required']) !!}
                    @error('imei')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('sn', 'SN') !!}
                    {!! Form::text('sn', null, ['class' => 'form-control','required']) !!}
                    @error('sn')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('restrito.smartphones.index', 'Voltar', null, ['class' => 'btn btn-secondary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
@stop

@section('js')

<script>

function excluir(rota) {
            Swal.fire({
                title: 'Atenção!',
                text: "Deseja mesmo excluir?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não'
            }).then((result) => {
                if (result.value === true) {
                    axios.delete(rota)
                        .then(function (res) {
                            $('#' + Object.keys(window.LaravelDataTables)[0]).DataTable().ajax.reload()
                            Swal.fire('Sucesso!', 'Apagado com sucesso', 'success')
                        })
                        .catch(function (err) {
                            Swal.fire('Sucesso!', 'Ocorreu um erro ao apagar', 'success')
                        })
                    
                }
            })
        }

        
    $('#model').select2({
        placeholder: 'Model',
        ajax: {
            url: '{{ route('restrito.lista.smartphones') }}',
            dataType: 'json',
            data: function (params) {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
        }
    });

</script>

@stop 