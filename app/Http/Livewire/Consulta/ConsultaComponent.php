<?php

namespace App\Http\Livewire\Consulta;

use Livewire\Component;

use App\Models\Consulta;
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

class ConsultaComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $consulta_id, $folio, $date, $description, $status, $created_at, $updated_at, $accion = "store";

    public $paciente_id, $curp, $nameP, $lastnamesP, $emailP, $phoneP;

    public $medico_id, $key, $nameM, $lastnamesM, $emailM, $phoneM;
    
    public $search = '', $perPage = '10', $page = 1, $total;

    public $rules = [
        'folio'             => 'required|string|max:18|unique:consultas,folio',
        'date'              => 'required|date',
        'description'       => 'required|string',
        'status'            => 'required|numeric',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'folio'             => 'folio',
        'date'              => 'fecha',
        'description'       => 'descripción',
        'status'            => 'estado',
    ];

    public function mount()
    {
        $this->total = count(Consulta::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updatedInTimeNow($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'folio'             => 'required|string|max:18|unique:consultas,folio',
                'date'              => 'required|date',
                'description'       => 'required|string',
                'status'            => 'required|numeric',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'folio'             => 'required|string|max:18|unique:consultas,folio,' . $this->consulta_id,
                'date'              => 'required|date',
                'description'       => 'required|string',
                'status'            => 'required|numeric',
            ]);
        }
    }

    public function store()
    {
        $this->validate([
            'folio'             => 'required|string|max:18|unique:consultas,folio',
            'date'              => 'required|date',
            'description'       => 'required|string',
            'status'            => 'required|numeric',
        ]);

        $status  = 'success';
        $content = 'La consulta con el numero de folio  ' . $this->folio . ' se agrego correctamente.';

        try {

            DB::beginTransaction();

            $consulta = Consulta::create([
                'folio'              => $this->folio,
                'date'               => $this->date,
                'description'        => $this->description,
            ]);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió en error al tratar de agregar la consulta con el numero de folio, por favor, vuelve a intentarlo una vez más';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('consultaEventoCrear');
    }

    public function clean()
    {
        $this->reset([
            'folio',
            'date',
            'description',
            'status',
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
        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.consulta.consulta-component',
            [
                'consultas' => Consulta::latest('id')
                    ->where('folio', 'LIKE', "%{$this->search}%")
                    ->OrWhere('date', 'LIKE', "%{$this->search}%")
                    ->OrWhere('description', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ]
        );
    }
}
