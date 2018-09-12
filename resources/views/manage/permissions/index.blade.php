@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column is-four-fifths">
            <h1 class="title">Manage Permissions</h1>
        </div>
        <div class="column m-t-5 is-pulled-left">
            <a href="{{route('permissions.create')}}" class="button is-success"> <i class="fa fa-user m-r-5"></i> Create New Permission</a>
        </div>
    </div>
    <hr>
    <div class="card">
    <div class="card-content">
        <table class="table is-fullwidth is-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permission as $p)
                <tr>
                    <td>{{ $p->display_name}}</td>
                    <td>{{ $p->name}}</td>
                    <td>{{ $p->description}}</td>
                    <td>
                        <a href="{{route('permissions.show', $p->id)}}" class="button is-outlined">View</a>
                        <a href="{{route('permissions.edit', $p->id)}}" class="button is-outlined">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $permission->links() }}
</div>
@endsection