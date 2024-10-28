<?php

namespace App\Http\Livewire\Projects;

use App\Models\Projects;
use Livewire\Attributes\Computed;
use Livewire\Component;



class Index extends Component


{
    public function render()
    {
        return view('livewire.projects.index');
    }

#[Computed()]

    public function projects() 
    {
        return Project::query()->inRandomOrder()->get();
    }
}


