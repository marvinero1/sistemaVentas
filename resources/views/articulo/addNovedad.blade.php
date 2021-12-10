@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Administración Novedades</h5>
                     <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="fa fa-times" aria-hidden="true"></i>
                     </button> -->
                 </div>
                 <div class="modal-body" style="text-align: center;">
                      <form action="{{route('articulo.addNovedad', $articulo->id)}}"
                         method="POST" enctype="multipart/form-data"
                         style="margin-block-end:-1em !important;">
                         {{ csrf_field() }}
                         {{ method_field('PUT') }}
                         <input type="hidden" name="novedad" value="true">

                         @if(Auth::user())
                         <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                         @endif
                         <h4>Agregar a Lista de Novedad</h4>
                         <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="imagen">Imagen Novedad</label>
                                  <label for="file-upload" class="custom-file-upload"
                                      style="text-align: center;">
                                      <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                  </label>
                                  <p><strong>Sugerencia:</strong> Para una mejor visualizacion se
                                      recomienda<strong> 500 × 250 pixels</strong></p>
                                  <input id="file-upload" type="file" name="imagen_novedad">
                              </div>
                          </div>
                      </div>
                         <div class="row" style="display: block;">
                             <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary"
                                     style="width: 100% !important; "><span
                                         class="icon-star"></span>&nbsp; Añadir</button>
                              
                             </div>
                     </form>
                 </div>
             </div>
        </div>
    </section>
</div>
