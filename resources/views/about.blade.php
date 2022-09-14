@extends('layouts.layout')
@section('isi')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h3>About</h3>
                    <div class="row">

                        <img class="col-sm-2" src="{{asset('images/foto-profil.png')}}" alt="">
                        <div class="col-sm-5">
                            <ul>
                                <li> Nama : Mochammad Faisal Rahman</li>
                                <li> NIM : 1931710117</li>
                                <li>Tanggal : 13 September 2022</li>
                            </ul>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection