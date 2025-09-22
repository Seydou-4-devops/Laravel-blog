@extends('layouts.app')

@section('content')

    <div class="table-responsive">



            <table class="table table-striped table-bordered">
                <thead>

                    <th>

                     image

                    </th>

                    <th>

                        titre

                    </th>

                    <th>

                        Editer

                    </th>

                    <th>

                       Restore

                    </th>

                    <th>

                        Suprimer

                     </th>

                </thead>
                <tbody>

                    @foreach ($posts as $post )

                    <tr>
                        <td>
                            <img src="{{ asset($post->featured) }}"  width="50px;" height="50px;"/>
                        </td>

                        <td>
                                {{ $post->title }}
                        </td>

                        <td>
                                Edit
                        </td>

                        <td>
                             <a href="{{ route('posts.restore', ['id' => $post->id]) }}" class="btn btn-xs btn-success">Restore</a>
                        </td>

                        <td>
                            <a href="{{ route('posts.kill', ['id' => $post->id]) }}" class="btn btn-xs btn-danger">Suprimer</a>
                        </td>

                    </tr>

                    @endforeach

                </tbody>
            </table>

    </div>

@endsection
