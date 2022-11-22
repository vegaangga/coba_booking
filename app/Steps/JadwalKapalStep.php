<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;
use Illuminate\Validation\Rule;

class JadwalKapal extends Step
{
    // Step view located at resources/views/steps/general.blade.php
    protected string $view = 'steps.jadwalkapal';

    /*
     * Initialize step fields
     */
    public function mount()
    {
        $this->mergeState([
            'id_jadwal'          => $this->model->id_jadwal,

            // 'email'                 => $this->model->email,
        ]);
    }

    /*
    * Step icon
    */
    public function icon(): string
    {
        return 'check';
    }

    /*
     * When Wizard Form has submitted
     */
    public function save($state)
    {
        $booking = $this->model;

        $booking->id_jadwal     = $state['id_jadwal'];
        // $user->email    = $state['email'];

        $booking->save();
    }

    /*
     * Step Validation
     */
    public function validate()
    {
        return [
            [
                'state.id_jadwal'     => ['required'],
                // 'state.email'    => ['required', Rule::unique('users', 'email')->ignoreModel($this->model)],
            ],
            [
                'state.name'     => __('Name'),
            ],
        ];
    }

    /*
     * Step Title
     */
    public function title(): string
    {
        return __('Pilih Jadwal Kapal');
    }
}