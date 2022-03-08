@extends('layouts.app')
@section('content')
<div class="row justify-content-start p-4 mt-4">
    <h1 class="display-4">Salud Familiar</h1>
    <p>En esta sección se presenta información acerca del apartado Salud Familiar.</p>
    @foreach ($families as $familie)
    <div id="content-{{$familie->id}}" class="col-lg-4 col-12 mt-2">
        <div class="card p-2 border-0 h-100 h-max bg-white">
            <div class="card-body text-justify">
                        <p class="card-title h1 fw-light">{{$familie->name}}</p>
                        <p class="fw-bolder m-0">Responsable <div contenteditable="false" class="fw-normal">{!! nl2br(Str::title($familie->responsableFamily->name))!!}</div></p>
                        <p class="fw-bolder m-0">Objetivo <div contenteditable="false" class="content-p card-text">{!! nl2br($familie->target)!!}</div></p>
                        <p>
                            <div class="collapse" id="collapse-{{$familie->id}}">
                                <div class="more-info">
                                    <p class="fw-bolder m-0">Dirigido a <div contenteditable="false" class="content-p card-text">{!! nl2br($familie->addressed)!!}</div></p>
                                    <p class="fw-bolder m-0">Requerimientos <div contenteditable="false" class="content-p card-text">{!! nl2br($familie->requirements)!!}</div></p>
                                    <p class="fw-bolder m-0">Télefono <span class="fw-normal">{{Str::title($familie->phone_number)}}</span></p>
                                </div>
                              </div>
                            <button class="btn btn-{{$familie->id}} btn-sm btn-light mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$familie->id}}" aria-expanded="false" aria-controls="collapse-{{$familie->id}}">
                              Leer Más
                            </button>
                          </p>
                    </div>
            </div>
        </div>

        <script>
            // var btnInfo = "<?php echo ".btn-" . $familie->id;?>";
            var btn = document.querySelectorAll('.btn');
            var currentBtn = btn;
        
            for (let i = 0; i < currentBtn.length; i++) {
        
                currentBtn[i].onclick = function () {
        
                    if ( currentBtn[i].innerHTML === "Leer Menos") {
                        currentBtn[i].innerHTML = "Leer Más";
                    } else {
                        currentBtn[i].innerHTML = "Leer Menos";
                    }
                    
                }
            }
        </script>

    @endforeach
   
</div>


{!! $families->links() !!}


@endsection