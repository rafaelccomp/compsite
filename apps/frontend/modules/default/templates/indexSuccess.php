<script type="text/javascript">

    $(document).ready(function() {
        $('#animacao').hide();
        $("#mostrar").click(function() {
            $('#animacao').show('slow');
        });
        $("#esconder").click(function() {
            $('#animacao').hide('slow');
        });
    });
    </script>
    </head>
    <body>
    <div id="animacao" style="background:#666;width:400px;height:200px;">
        <h1 style="color:#FFF;">AprendaWEB</h1>
    </div>
    <input type="button" id="mostrar" value="Mostrar" />
    <input type="button" id="esconder" value="Esconder" />
