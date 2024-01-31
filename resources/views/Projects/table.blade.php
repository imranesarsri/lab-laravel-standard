<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap table-tasks">
        <thead>
            <tr>
                <th>Nom de Projets</th>
                <th>Descriptions</th>
                <th>Tâches</th>
            </tr>
        </thead>
        <tbody>
            @include('Projects.search')
        </tbody>
        <input type="hidden" id='page' value="1">
    </table>
</div>
