<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Consultas</h4>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#crearConsulta">Agregar Consulta</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" class="form-control" placeholder="Buscar consulta" wire:model="search">
                        </div>
                        <div class="col-3 justify-content-end">
                            <select class="form-control" wire:model="perPage">
                                <option value="10">10 por página</option>
                                <option value="25">25 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </div>
                        @if ($search !== '')
                            <div wire:click="clear" class="col-1">
                                <button class="btn btn-light">X</button>
                            </div>
                        @endif
                    </div>
                </div>
                <table wire:poll.10000ms id="consultasTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Folio</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Medico</th>
                            <th scope="col">Descripción</th>
                            {{-- <th scope="colgroup">Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultas as $consulta)
                            <tr>
                                <td>{{ $consulta->folio }}</td>
                                <td>{{ $consulta->date }}</td>
                                <td>
                                    @isset($consulta->pacientes[0]->curp)
                                        {{ $consulta->pacientes[0]->name }} {{ $consulta->pacientes[0]->lastnames }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($consulta->medicos[0]->key)
                                        {{ $consulta->medicos[0]->name }} {{ $consulta->pacientes[0]->lastnames }}
                                    @endisset
                                </td>
                                <td>{{ $consulta->description }}</td>                                
                                {{-- <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" wire:click.prevent="show({{ $paciente->id }})" class="btn btn-info" data-toggle="modal" data-target="#actualizarPaciente">Mostrar</button>
                                        <button type="button" wire:click.prevent="edit({{ $paciente->id }})" class="btn btn-success" data-toggle="modal" data-target="#mostrarPaciente">Editar</button>
                                        <button type="button" wire:click.prevent="delete({{ $paciente->id }})" class="btn btn-danger" data-toggle="modal" data-target="#eliminarPaciente">Borrar</button>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            @if ($consultas->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $consultas->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $consultas->links() }}
                    </ul>
                </nav>
            @else
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>No hay resultados para la búsqueda "{{ $search}}" en la página {{ $page }} al mostrar {{ $perPage }} por página</h6>
                    </ul>
                </nav>
            @endif
        </div>
    </div>
    @include('custom.message')
    {{-- @include('livewire.consulta.create') --}}
    {{-- @include('livewire.paciente.show')
    @include('livewire.paciente.update')
    @include('livewire.paciente.delete') --}}
</div>
