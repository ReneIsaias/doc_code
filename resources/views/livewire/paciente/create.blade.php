<div wire:ignore.self class="modal fade" id="crearPaciente" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="crearPacienteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearPacienteModal">Agregar paciente</h5>
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
                                    <label class="text-muted" for="curp">Curp :</label>
                                    <input type="text" name="curp" class="form-control @error('curp') is-invalid @enderror" wire:model="curp">
                                    @error('curp')
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
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="sexo">Sexo :</label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sexoHombre" name="sexo" class="custom-control-input  @error('sexo') is-invalid @enderror" value="hombre" checked wire:model="sexo">
                                        <label class="custom-control-label" for="sexoHombre">Hombre</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="sexoMujer" name="sexo" class="custom-control-input  @error('sexo') is-invalid @enderror" value="Mujer" wire:model="sexo">
                                        <label class="custom-control-label" for="sexoMujer">Mujer</label>
                                    </div>
                                    @error('sexo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="birthday">Fecha de nacimiento :</label>
                                    <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" wire:model="birthday">
                                    @error('birthday')
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
                                    <label class="text-muted" for="phone">Teléfono </label>
                                    <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" wire:model="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="age">Edad </label>
                                    <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" wire:model="age">
                                    @error('age')
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
                                    <label class="text-muted" for="ocupacione_id">Ocupación :</label>
                                    <select class="form-control @error('ocupacione_id') is-invalid @enderror" name="ocupacione_id" wire:model="ocupacione_id">
                                        <option value="">--Seleccione la ocupación--</option>
                                        @foreach($ocupaciones as $ocupacion)
                                            <option value="{{ $ocupacion->id }}">
                                                {{ $ocupacion->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ocupacione_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="escolaridade_id">Escolaridad :</label>
                                    <select class="form-control @error('escolaridade_id') is-invalid @enderror" name="escolaridade_id" wire:model="escolaridade_id">
                                        <option value="">--Seleccione la escolaridad--</option>
                                        @foreach($escolaridades as $escolaridad)
                                            <option value="{{ $escolaridad->id }}">
                                                {{ $escolaridad->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('escolaridade_id')
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
                                    <label class="text-muted" for="estado_id">Estado civil :</label>
                                    <select class="form-control @error('estado_id') is-invalid @enderror" name="estado_id" wire:model="estado_id">
                                        <option value="">--Seleccione el estado civil--</option>
                                        @foreach($estados as $estado)
                                            <option value="{{ $estado->id }}">{{ $estado->description }}</option>
                                        @endforeach
                                    </select>
                                    @error('estado_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="grupo_id">Grupo RH :</label>
                                    <select class="form-control @error('grupo_id') is-invalid @enderror" name="grupo_id" value="{{ old('grupo_id') }}" wire:model="grupo_id">
                                        <option value="">--Seleccione el grupo--</option>
                                        @foreach($grupos as $grupo)
                                            <option value="{{ $grupo->id }}">
                                                {{ $grupo->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('grupo_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
                        <hr>
                            <h5 class="text-uppercase">Datos Informante</h5>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="nameI">Nombre :</label>
                                    <input type="text" name="nameI" class="form-control @error('nameI') is-invalid @enderror" wire:model="nameI">
                                    @error('nameI')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="lastnamesI">Apellidos :</label>
                                    <input type="text" name="lastnamesI" class="form-control @error('lastnamesI') is-invalid @enderror" wire:model="lastnamesI">
                                    @error('lastnamesI')
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
                                    <label class="text-muted" for="phoneI">Teléfono </label>
                                    <input type="number" name="phoneI" class="form-control @error('phoneI') is-invalid @enderror" wire:model="phoneI">
                                    @error('phoneI')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-muted" for="parentesco_id">Parentesco :</label>
                                    <select class="form-control @error('parentesco_id') is-invalid @enderror" name="parentesco_id" wire:model="parentesco_id">
                                        <option value="">--Seleccione el parentesco--</option>
                                        @foreach($parentescos as $parentesco)
                                            <option value="{{ $parentesco->id }}">
                                                {{ $parentesco->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parentesco_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Agregar Paciente</button>
                </div>
            </div>
        </div>
    </div>
</div>
