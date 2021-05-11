<html>
<head>
    <meta charset="UTF-8">
    <title>PHP and jQuery Percentage</title>
       
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Estilo e JS personalizados -->
    <link rel="stylesheet" href="./assets/css/style.css" >
    <script src="./assets/js/script.js"></script>
</head>
<body>
<section id="cover" class="min-vh-100">
    
    <div class="container-fluid">
        <div class="row">
            <div class="form col-12">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <div class="px-2">
                            <form method="POST" autocomplete="off"> 
                                <h3>Calculadora</h3> <br />
                                <div class="form-group">
                                    <label  for="n1" > Número: 
                                        <input type="text"  class="form-control" name="n1" id="n1"/>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label  for="n2" > Porcentagem:
                                        <input type="text"  class="form-control" name="n2" id="n2"/>
                                    </label>    
                                </div>
                                <button id="sendButton" type="submit" class="btn btn-success">Calcular</button>
                                <button id="clearButton" type="reset" class="btn btn-danger">Limpar</button>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-0" id="resultado" style="display:none" >
                <div class="text-center">
                    <h3>Tabela Resultado</h3>
                </div>
                <table class='table'>
                    <thead>
                        <th>Operação</th>
                        <th>Resultado</th>
                    </thead>
                    <tbody id="tabela">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>  
</body>