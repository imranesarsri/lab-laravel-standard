@foreach ($Projects as $Project)
    <tr>
        <td>{{ $Project->name }}</td>
        <td>{{ $Project->description }}</td>

        <td class="">
            <a href="{{ route('task', ['task' => $Project]) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-solid fa-eye"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td></td>
    <td></td>
    <td>
        <div class="pagination m-0 float-right">
            {{ $Projects->links() }}
        </div>

    </td>
</tr>
