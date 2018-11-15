<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  </head>
  <body>
    <table>
    @foreach ($courses as $c)
      <tr>
        <td>{{$c->code}}</td>
        <td>{{$c->credits}}</td>
        <td>{{$c->name}}</td>
      </tr>
    @endforeach
    </table>

    <form method="post">
      @csrf
      <input type="text" name="code" placeholder="code">
      <input type="text" name="credits" placeholder="credits">
      <input type="text" name="name" placeholder="name">
      <input type="submit" value="CREA">
    </form>

    <script type="text/javascript">

      $('form').submit(function(e){
        e.preventDefault();
        $.ajax({
                url: "{{route('api.courses.save')}}",
                method: "POST",
                data: {
                  'code': $('input[name=code]').val(),
                  'credits': $('input[name=credits]').val(),
                  'name': $('input[name=name]').val()
                },
                success: function(result){
                  $('table').append('<tr>\
                    <td>'+$('input[name=code]').val()+'</td>\
                    <td>'+$('input[name=credits]').val()+'</td>\
                    <td>'+$('input[name=name]').val()+'</td>\
                    </tr>\
                  ');
                },
                error: function(){
                  alert("errore");
                }
        });
        return false;
      })

    </script>

  </body>
</html>
