@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column is-four-fifths">
            <h1 class="title">Manage Users</h1>
        </div>
        <div class="column m-t-5 is-pulled-left">
            <a href="{{route('users.create')}}" class="button is-success"> <i class="fa fa-user m-r-5"></i> Create New Users</a>
        </div>
    </div>
    <hr>
    <div class="card">
    <div class="card-content">
        <table class="table is-fullwidth is-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th>{{ $user->id}}</th>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->created_at->toFormattedDateString()}}</td>
                    <td><a href="{{route('users.edit', $user->id)}}" class="button is-outlined">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $users->links() }}
</div>
@endsection