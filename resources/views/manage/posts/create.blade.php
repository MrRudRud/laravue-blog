@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Add New Blog Post</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <form action="{{route('roles.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="columns">
            <div class="column is-three-quarters">
                <b-field>
                    <b-input placeholder="Post Title" size="is-large"></b-input>
                </b-field>
                <p class="m-b-10">{{url('/blog')}}</p>
                <b-field>
                    <b-input type="textarea"
                        rows="20"
                        placeholder="Compose your masterpiece...">
                    </b-input>
                </b-field>
            </div> <!--end of column is three quarters-->
            <div class="column is-one-quarter">
                <div class="card">
                <div class="card-content">
                    <div class="media">
                    <div class="media-left">
                        <figure class="image is-50x50 is-rounded">
                        <img src="https://placehold.it/50x50" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4">John Smith</p>
                        <p class="subtitle is-6">@johnsmith</p>
                    </div>
                    </div>
                    <hr>
                    <div class="content">
                        <p class="is-pulled-left"> <i class="fa fa-list-alt fa-large"></i>Draf Saved</p>
                        <p class="is-pulled-left">A few minutes ago</p>
                        <button href="#" class="button is-default">Save Draft</button>
                        <button href="#" class="button is-primary">Publish</button>
                    </div>
                </div>
                </div>
            </div> <!-- end of .column.is-one-quarter-->
        </div>

        <button class="button is-success m-b-20">Create Post</button>
        </form>

    </div>
@endsection
@section('script')
    <script>
    var app = new Vue({
        el: '#app',
        data: {
            
        }
    });
    </script>
@endsection