<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" media="screen" title="no title" charset="utf-8">
      <link rel="stylesheet" href="{{asset('css/stilo.css')}}" media="screen" title="no title" charset="utf-8">
    <title>TPV V1.0</title>

  </head>
  <body>



    <section>
    <div class="container">


    {!!Form::open()!!}
        <div class="form-group">
          <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
          {!!Form::label('producto','Nombre',['class'=>'control-label'])!!}
          {!!Form::text('producto',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
          {!!Form::button('Buscar',['class'=>'btn btn-primary', 'id'=>'registroBtn'])!!}
        </div>



    {!!Form::close()!!}
      <hr>

      <table class="table table-grid " id="ptable">
        <thead>
          <th>
            id
          </th>
          <th>
            producto
          </th>
          <th>
            precio
          </th>

        </thead>
        <tbody>

        </tbody>

      </table>
      <div class="row">
        <div class="col-xs-8 col-md-8" id="tott">TOTAL $</div>
        <div class="col-xs-3 col-md-4" id="totp">0</div>

      </div>
      </div>
    </section>

    <script src="{{asset('plugins/JQuery/js/jquery-2.2.3.js')}}"/></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"/></script>

    <script type="text/javascript">
        $('#registroBtn').click(function(){
          var producto= $('#producto').val();
          var route="/ajax";
          var token= $('#token').val();
          var suma = parseInt($('#totp').text());


          $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token},
            type: 'POST',
            dataType: 'json',
            data: {producto: producto},
            success:function(info){
                $('#ptable tbody').append('<tr><td>'+info.id+'</td><td>'+info.producto+'</td><td>'+info.precio+'</td></tr>');

                suma +=parseInt(info.precio);
                $('#totp').text(suma.toString());
            }
          });


        });
    </script>
  </body>
</html>
