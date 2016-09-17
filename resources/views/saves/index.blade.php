@extends('layouts.layout')
@section('title', 'Saves')
@section('content')
<div class="page-gutterless">
    @if($saves->isEmpty())
        <div spacing="1">
            <p>Looks like you dont have any saves set up yet</p>
            <p class="align-center"><a href="#" class="button--primary" data-toggle="create-team">Create Save</a></p>
        </div>

    <div class="block--modal-overlay hide" data-target="create-team">
        <div class="block block-color--default block--modal">
            <header class="block__title">
                <h3>Create a save</h3>
            </header>
            <div class="block__content">
            <form class="form" action="{{ route('post.saves', [Auth::user()->username ]) }}" method="post">
                {{ csrf_field() }}
                <div class="form__group">
                    <label class="form__label"for="">Save Name</label>
                    <input class="form__input"type="text" name="saveName" value="" required="required">
                </div>
                <div class="form__group">
                    <label class="form__label"for="">Manager Name</label>
                    <input class="form__input"type="text" name="saveManager" value="" required="required">
                </div>
                <div class="layout-split-2--apart">
                    <div class="column">
                        <p><a href="#" class="button--secondary">Cancel</a></p>
                    </div>
                    <div class="column">
                        <button type="submit" name="button--primary">Save</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

@else
    <p><a href="#" class="button button--secondary" data-toggle="create-team">Create Save</a></p>

    <div class="block--modal-overlay hide" data-target="create-team">
        <div class="block--modal">
            <header class="block__title">
                <h3>Create a save</h3>
            </header>
            <form class="" action="{{ route('post.saves', [Auth::user()->username ]) }}" method="post">
                {{ csrf_field() }}

                    <label for="">Save Name</label>
                    <input type="text" name="saveName" value="" required="required">

                    <label for="">Manager Name</label>
                    <input type="text" name="saveManager" value="" required="required">

                <button type="submit" name="button">Save</button>

            </form>
        </div>
    </div>
    <div class="layout-split-3" spacing="2">
        @foreach($saves as $save)
            <div class="column block {{$team->isEmpty() ? 'block-color--default' : 'block-color--'.$team[0]->team_color}} border-top">
                <div class="layout-split-full">
                    <div class="column">
                        <h2>{{ $save->save_name }} <span data-toggle="edit-{{ $save->id }}">edit</span></h2>
                        <p>{{ $save->save_manager_name }}</p>
                        <p>{{$team->isEmpty() ? '' : $team[0]->team_name}}</p>
                    </div>
                </div>
                <div class="layout-split-2">
                    <div class="column">
                        <p>Teams 0</p>
                        <p>Seasons 0</p>
                        <p>Trophies 0</p>
                    </div>
                    <div class="column">
                        <p><a href="{{ route('show.seasons', [Auth::user()->username, $save->slug ]) }}">open</a></p>
                    </div>
                </div>

                <div class="block--modal-overlay hide block-{{ $save->save_color}}" data-target="edit-{{ $save->id }}">
                    <div class="block--modal">
                        <header class="block__title">
                            <h3>Edit Save</h3>
                        </header>
                        <form method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <input type="hidden" name="save_id" value="{{ $save->id }}">


                                <label for="">Save Name</label>
                                <input type="text" name="saveName" value="{{ $save->save_name }}" required="required">

                                <label for="">Manager Name</label>
                                <input type="text" name="saveManager" value="{{ $save->save_manager_name }}" required="required">
                            <button type="submit" name="button" formaction="{{ route('update.saves', [Auth::user()->username ]) }}">Save</button>

                        </form>
                        <form class="" action="index.html" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="id" value="{{ $save->id }}">
                            <button type="submit" name="button" formaction="{{ route('delete.saves', [Auth::user()->username ]) }}">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
</div>
@endsection
