<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap table-tasks">
        <thead>
            <tr>
                <th>Tâche</th>
                <th>Projet</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>


            @include('Tasks.search')

        </tbody>
        <input type="hidden" id='page' value="1">
    </table>
</div>
