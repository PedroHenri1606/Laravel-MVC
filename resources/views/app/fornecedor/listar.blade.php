    @extends('app.layouts.basico')

    @section('titulo', 'Fornecedor')

    @section('conteudo')
    
        <div class = "conteudo-pagina">
            <div class = "titulo-pagina2">
                <p>Fornecedor - Listar</p>
            </div>

            <div class="menu"> 
                <ul>
                    <li><a href=" {{ route('app.fornecedor.adicionar') }}"> Novo </a></li>
                    <li><a href=" {{ route('app.fornecedor') }}"> Consulta </a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
                    <table style = "width: 100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Site</th>
                                <th>UF</th>
                                <th>Email</th>   
                                <th>Excluir</th>
                                <th>Editar</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($fornecedores as $fornecedor)
                                <tr>
                                    <th>{{ $fornecedor->nome }}</th>
                                    <th>{{ $fornecedor->site }}</th>
                                    <th>{{ $fornecedor->uf }}</th>
                                    <th>{{ $fornecedor->email }}</th>
                                    <th><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></th>
                                    <th><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $fornecedores->appends($request)->links()}}
                            <br>
                        {{ $fornecedores->total()}}
                    </div>
                </div>
            </div>  
        </div>
    @endsection