<?php

namespace App\Http\Livewire\Paciente;

use Livewire\Component;

use App\Models\Paciente;
use App\Models\Informante;
use App\Models\Ocupacione;
use App\Models\Escolaridade;
use App\Models\Estado;
use App\Models\Grupo;
use App\Models\Parentesco;

use App\Models\Unidade;
use App\Models\Interrogatorio;
use App\Models\Aparato;
use App\Models\Dato;
use App\Models\Tipo;
use App\Models\Antecedente;
use App\Models\Enfermedade;
use App\Models\Medico;

use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PacienteComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paciente_id, $curp, $name, $lastnames, $age, $birthday, $email, $phone, $sexo, $address, $escolaridade_id, $ocupacione_id, $estado_id, $grupo_id, $created_at, $updated_at, $accion = "store";

    public $informante_id, $nameI, $lastnamesI, $phoneI, $statusI, $parentesco_id;

    public $search = '', $perPage = '10', $page = 1, $total;

    public $rules = [
        'curp'              => 'required|string|max:18|unique:pacientes,curp',
        'name'              => 'required|string|max:100',
        'lastnames'         => 'required|string|max:100',
        'age'               => 'required|numeric',
        'birthday'          => 'required|date',
        'email'             => 'required|string|email|max:100|unique:pacientes,email',
        'phone'             => 'required|numeric',
        'sexo'              => 'required|string|max:100',
        'address'           => 'required|string',
        'escolaridade_id'   => 'required|numeric',
        'ocupacione_id'     => 'required|numeric',
        'estado_id'         => 'required|numeric',
        'grupo_id'          => 'required|numeric',

        'nameI'             => 'required|string|max:100',
        'lastnamesI'        => 'required|string|max:100',
        'phoneI'            => 'required|numeric',
        'parentesco_id'     => 'required|numeric',
        'statusI'           => 'required'
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'curp'              => 'curp',
        'name'              => 'nombre',
        'lastnames'         => 'apellidos',
        'age'               => 'edad',
        'birthday'          => 'fecha nacimiento',
        'email'             => 'correo electronico',
        'phone'             => 'telefono',
        'sexo'              => 'sexo',
        'address'           => 'dirección',
        'escolaridade_id'   => 'escolaridad',
        'ocupacione_id'     => 'ocupación',
        'estado_id'         => 'estado',
        'grupo_id'          => 'grupo',

        'nameI'             => 'nombre',
        'lastnamesI'        => 'apellidos',
        'phoneI'            => 'telefono',
        'parentesco_id'     => 'parentesco',
        'statusI'           => 'estado',
    ];

    public function mount()
    {
        $this->total = count(Paciente::all());
        $this->sexo = 'hombre';

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'curp'              => 'required|string|max:18|unique:pacientes,curp',
                'name'              => 'required|string|max:100',
                'lastnames'         => 'required|string|max:100',
                'age'               => 'required|numeric',
                'birthday'          => 'required|date',
                'email'             => 'required|string|email|max:100|unique:pacientes,email',
                'phone'             => 'required|numeric',
                'sexo'              => 'required|string|max:100',
                'address'           => 'required|string',
                'escolaridade_id'   => 'required|numeric',
                'ocupacione_id'     => 'required|numeric',
                'estado_id'         => 'required|numeric',
                'grupo_id'          => 'required|numeric',
                'nameI'             => 'required|string|max:100',
                'lastnamesI'        => 'required|string|max:100',
                'phoneI'            => 'required|numeric',
                'parentesco_id'     => 'required|numeric',
                'statusI'           => 'required'
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'curp'              => 'required|string|max:18|unique:pacientes,curp,' . $this->paciente_id,
                'name'              => 'required|string|max:100',
                'lastnames'         => 'required|string|max:100',
                'age'               => 'required|numeric',
                'birthday'          => 'required|date',
                'email'             => 'required|string|email|max:100|unique:pacientes,email,' . $this->paciente_id,
                'phone'             => 'required|numeric',
                'sexo'              => 'required|string|max:100',
                'address'           => 'required|string',
                'escolaridade_id'   => 'required|numeric',
                'ocupacione_id'     => 'required|numeric',
                'estado_id'         => 'required|numeric',
                'grupo_id'          => 'required|numeric',
                'nameI'             => 'required|string|max:100',
                'lastnamesI'        => 'required|string|max:100',
                'phoneI'            => 'required|numeric',
                'parentesco_id'     => 'required|numeric',
                'statusI'           => 'required'
            ]);
        }
    }

    public function store()
    {
        $this->validate([
            'curp'              => 'required|string|max:18|unique:pacientes,curp',
            'name'              => 'required|string|max:100',
            'lastnames'         => 'required|string|max:100',
            'age'               => 'required|numeric',
            'birthday'          => 'required|date',
            'email'             => 'required|string|email|max:100|unique:pacientes,email',
            'phone'             => 'required|numeric',
            'sexo'              => 'required|string|max:100',
            'address'           => 'required|string',
            'escolaridade_id'   => 'required|numeric',
            'ocupacione_id'     => 'required|numeric',
            'estado_id'         => 'required|numeric',
            'grupo_id'          => 'required|numeric',
            'nameI'             => 'required|string|max:100',
            'lastnamesI'        => 'required|string|max:100',
            'phoneI'            => 'required|numeric',
            'parentesco_id'     => 'required|numeric',
        ]);

        $status  = 'success';
        $content = 'El paciente ' . $this->name . ' ' . $this->lastnames . ' se agrego correctamente.';

        try {

            DB::beginTransaction();

            $paciente = Paciente::create([
                'curp'             => $this->curp,
                'name'             => $this->name,
                'lastnames'        => $this->lastnames,
                'age'              => $this->age,
                'birthday'         => $this->birthday,
                'email'            => $this->email,
                'phone'            => $this->phone,
                'sexo'             => $this->sexo,
                'address'          => $this->address,
                'escolaridade_id'  => $this->escolaridade_id,
                'ocupacione_id'    => $this->ocupacione_id,
                'estado_id'        => $this->estado_id,
                'grupo_id'         => $this->grupo_id,
            ]);

            $informante = Informante::create([
                'name'             => $this->nameI,
                'lastnames'        => $this->lastnamesI,
                'phone'            => $this->phoneI,
                'parentesco_id'    => $this->parentesco_id,
            ]);

            $paciente->informantes()->attach([$informante->id]);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió en error al tratar de agregar el paciente, por favor, vuelve a intentarlo una vez más';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('pacienteEventoCrear');
    }

    public function show(Paciente $paciente)
    {
        try {

            $created = new Carbon($paciente->created_at);
            $updated = new Carbon($paciente->updated_at);

            $this->paciente_id       = $paciente->id;
            $this->curp              = $paciente->curp;
            $this->name              = $paciente->name;
            $this->lastnames         = $paciente->lastnames;
            $this->age               = $paciente->age;
            $this->birthday          = $paciente->birthday;
            $this->email             = $paciente->email;
            $this->phone             = $paciente->phone;
            $this->sexo              = $paciente->sexo;
            $this->address           = $paciente->address;
            $this->escolaridade_id   = $paciente->escolaridade_id;
            $this->ocupacione_id     = $paciente->ocupacione_id;
            $this->estado_id         = $paciente->estado_id;
            $this->grupo_id          = $paciente->grupo_id;
            $this->created_at        = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at        = $updated->format('l jS \\of F Y h:i:s A');

        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrió un error al tratar de cargar los datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);
        }
    }

    public function close()
    {
        $this->clean();
        $this->emit('pacienteEventoMostrar');
    }

    public function edit(Paciente $paciente)
    {
        try {

            $this->paciente_id       = $paciente->id;
            $this->curp              = $paciente->curp;
            $this->name              = $paciente->name;
            $this->lastnames         = $paciente->lastnames;
            $this->age               = $paciente->age;
            $this->birthday          = $paciente->birthday;
            $this->email             = $paciente->email;
            $this->phone             = $paciente->phone;
            $this->sexo              = $paciente->sexo;
            $this->address           = $paciente->address;
            $this->escolaridade_id   = $paciente->escolaridade_id;
            $this->ocupacione_id     = $paciente->ocupacione_id;
            $this->estado_id         = $paciente->estado_id;
            $this->grupo_id          = $paciente->grupo_id;
            $this->accion            = "update";

        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrio un error al tratar de cargar los datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);
        }
    }

    public function update()
    {
        $this->validate([
            'curp'              => 'required|string|max:18|unique:pacientes,curp,' . $this->paciente_id,
            'name'              => 'required|string|max:100',
            'lastnames'         => 'required|string|max:100',
            'age'               => 'required|numeric',
            'birthday'          => 'required|date',
            'email'             => 'required|string|email|max:100|unique:pacientes,email,' . $this->paciente_id,
            'phone'             => 'required|numeric',
            'sexo'              => 'required|string|max:100',
            'address'           => 'required|string',
            'escolaridade_id'   => 'required|numeric',
            'ocupacione_id'     => 'required|numeric',
            'estado_id'         => 'required|numeric',
            'grupo_id'          => 'required|numeric',
            'nameI'             => 'required|string|max:100',
            'lastnamesI'        => 'required|string|max:100',
            'phoneI'            => 'required|numeric',
            'parentesco_id'     => 'required|numeric',
            'statusI'           => 'required'
        ]);

        $status  = 'success';
        $content = 'El paciente ' . $this->name . ' ' . $this->lastnames . ' se actualizó correctamente.';

        try {

            DB::beginTransaction();

            if ($this->paciente_id) {
                $paciente = Paciente::find($this->paciente_id);
                $paciente->update([
                    'curp'             => $this->curp,
                    'name'             => $this->name,
                    'lastnames'        => $this->lastnames,
                    'age'              => $this->age,
                    'birthday'         => $this->birthday,
                    'email'            => $this->email,
                    'phone'            => $this->phone,
                    'sexo'             => $this->sexo,
                    'address'          => $this->address,
                    'escolaridade_id'  => $this->escolaridade_id,
                    'ocupacione_id'    => $this->ocupacione_id,
                    'estado_id'        => $this->estado_id,
                    'grupo_id'         => $this->grupo_id,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió en error al tratar de actualizar el paciente, por favor, vuelve a intentarlo una vez más';
        }
        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('pacienteEventoActualizar');
    }

    public function delete(Paciente $paciente)
    {
        try {

            $this->paciente_id   = $paciente->id;
            $this->curp        = $paciente->curp;
            $this->name        = $paciente->name;
            $this->lastnames   = $paciente->lastnames;

        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrió un error al tratar de cargar los datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);
        }
    }

    public function destroy()
    {
        $status  = 'success';
        $content = 'El paciente ' . $this->name . ' ' . $this->lastnames . ' se elimino correctamente.';

        try {

            DB::beginTransaction();

                Paciente::find($this->paciente_id)->delete();

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al tratar de eliminar el paciente ' . $this->name . ' ' . $this->lastnames . ', intentalo una vez más.';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('pacienteEventoEliminar');
    }

    public function clean()
    {
        $this->reset([
            'paciente_id',
            'curp',
            'name',
            'lastnames',
            'age',
            'birthday',
            'email',
            'phone',
            'sexo',
            'address',
            'escolaridade_id',
            'ocupacione_id',
            'estado_id',
            'grupo_id',
            'informante_id',
            'nameI',
            'lastnamesI',
            'phoneI',
            'parentesco_id',
            'statusI',
            'created_at',
            'updated_at',
            'accion',
        ]);

        $this->mount();
    }

    public function clear()
    {
        $this->reset(['search', 'perPage', 'page']);
    }

    public function render()
    {

        $ocupaciones   = Ocupacione::orderBy('description', 'Asc')->where('status', '=', 1)->get();
        $escolaridades = Escolaridade::orderBy('description', 'Asc')->where('status', '=', 1)->get();
        $estados       = Estado::orderBy('description', 'Asc')->where('status', '=', 1)->get();
        $grupos        = Grupo::orderBy('description', 'Asc')->where('status', '=', 1)->get();
        $parentescos   = Parentesco::orderBy('description', 'Asc')->where('status', '=', 1)->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.paciente.paciente-component',
            [
                'pacientes' => Paciente::latest('id')
                    ->where('curp', 'LIKE', "%{$this->search}%")
                    ->OrWhere('name', 'LIKE', "%{$this->search}%")
                    ->OrWhere('lastnames', 'LIKE', "%{$this->search}%")
                    ->OrWhere('email', 'LIKE', "%{$this->search}%")
                    ->OrWhere('phone', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('ocupaciones', 'escolaridades', 'estados', 'grupos', 'parentescos')
        );
    }
}
