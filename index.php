<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Formulário de usuário</title>
        <script src="js/jquery-3.6.1.min.js"></script>
        <script src="js/js.cookie.min.js"></script>
        <script src="js/jquery.mask.min.js"></script>

    </head>
    <body>
    <form action="register.php" method="post">
        <p>
            <label>NOME</label>
        <input type="text" id="nome" name="nome" require="true"/> 
        </p>
        <p>
        <label>EMAIL</label>
        <input type="text" id="email" name="email" require="true"/> 
        </p>
        <p>
        <label>TELEFONE</label>
        <input type="text" id="telefone" require="true"/> 
        </p>
        <p>
        <label>CEP</label>
        <input type="text" id="cep" class="endereco" require="true"/> 
        </p>
        <p>
        <label>ENDEREÇO</label>
        <input type="text" id="endereco" class="endereco"  require="true"/> 
        </p>
        <p>
        <label>NUMERO</label>
        <input type="text" id="numero" class="endereco"  class="endereco"  require="true"/> 
        </p>
        <p>
        <label>BAIROO</label>
        <input type="text" id="bairro" class="endereco"  require="true"/> 
        </p>
        <p>
        <label>CIDADE</label>
        <input type="text" id="cidade" class="endereco"  require="true" /> 
        </p>
        <p>
        <label>UF</label>
        <input type="text" id="uf" class="endereco"  require="true"> 
        </p>
        <button type="submit" name="register" class="btn">Registrar</button>
        </form>

    </body>
</html>

<script src="js/index.js"></script>