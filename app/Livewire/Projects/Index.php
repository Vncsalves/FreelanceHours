<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;

class Index extends Component
{
    public $projects;

    public function mount()
    {
        // Carregue os projetos do banco de dados
        $this->projects = Project::all();
    }

    public function render()
    {
        return view('livewire.projects.index');
    }
}


