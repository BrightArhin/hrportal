@extends('client.layouts.app')

@section('content')

    <div>
        @if (Route::has('login') )
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign out
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif



        <div class="container">

            <h1 class="title">STAFF DETAILS</h1>
            <div class="main-content">
                <div class="detail">
                    <div class="detail-content">
                        <p class="detail-label">Name:</p>
                        <p class="">{{Auth::user()->full_name}}</p>
                    </div>
                    <div class="detail-content">
                        <p class="detail-label">Department:</p>
                        <p class="">{{Auth::user()->worksIn->name}}</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="detail-content">
                        <p class="detail-label">Location:</p>
                        <p class="">{{Auth::user()->location->name}}</p>
                    </div>
                    <div class="detail-content">
                        <p class="detail-label">Qualification:</p>
                        <p class="">{{Auth::user()->qualification->name}}</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="detail-content">
                        <p class="detail-label">Rank:</p>
                        <p class="">{{Auth::user()->rank->name}}</p>
                    </div>
                    <div class="detail-content">
                        <p class="detail-label">Grade:</p>
                        <p class="">{{Auth::user()->grade->name}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container table-information">
            <h2 style=" margin-top :10px; align-self: flex-start">Evaluate Yourself</h2>

            <table class="table" style="margin-top: 10px">
                <thead>
                <tr>
                    <th>Key Point Indicator</th>
                    <th>Score</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Acceptance of responsibility</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>Punctuality</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>Co-operation</td>
                    <td>90</td>

                </tr>
                </tbody>
            </table>
            <button type=submit class="btn btn-danger">Submit</button>
        </div>

    </div>
@endsection

