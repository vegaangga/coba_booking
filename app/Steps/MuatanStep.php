<?php

namespace App\Steps;

use Illuminate\Validation\Rule;
use Vildanbina\LivewireWizard\Components\Step;

class MuatanStep extends Step
{
    protected string $view = 'steps.muatan';

    public function mount()
    {
        $this->mergeState([
            'id_container' => $this->model->id_container,
            'id_barang' => $this->model->id_barang
            
        ]);
    }

    public function icon(): string
    {
        return 'check';
    }

    public function validate()
    {
        return [
            [
                'state.email' => ['required', 'email', Rule::unique('users', 'email')],
            ],
            [
                'state.email' => __('Email'),
            ],
        ];
    }

    public function title(): string
    {
        return __('Isi Detail Muatan');
    }
}
