<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\Pelabuhan;
use App\Models\Rute;
use App\Models\State;
use Livewire\Component;

class Dropdowns extends Component
{
    public $pelabuhan1;
    public $pelabuhan2;
    public $jadwal;

    public $selectedPelabuhan1 = null;
    public $selectedPelabuhan2 = null;
    public $selectedJadwal = null;

    public function mount($selectedJadwal = null)
    {
        $this->pelabuhans1 = Pelabuhan::all();
        $this->pelabuhans2 = collect();
        $this->jadwal = collect();
        $this->selectedJadwal = $selectedJadwal;

        if (!is_null($selectedJadwal)) {
            $jadwal = Rute::with('pelabuhan')->find($selectedJadwal);
            if ($jadwal) {
                $this->jadwal = Rute::where('asal_pelabuhan_id', $jadwal->kode_pelabuhan)
                                ->where('tujuan_pelabuhan_id',$jadwal->kode_pelabuhan)
                                ->get();
                $this->pelabuhans2 = Rute::where('asal_pelabuhan_id', $jadwal->pelabuhan->kode_pelabuhan)->get();
                $this->selectedPelabuhan1 = $jadwal->pelabuhan->kode_pelabuhan;
                $this->selectedPelabuhan2 = $jadwal->asal_pelabuhan_id;
            }
        }
    }

    public function render()
    {
        return view('livewire.dropdowns');
    }

    public function updatedSelectedPelabuhan1($pelabuhan1)
    {
        $this->pelabuhan2 = Pelabuhan::where('kode_pelabuhan', $pelabuhan1)->get();
        $this->selectedPelabuhan2 = NULL;
    }

    public function updatedSelectedPelabuhan2($pelabuhan2)
    {
        if (!is_null($pelabuhan2)) {
            $this->jadwal = Rute::where('state_id', $pelabuhan2)->get();
        }
    }
}