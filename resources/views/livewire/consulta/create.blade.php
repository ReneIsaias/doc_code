<div wire:ignore.self class="modal fade" id="crearMedico" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="crearMedicoModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearMedicoModal">Agregar medico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="key">Clave :</label>
                                    <input type="text" name="key" class="form-control @error('key') is-invalid @enderror" wire:model="key">
                                    @error('key')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="email">Email :</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" wire:model="email" inputmode="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="name">Nombre :</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="lastnames">Apellidos :</label>
                                    <input type="text" name="lastnames" class="form-control @error('lastnames') is-invalid @enderror" wire:model="lastnames">
                                    @error('lastnames')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="phone">Teléfono </label>
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" wire:model="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="address">Dirección :</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="3" wire:model="address"></textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="especialidade_id">Especilidad :</label>
                            <select class="form-control @error('especialidade_id') is-invalid @enderror" name="especialidade_id" wire:model="especialidade_id">
                                <option value="">--Seleccione la especialidad--</option>
                                @foreach($especialidades as $especialidad)
                                    <option value="{{ $especialidad->id }}">
                                        {{ $especialidad->description }}
                                    </option>
                                @endforeach
                            </select>
                            @error('especialidade_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    {{-- <div wire:loading wire:loading.class="bg-white">Procesando datos...</div> --}}
                </div>
                <div class="justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Agregar Medico</button>
                </div>
            </div>
        </div>
    </div>
</div>
