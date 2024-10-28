<div>
    <!-- Exibir a lista de projetos aqui -->
    @foreach($this->projects() as $project)
        <p>{{ $project->name }}</p>
    @endforeach
</div>




