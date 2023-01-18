@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                {{-- <h1>{{ $modul }}</h1> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Pasien</a></div>
                    {{-- <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div> --}}
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Pasien</h4>
                    </div>
                    <div class="card-body">
                        <div class="section-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Daftar Pasien</h4>
                                        </div>
                                        <div class="card-body" style="background-color: rgb(245, 245, 245)">
                                            <ul class="list-unstyled list-unstyled-border">
                                                @foreach ($data as $item)
                                                    <li class="media" id="list"
                                                        onclick="getChat({{ $item->id }})">
                                                        <img alt="image" class="mr-3 rounded-circle" width="50"
                                                            src="{{ asset('stisla/dist/assets/img/avatar/avatar-1.png') }}">
                                                        <div class="media-body">
                                                            <div class="mt-0 mb-1 font-weight-bold">
                                                                {{ $item->pasien->name }}
                                                            </div>
                                                            <div class="text-success text-small font-600-bold">
                                                                {{-- <i class="fas fa-circle"></i> --}}
                                                                Pasien
                                                            </div>
                                                        </div>
                                                        {{-- <button class="btn btn-sm btn-primary">
                                                            <i class="fas fa-paper-plane"></i>
                                                        </button> --}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-8">
                                    <div class="card chat-box " id="mychatbox">
                                        <div class="card-header bg-secondary" id="namaPersonal">
                                        </div>
                                        <div class="card-body chat-content" id="chatroom">
                                        </div>
                                        <div class="card-footer chat-form bg-secondary" id="formInput">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function getChat(id) {
            $("#spaceName").remove();
            $("#spaceForm").remove();
            $("#spaceId").remove();
            $("#button").remove();
            $("#input").remove();
            $("#spaceChat").remove();
            $.ajax({
                type: "get",
                url: "konsultasi/getClusterById/" + id,
                data: "data",
                dataType: "json",
                success: function(response) {
                    chat(id);
                    $("#namaPersonal").append(
                        `
                            <h4 id="spaceName">` + response.name + `</h4>
                        `
                    );
                    $("#formInput").append(
                        `
                        <form id="chat-form" method="POST" action="{{ url('faskes/konsultasi/kirim') }}" id="spaceForm">
                            @csrf
                            <input type="hidden" name="id" value="` + id + `" id="spaceId">
                            <input type="text" class="form-control" placeholder="Type a message"
                                style="background-color: rgb(214, 214, 214)" id="input"
                                name="pesan">
                            <button class="btn btn-primary" id="button">
                                <i class="far fa-paper-plane"></i>
                            </button>
                        </form>
                        `
                    );
                }
            });
        }

        function chat(id) {
            $.ajax({
                type: "get",
                url: "konsultasi/getChatById/" + id,
                data: "data",
                dataType: "json",
                success: function(response) {
                    if (response != []) {
                        $.each(response, function(key, item) {
                            if (item.pengirim === "pasien") {
                                if (item.tipe == "text") {
                                    $("#chatroom").append(
                                        `
                                  <div class="card bg-light float-left p-2" style="width: 75%" id="spaceChat">
                                        <span>` + item.pesan + `</span>
                                    </div>
                                  `
                                    );
                                } else {
                                    $("#chatroom").append(
                                        `
                                  <div class="card bg-light float-left p-2" style="width: 75%" id="spaceChat">
                                        <span>` + item.pesan + `</span>
                                    </div>
                                  `
                                    );
                                }
                            } else {
                                $("#chatroom").append(
                                    `
                              <div class="card bg-success float-right p-2" style="width: 75%" id="spaceChat">
                                    <span>` + item.pesan + `</span>
                                </div>
                              `
                                );
                            }
                        });
                    } else {
                        console.log(response);
                    }
                }
            });

        }
    </script>
@endsection

{{-- if (response.cluster_id != undefined) {
                        
                        if (response.pengirim === "pasien") {
                            $("#chatroom").append(
                                `
                              <div class="card bg-light float-left p-2" style="width: 75%">
                                    <span>` + response.pesan + `</span>
                                </div>
                              `
                            );
                        } else {
                            $("#chatroom").append(
                                `
                              <div class="card bg-success float-right p-2" style="width: 75%">
                                    <span>` + response.pesan + `</span>
                                </div>
                              `
                            );
                        }
                    } --}}
