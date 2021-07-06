@extends('layouts.admin')
  @section('pageTitle', 'Ndrysho Autorin')


@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Edito kete autor Autor</div>
      <div class="card-body">
        <form action="{{route('authors.update', $author->id)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group pt-2">
            <label for="emri">Emri</label>
            <input class="form-control" name='name' id="emri" type="text" placeholder="" value="{{$author->name}}">
          </div>
          <div class="form-group pt-2">
            <label for="mbiemri">Mbiemri</label>
            <input class="form-control"name='surname' id="mbiemri" type="text" placeholder="" value="{{$author->surname}}">
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Edit</button>
            </div>
          </div>
        </form>
          <form action="{{route('authors.show', $author->id)}}" method="Get">
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
