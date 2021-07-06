@extends('layouts.admin')
@section('pageTitle', 'Shto Huazimin')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Huazo</div>
      <div class="card-body">
        <form action="{{route('borrows.store')}}" method="POST">
          @csrf 
        
          <div class="form-group pt-2">
            <label for="libri">Nxenesi</label>
             <select id="student_id"  name="student_id" class="form-control" placeholder="zgjedh">
                <option selected disabled hidden>Zgjedh  Nxenesin...</option>
                @foreach($students as $student)
                <option value="{{ $student->id }}"> {{ $student->name }} {{ $student->surname }}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group pt-2">
            <label for="libri">Libri</label>
             <select id="book_id"  name="book_id" class="form-control" placeholder="zgjedh" value="{{ old('book_id') }}">
                <option selected disabled hidden>Zgjedh Librin...</option>
                <option style="font-weight: bold" disabled> Emri - Kategoria</option>
               
                @foreach($books as $book)
                <option value="{{ $book->id }}"> {{ $book->emri }} - {{ $book->category->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group pt-2">
            <label for="date">Data e kthimit</label>
            <input class="form-control" name="date" id="date" type="date" placeholder="" value="{{ old('date') }}">
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