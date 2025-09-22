@extends('layouts.app')



@section('content')
<div class="main">
<div class="panel-panel-default">

    <div class="panel-heading">

        Editer une categorie: {{ $category->name }}

    </div>

    <div class="panel-body">

        <form action="{{ route('categories.update', ['id'=>$category->id])}}" method="post">

                    {{csrf_field()}}

                <div class="group-form">

                    <label for="name">Nom</label>
                    <input type="text"  value="{{ $category->name }}" name="name" class="form-control">

                </div>
                <br/>

                <div class="group-form">

                    <div class="text-center">

                        <button class="btn btn-success" type="submit">

                             Enregistrer

                        </button>
                    </div>
                </div>

        </form>
    </div>
</div>
</div>

@endsection
