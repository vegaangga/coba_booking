<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\Booking;
use Livewire\Component;
use Illuminate\Http\Request;

class Wizard extends Component
{
    public $currentStep = 1;
    //barang
    public $nama_barang, $jenis_barang, $berat, $jumlah;
    //booking
    public $jadwalkapal, $id_barang, $id_container, $nama_penerima, $telp_penerima,$status = 1;
    public $successMessage = '';
    public $name, $amount, $description, $stock;

    public function render()
    {
        return view('livewire.wizard');
    }

    //step1-jadwal kapal
    public function firstStepSubmit(Request $request)
    {
        $jadwal = $request->jadwal;
        
        $validatedData = $this->validate([
            'jadwalkapal' => 'required',
        ]);

        $this->currentStep = 1;
    }
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'id_container' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'berat' => 'required|number',
            'jumlah' => 'required|number'
        ]);

        $this->currentStep = 2;
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'nama_penerima' => 'required',
            'telp_penerima' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm()
    {
        Barang::create([
            'nama_barang' => $this->nama_barang,
            'jenis_barang' => $this->jenis_barang,
            'berat' => $this->container,
            'jumlah' => $this->nama_penerima,
        ]);
        Booking::create([
            'id_jadwal' => $this->jadwalkapal,
            'id_user' => '1',
            'id_container' => $this->container,
            'nama_penerima' => $this->nama_penerima,
            'telp_penerima' => $this->telp_penerima,
            'status' => '1',
        ]);



        $this->successMessage = 'Product Created Successfully.';

        $this->clearForm();

        $this->currentStep = 1;
    }
    public function back($step)
    {
        $this->currentStep = $step;
    }
    public function clearForm()
    {
        $this->name = '';
        $this->amount = '';
        $this->description = '';
        $this->stock = '';
        $this->status = 1;
    }
}
