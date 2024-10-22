<div>
    @if($projects && $projects->isNotEmpty())
        @foreach($projects as $project)
            <li>
                <a href="{{ route('project.show', $project) }}">
                    {{$project->id}}. {{$project->title}}
                </a>
            </li>
        @endforeach
    @else
        <li>Nenhum projeto encontrado.</li>
    @endif
</div>



