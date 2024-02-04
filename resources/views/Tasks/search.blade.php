@if ($Tasks->isEmpty())
    <tr>
        <td colspan="4" class="text-center">
            <img style="width: 40%;" src="{{ asset('images/emptyResult.png') }}" alt="Empty Result">
        </td>
    </tr>
@else
    @foreach ($Tasks as $Task)
        <tr>
            <td>{{ $Task->name }}</td>
            <td>{{ $Task->project->name }}</td>

            <td>{{ Str::limit($Task->description, 60) }}</td>

            <td class="d-flex">
                <a href="{{ route('tasks.show', $Task->id) }}" class="btn btn-sm btn-default">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <a href="{{ route('tasks.edit', $Task->id) }}" class="btn btn-sm btn-default mx-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form action="{{ route('tasks.destroy', $Task->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endif

<tr>
    <td colspan="3"></td>
    <td>
        <div class="pagination m-0 float-right">
            {{ $Tasks->links() }}
        </div>

    </td>
</tr>
