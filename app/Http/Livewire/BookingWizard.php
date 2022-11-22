<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\Booking as ModelsBooking;
use App\Steps\JadwalKapal;
use App\Steps\Muatan;
use App\Steps\Penerima;
// use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Component;

class Booking extends Component
{
    public $currentStep = 1;
    //barang
    public $nama_barang, $jenis_barang, $berat, $jumlah;
    //booking
    public $id_jadwal, $id_barang, $id_container, $nama_penerima, $telp_penerima,$status = 1;
    public $successMessage = '';

    public function render()
    {
        return view('livewire.wizard');
    }

    //step1-jadwal kapal
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'id_jadwal' => 'required',
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
        ModelsBooking::create([
            'name' => $this->name,
            'amount' => $this->amount,
            'description' => $this->description,
            'stock' => $this->stock,
            'status' => $this->status,
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
