@extends('Layouts.Layout')
@section('content')
    <div class="content-header">
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter Une Tâche</h3>
                        </div>
                        <form action="{{ route('tasks.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Projet">Projet <span class="text-danger">*</span></label>
                                    <select name="project_id" id="Projet" class="custom-select">
                                        @foreach ($ProjectsFilter as $ProjectFilter)
                                            <option value="{{ $ProjectFilter->id }}">{{ $ProjectFilter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nominputnom1">Nom <span class="text-danger">*</span></label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') border-danger @enderror" id="nominputnom1"
                                        placeholder="Enter le name de Tâche" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="">Description</label>
                                    <textarea class="form-control @error('description') border-danger @enderror" name="description" rows="3"
                                        placeholder="Entre un Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('tasks.index') }}" class="btn btn-default">Annuler</a>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
