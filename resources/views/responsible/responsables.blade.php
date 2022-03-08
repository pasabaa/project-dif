@extends('layouts.app')
@section('content')

<div class="row justify-content-start p-4 mt-4">
    <div class="col-12">
        <h1 class="display-4">Responsables</h1>
        <p>
            Dirigir eficazmente a la institución desde los ámbitos administrativos, operativos y de comunicación, 
            a través de las acciones administrativas, legales y de difusión que corresponda.
        </p>

    </div>
</div>

<div class="row justify-content-center p-4 h-100">
    @foreach($responsibles as $responsible)

    @if ($responsible->charge === "Presidente del SMDIF")
    <div class="col-10">
        <div class="card my-2 p-4 node border-4 border-dark">
            <div class="text-center">
                <img class="img-fluid rounded-circle" width="150" src="uploads/responsibles/{{$responsible->url }}"
                    alt="{{$responsible->name}}">
            </div>
            <div class="card-body p-4 text-center">
                <h3 class="card-title fw-bolder text-center">{{$responsible->name}}</h3>
                <h4 class="card-text text-center">{{$responsible->date_charge}}</h4>
                <p class="card-text h5 text-center text-primary">{{$responsible->charge}}</p>
               
                            <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modal-{{$responsible->id}}">
                    Información Completa
                </button>
            </div>
        </div>
    </div>
    @elseif($responsible->charge === "Director General del SMDIF")
    <div class="col-10">
        <div class="card my-2 p-4 node-up border-3 border-dark">
            <div class="text-center">
                <img class="img-fluid rounded-circle" width="150" src="uploads/responsibles/{{$responsible->url }}"
                    alt="{{$responsible->name}}">
            </div>
            <div class="card-body p-4 text-center">
                <h3 class="card-title fw-bolder text-center">{{$responsible->name}}</h4>
                <h4 class="card-text text-center">{{$responsible->date_charge}}</h5>
                <p class="card-text h5 text-center text-primary">{{$responsible->charge}}</p>
              
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-dark btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modal-{{$responsible->id}}">
                    Información Completa
                </button>
            </div>
        </div>
    </div>

    @else

    <div class="col-lg-4 col-12 mt-4">
        <div class="card my-2 p-4 node-up border-2 border-dark h-max h-100">
            <div class="text-center">
                <img class="img-fluid rounded-circle" width="100" src="uploads/responsibles/{{$responsible->url }}"
                    alt="{{$responsible->name}}">
            </div>
            <div class="card-body p-4 text-center">
                <h5 class="card-title fw-bolder text-center">{{$responsible->name}}</h5>
                <h6 class="card-text text-center">{{$responsible->date_charge}}</h6>
                <p class="card-text text-center text-primary">{{$responsible->charge}}</p>
               
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$responsible->id}}">
                    Información Completa
                </button>
            </div>
        </div>
    </div>
    @endif

  
  <!-- Modal -->
  <div class="modal fade" id="modal-{{$responsible->id}}" tabindex="-1" aria-labelledby="modal-{{$responsible->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="text-center" id="exampleModalLabel">{{$responsible->charge}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            <div class="text-center my-4">
                <img class="img-fluid rounded-circle" width="100" src="uploads/responsibles/{{$responsible->url }}"
                    alt="{{$responsible->name}}">
            </div>
            <h3 class="card-title fw-bolder text-center">{{$responsible->name}}</h3>
                <h4 class="card-text text-center">{{date('l j F Y', strtotime($responsible->date_charge));}}</h4>
                <p class="card-text text-center fw-bolder">{{$responsible->area}}</p>
            <p class="card-text text-justify">{!! nl2br($responsible->description)!!}</p>
        </div>
      </div>
    </div>
  </div>

    @endforeach
</div>


@endsection
