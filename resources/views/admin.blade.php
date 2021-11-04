@extends('layouts.app')
@section('content')
    <script>
        $('.table').DataTable({
            searching: true,
            lengthChange: true,
            pageLength: 10,
        });
    </script>
    <div class="p-5">
        <table class="table">
            <thead>
            @foreach(['ID', 'Username', 'E-Mail', 'Color', 'Date'] as $col)
                <td>{{$col}}</td>
            @endforeach
            </thead>
            <tbody>
            @foreach(\App\Models\User::all() as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->color}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
