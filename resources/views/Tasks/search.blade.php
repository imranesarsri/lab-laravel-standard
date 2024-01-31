@foreach ($tasks as $task)
    <tr>
        <td>{{ $task->name }}</td>
        <td>{{ $task->project->name }}</td>

        <td>{{ Str::limit($task->description, 50) }}</td>

        <td class="d-flex">
            <a href="{{ route('task.show', $task->id) }}" class="btn btn-sm btn-default">
                <i class="fa-solid fa-eye"></i>
            </a>
            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('task.destroy', $task->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="3"></td>
    <td>
        <div class="pagination m-0 float-right">
            {{ $tasks->links() }}
        </div>

    </td>
</tr>
