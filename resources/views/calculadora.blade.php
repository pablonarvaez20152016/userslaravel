<html>
<body>
<form>
</form>
<h2>Hola {{ $num }} </h2>
{{ time() }}

comentario
{{--esto es un comentario--}} 

------------------------- <br>

<!--esto es un comentario de html-->

{{ isset ($name) ? $name : "no existe name "}}

------------------------- <br>

@if ($num > 0)
    El numero es positivo
@elseif($num<0)
    El mumero es negativo
@else
    El numero es 0
@endif

------------------------- <br>

@for($i=0;$i<10;$i++)
    El valor actual de i es {{$i}} <br>
@endfor

@while (true)
    sentencias
    
@endwhile

@include('view_name')


<?php
    echo $num;
    for($i=1;$i<=12;$i++){
        echo $num." * ".$i." = ".$num*$i." <br>";
    }
?>
</body>
</html>