@extends('Layouts.Layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des Projets</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header ">
                            {{-- filter --}}
                            <div class="row d-flex justify-content-between">
                                <div class="col-4">
                                    <div class="input-group">
                                        <label class="input-group-text" for="filterselectProjectValue"><i
                                                class="fas fa-filter"></i></label>
                                        <select name="project_id" class="form-select form-control"
                                            id="filterselectProjectValue" aria-label="Filter Select">
                                            <option value="Tout le projets">Tout le projets</option>
                                            @foreach ($projectsFilter as $projectFilter)
                                                <option value="{{ $projectFilter->id }}">
                                                    {{ $projectFilter->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group col-md-3">
                                    <input type="text" class="form-control" placeholder="Recherche"
                                        aria-label="Recherche" aria-describedby="basic-addon1" id="searchInput">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                </div>

                            </div>
                        </div>
                        <div id="search_ajax">
                            @include('Projects.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script_ajax')
    <script>
        $(document).ready(function() {
            function fetchData(page, searchTaskValue, selectProjectValue) {
                $.ajax({
                    url: 'projects?page=' + page + '&searchTaskValue=' + searchTaskValue +
                        '&selectProjectValue=' +
                        selectProjectValue,
                    success: function(data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                });
                console.log(page);
                console.log(searchTaskValue);
                console.log(selectProjectValue);
            }

            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                let page = $(this).attr('href').split('page=')[1];
                let searchTaskValue = $('#searchInput').val();
                let selectProjectValue = $('#filterselectProjectValue').val();
                fetchData(page, searchTaskValue, selectProjectValue);

            });

            $('body').on('keyup', '#searchInput', function() {
                let page = $('#page').val();
                let searchTaskValue = $('#searchInput').val();
                let selectProjectValue = $('#filterselectProjectValue').val();

                fetchData(page, searchTaskValue, selectProjectValue);
            });

            $('#filterselectProjectValue').on('change', function() {
                let page = $('#page').val();
                let searchTaskValue = $('#searchInput').val();
                let selectProjectValue = $(this).val();
                fetchData(page, searchTaskValue, selectProjectValue);
            });

        });
    </script>
@endsection
