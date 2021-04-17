<div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Agendar Cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="text-muted" for="id">Id:</label>
                    <input type="text" id="id" name="id" class="form-control @error('id') is-invalid @enderror">
                    @error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-muted" for="title">Título:</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-muted" for="description">Descripción:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-muted" for="start">Fecha inicio:</label>
                            <input type="date" id="start" name="start" class="form-control @error('start') is-invalid @enderror">
                            @error('start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-muted" for="end">Fecha termino:</label>
                            <input type="date" id="end" name="end" class="form-control @error('end') is-invalid @enderror">
                            @error('end')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-muted" for="hour">Hora:</label>
                    <input type="text" id="hour" name="hour" class="form-control @error('hour') is-invalid @enderror">
                    @error('hour')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-muted" for="textColor">Color texto:</label>
                    <input type="color" name="textColor" id="textColor" class="form-control @error('textColor') is-invalid @enderror">
                    @error('textColor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-muted" for="color">Color:</label>
                    <input type="color" name="color" id="color" class="form-control @error('color') is-invalid @enderror">
                    @error('color')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnAgregar" class="btn btn-primary">Agregar</button>
                <button id="btnModificar" class="btn btn-warning">Modificar</button>
                <button id="btnEliminar" class="btn btn-danger">Eliminar</button>
                <button id="btnCancelar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>