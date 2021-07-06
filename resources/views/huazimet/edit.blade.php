@extends('layouts.admin')
@section('pageTitle', 'Edito Huazimin')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Edito kete huazim</div>
      <div class="card-body">
        <form action="{{route('borrows.update', $borrow->id)}}" method="POST">
          @csrf 
          @method('PATCH')
             <div class="form-group pt-2">
            <label for="libri">Nxenesi</label>
             <select id="student_id"  name="student_id" class="form-control" placeholder="zgjedh" value="{{$borrow->student->name}}">
                <option disabled hidden>Zgjedh  Nxenesin...</option>
                @foreach($students as $student)
                <option value="{{ $student->id }}"> {{ $student->name }} {{ $student->surname }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group pt-2">
            <label for="libri">Libri</label>
            <select id="book_id"  name="book_id" class="form-control" placeholder="zgjedh" value="{{ $borrow->book->id }}">
                <option disabled hidden>Zgjedh Librin...</option>
                <option style="font-weight: bold" disabled> Emri - Autori - Kategoria</option>
                <?php 
                $index = 1;
                ?>
                @foreach($books as $book)
                <option value="{{ $book->id }}"> {{ $book->emri }} @foreach($book->author as $belong) {{$belong->name}} {{$belong->surname}} @if(sizeof($book->author) != $index++), @endif @endforeach - {{ $book->category->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group pt-2">
            <label for="date">Data e kthimit</label>
            <input class="form-control" name="date" id="date" type="date" placeholder="" value="{{$borrow->date}}">
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button name="butoni" class="btn btn-space btn-primary text-uppercase" type="submit">Edito</button>
            </div>
          </div>
        </form>
         <form action="{{route('borrows.show', $borrow->id)}}" method="Get">
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