<?php

namespace App\Livewire\Resources;

use App\Livewire\Forms\ResourceForm;
use App\Util;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, Util;

    public ResourceForm $form;

    public function save()
    {
        try {
            $this->form->store();
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return;
        }

        session()->flash('success', 'Resource saved successfully.');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.resources.create');
    }
}
