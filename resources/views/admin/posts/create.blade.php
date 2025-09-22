@extends('layouts.app')



@section('content')

<div class="panel-panel-default">

    <div class="panel-heading">
        Creer un article
    </div>

    <div class="panel-body">

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

                    {{csrf_field()}}

                <div class="group-form">

                    <label for="title">Titre</label>
                    <input type="text" name="title" class="form-control">

                </div>
                <div class="group-form">

                    <label for="featured">Photos</label>
                    <input type="file" name="featured" class="form-control">

                </div>

                <div class="group-form">

                    <label for="category">Selectionner la categorie</label>

                        <select name="category_id" id="category" class="form-control">

                                @foreach ($categories as $category)

                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                                @endforeach

                         </select>

                </div>


                <div class="group-form">

                    <label for="content">Contenu</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="20"></textarea>

                </div>

                <div class="group-form">

                    <div class="text-center">
                        <br/>
                        <button class="btn btn-success" type="submit">

                             Enregistrer

                        </button>
                    </div>
                </div>

        </form>
    </div>

</div>

@endsection
