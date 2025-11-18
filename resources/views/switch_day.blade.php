<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>{{ $heading }}</h1>


    @switch($number)

        @case(1)

            <div style="background-color: green; margin: 5px; padding: 5px;">
                <h2> This is start of the Week!</h2>
            </div>

            @break

        @case(2)

            <div style="background-color: lightgreen; margin: 5px; padding: 5px;">
                <h2> This is {{ $day }}!</h2>
            </div>

            @break
        
        @case(3)

            <div style="background-color: orange; margin: 5px; padding: 5px;">
                <h2> This is {{ $day }}!</h2>
            </div>

            @break
        @case(4)

            <div style="background-color: lightorange; margin: 5px; padding: 5px;">
                <h2> This is {{ $day }}!</h2>
            </div>

            @break
        @case(5)

            <div style="background-color: lemon; margin: 5px; padding: 5px;">
                <h2> This is {{ $day }}!</h2>
            </div>

            @break
        @case(6)

            <div style="background-color: lightblue; margin: 5px; padding: 5px;">
                <h2> This is {{ $day }}!</h2>
            </div>

            @break
        @case(7)

            <div style="background-color: yellow; margin: 5px; padding: 5px;">
                <h2> This is {{ $day }}!</h2>
            </div>

            @break



            @default 

                <div style="background-color: red; margin: 5px; padding: 5px;">
                <h2> Unknown Day!</h2>
            </div>



    @endswitch

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>