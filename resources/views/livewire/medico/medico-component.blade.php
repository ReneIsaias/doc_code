<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Medicos</h4>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#crearMedico">Agregar Medico</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" class="form-control" placeholder="Buscar medico" wire:model="search">
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
                <table wire:poll.10000ms id="medicosTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre medico</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Especialidad</th>
                            {{-- <th scope="colgroup">Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicos as $medico)
                            <tr>
                                <td>{{ $medico->name }} {{ $medico->lastnames }}</td>
                                <td>{{ $medico->key }}</td>
                                <td>{{ $medico->email }}</td>
                                <td>{{ $medico->phone }}</td>
                                <td>
                                    @isset($medico->especialidade)
                                        {{ $medico->especialidade->description }}
                                    @endisset
                                </td>
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
            @if ($medicos->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $medicos->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $medicos->links() }}
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
    @include('livewire.medico.create')
    {{-- @include('livewire.paciente.show')
    @include('livewire.paciente.update')
    @include('livewire.paciente.delete') --}}
</div>
