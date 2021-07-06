@extends('layouts.admin')
@section('pageTitle', 'Nrysho Nxenesa')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Edito kete nxenes Nxensin</div>
      <div class="card-body">
        <form action="{{route('students.update', $student->id)}}" method="POST">
          @csrf 
          @method('PATCH')
          <div class="form-group pt-2">
            <label for="emri">Emri</label>
            <input class="form-control" name="name" id="name" type="text" placeholder="" value="{{$student->name}}">
          </div>
          <div class="form-group pt-2">
            <label for="mbiemri">Mbiemri</label> 
            <input class="form-control" name="surname" id="surname" type="text" placeholder="" value="{{$student->surname}}">
          </div>
           <div class="form-group pt-2">
            <label for="libri">Klasa</label>
             <select id="class"  name="class" class="form-control" placeholder="zgjedh" value="{{ $student->class}}">
                <option disabled hidden>Zgjedh Klasen...</option>
                <option value="10">10 - X</option>
                <option value="11">11 - XI</option>
                <option value="12">12 - XII</option>
              </select>
          </div>
          <div class="form-group pt-2">
            <label for="parallel">Paralelja</label>
            <input class="form-control" name="parallel" id="parallel" type="number" placeholder="" value="{{ $student->parallel }}" max="18" min="0">
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button name="butoni" class="btn btn-space btn-primary text-uppercase" type="submit">Edito</button>
            </div>
          </div>
        </form>
         <form action="{{route('students.show', $student->id)}}" method="Get">
          @csrf

          <button class="btn btn-space btn-secondary text-uppercase" type="cancel">Anulo</button>
            </form>           
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom_footer')
    <script src="/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script src="/js/app-form-elements.js" type="text/javascript"></script>
@endsection
@section('custom_scripts')
 <script type="text/javascript">
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.formElements();
  });
</script>
@endsection