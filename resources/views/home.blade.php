@extends('layouts.app')
{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('Home')}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in! as <strong>{{ strtoupper(Auth::user()->role) }}</strong>
                        <br>

                        Admin Page: <a href="{{ url('/') }}/adminOnlyPage">{{ url('/') }}/adminOnlyPage</a>
                        <br>Super Admin Page: <a href="{{ url('/') }}/userOnlyPage">{{ url('/') }}/userOnlyPage</a>
                        <br>Member Page: <a href="{{ url('/') }}/anonOnlyPage">{{ url('/') }}/anonOnlyPage</a>

                    </div>
                    <div class="card-header"><b>Questions:</b>
                        <a class="btn btn-outline-primary float-right" href="{{ route('question.create') }}">
                            + Add Question
                        </a>
                        <br/>
                        <div class="card-body">

                            <div class="card-deck">
                                @forelse($questions as $question)
                                    <div class="col-sm-4 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Updated: {{ $question->created_at->diffForHumans() }}
                                                    Answers: {{ $question->answers()->count() }}
                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$question->body}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">

                                                    <a class="btn btn-link float-right" href="{{ route('question.show', ['id' => $question->id]) }}">
                                                        <i>View More>></i>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    There are no questions to view, you can  create a question.
                                @endforelse
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $questions->links() }}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            @include("includes.archive")
        </div>
    </div>

@endsection