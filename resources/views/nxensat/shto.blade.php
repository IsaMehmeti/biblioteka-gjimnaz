@extends('layouts.admin')
@section('pageTitle', 'Shto Nxenesa')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Shto Nxensin</div>
      <div class="card-body">
        <form action="{{route('students.store')}}" method="POST">
          @csrf 
          <div class="form-group pt-2">
            <label for="inputEmail">Emri</label>
            <input class="form-control" name="name" id="name" type="text" placeholder="" value="{{ old('name') }}">
          </div>
          <div class="form-group pt-2">
            <label for="mbiemri">Mbiemri</label>
            <input class="form-control" name="surname" id="surname" type="text" placeholder="" value="{{ old('surname') }}">
          </div>
          <div class="form-group pt-2">
            <label for="libri">Klasa</label>
             <select id="class"  name="class" class="form-control" placeholder="zgjedh" value="{{ old('class') }}">
                <option selected disabled hidden>Zgjedh Klasen...</option>
                <option value="10">10 - X</option>
                <option value="11">11 - XI</option>
                <option value="12">12 - XII</option>
              </select>
          </div>
          <div class="form-group pt-2">
            <label for="parallel">Paralelja</label>
            <input class="form-control" name="parallel" id="parallel" type="number" placeholder="" value="{{ old('parallel') }}" max="18" min="1">
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Shto</button>
                <button class="btn btn-space btn-secondary text-uppercase">Anulo</button>
            </div>
          </div>
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