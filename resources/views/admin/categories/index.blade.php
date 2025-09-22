@extends('layouts.app')

@section('content')

    <div class="table-responsive">



            <table class="table table-striped table-bordered">
                <thead>
                    <th>
                        Nom
                    </th>

                    <th>
                        Editer
                    </th>
                    <th>
                        Suprimer
                    </th>
                </thead>
                <tbody>

                    @foreach ($categories as $category )
                    <tr>
                        <td>
                                {{ $category->name }}
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', ['id'=> $category->id]) }}" class="btn btn-lg btn-info" role="button">
                                Edit

                            </a>
                        </td>
                        <td>
                            <a href="{{ route('categories.delete', ['id'=> $category->id]) }}" class="btn btn-lg btn-danger">

                                Delete

                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

    </div>

@endsection
