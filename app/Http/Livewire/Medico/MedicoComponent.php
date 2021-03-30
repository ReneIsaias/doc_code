<?php

namespace App\Http\Livewire\Medico;

use Livewire\Component;

use App\Models\Medico;
use App\Models\Especialidade;
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

use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MedicoComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $medico_id, $key, $name, $lastnames, $email, $phone, $address, $especialidade_id, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total;

    public $rules = [
        'key'               => 'required|string|max:18|unique:medicos,key',
        'name'              => 'required|string|max:100',
        'lastnames'         => 'required|string|max:100',
        'email'             => 'required|string|email|max:100|unique:medicos,email',
        'phone'             => 'required|numeric',
        'address'           => 'required|string',
        'especialidade_id'  => 'required|numeric',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'key'               => 'clave',
        'name'              => 'nombre',
        'lastnames'         => 'apellidos',
        'email'             => 'correo electronico',
        'phone'             => 'telefono',
        'address'           => 'dirección',
        'especialidade_id'  => 'especialidad',
    ];

    public function mount()
    {
        $this->total = count(Medico::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updatedInTimeNow($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'key'               => 'required|string|max:18|unique:medicos,key',
                'name'              => 'required|string|max:100',
                'lastnames'         => 'required|string|max:100',
                'email'             => 'required|string|email|max:100|unique:medicos,email',
                'phone'             => 'required|numeric',
                'address'           => 'required|string',
                'especialidade_id'  => 'required|numeric',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'key'               => 'required|string|max:18|unique:medicos,key,' . $this->medico_id,
                'name'              => 'required|string|max:100',
                'lastnames'         => 'required|string|max:100',
                'email'             => 'required|string|email|max:100|unique:medicos,email,' . $this->medico_id,
                'phone'             => 'required|numeric',
                'address'           => 'required|string',
                'especialidade_id'  => 'required|numeric',
            ]);
        }
    }

    public function store()
    {
        $this->validate([
            'key'               => 'required|string|max:18|unique:medicos,key',
            'name'              => 'required|string|max:100',
            'lastnames'         => 'required|string|max:100',
            'email'             => 'required|string|email|max:100|unique:medicos,email',
            'phone'             => 'required|numeric',
            'address'           => 'required|string',
            'especialidade_id'  => 'required|numeric',
        ]);

        $status  = 'success';
        $content = 'El medico ' . $this->name . ' ' . $this->lastnames . ' se agrego correctamente.';

        try {

            DB::beginTransaction();

            $medico = Medico::create([
                'key'              => $this->key,
                'name'             => $this->name,
                'lastnames'        => $this->lastnames,
                'email'            => $this->email,
                'phone'            => $this->phone,
                'address'          => $this->address,
                'especialidade_id' => $this->especialidade_id,
            ]);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió en error al tratar de agregar el medico, por favor, vuelve a intentarlo una vez más';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('medicoEventoCrear');
    }

    public function show(Medico $medico)
    {
        try {

            $created = new Carbon($medico->created_at);
            $updated = new Carbon($medico->updated_at);

            $this->medico_id         = $medico->id;
            $this->key               = $medico->key;
            $this->name              = $medico->name;
            $this->lastnames         = $medico->lastnames;
            $this->email             = $medico->email;
            $this->phone             = $medico->phone;
            $this->address           = $medico->address;
            $this->especialidade_id  = $medico->especialidade_id;
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
        $this->emit('medicoEventoMostrar');
    }

    public function edit(Medico $medico)
    {
        try {

            $this->medico_id         = $medico->id;
            $this->key               = $medico->key;
            $this->name              = $medico->name;
            $this->lastnames         = $medico->lastnames;
            $this->email             = $medico->email;
            $this->phone             = $medico->phone;
            $this->address           = $medico->address;
            $this->especialidade_id  = $medico->especialidade_id;
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
            'key'               => 'required|string|max:18|unique:medicos,key,' . $this->medico_id,
            'name'              => 'required|string|max:100',
            'lastnames'         => 'required|string|max:100',
            'email'             => 'required|string|email|max:100|unique:medicos,email,' . $this->medico_id,
            'phone'             => 'required|numeric',
            'address'           => 'required|string',
            'especialidade_id'  => 'required|numeric',
        ]);

        $status  = 'success';
        $content = 'El medico ' . $this->name . ' ' . $this->lastnames . ' se actualizó correctamente.';

        try {

            DB::beginTransaction();

            if ($this->medico_id) {
                $medico = Medico::find($this->medico_id);
                $medico->update([
                    'key'              => $this->key,
                    'name'             => $this->name,
                    'lastnames'        => $this->lastnames,
                    'email'            => $this->email,
                    'phone'            => $this->phone,
                    'address'          => $this->address,
                    'especialidade_id' => $this->especialidade_id,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió en error al tratar de actualizar el medico, por favor, vuelve a intentarlo una vez más';
        }
        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('medicoEventoActualizar');
    }

    public function delete(Medico $medico)
    {
        try {

            $this->medico_id   = $medico->id;
            $this->key         = $medico->key;
            $this->name        = $medico->name;
            $this->lastnames   = $medico->lastnames;

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
        $content = 'El medico ' . $this->name . ' ' . $this->lastnames . ' se elimino correctamente.';

        try {

            DB::beginTransaction();

                Medico::find($this->medico_id)->delete();

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al tratar de eliminar el medico ' . $this->name . ' ' . $this->lastnames . ', intentalo una vez más.';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('medicoEventoEliminar');
    }

    public function clean()
    {
        $this->reset([
            'medico_id',
            'key',
            'name',
            'lastnames',
            'email',
            'phone',
            'address',
            'especialidade_id',
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

        $especialidades   = Especialidade::orderBy('description', 'Asc')->where('status', '=', 1)->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.medico.medico-component',
            [
                'medicos' => Medico::latest('id')
                    ->where('key', 'LIKE', "%{$this->search}%")
                    ->OrWhere('name', 'LIKE', "%{$this->search}%")
                    ->OrWhere('lastnames', 'LIKE', "%{$this->search}%")
                    ->OrWhere('email', 'LIKE', "%{$this->search}%")
                    ->OrWhere('phone', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('especialidades')
        );
    }
}
