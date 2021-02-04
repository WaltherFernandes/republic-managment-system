    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Login</h2>
                    <form action="plugins/logar" method="POST">
                        <div class="input-group-1">
                            <input class="input--style-3" type="text" placeholder="Email" name="emailLog">
                        </div>
                        <div class="input-group-2">
                            <input class="input--style-3 js-datepicker" type="password" placeholder="Senha" name="senhaLog">
                        </div>  
                        <a href="" data-toggle="modal" data-target="#recuperarSenha" data-whatever="@mdo" style="text-decoration: none;"><p>Esqueci a senha</p></a>
                        <div class="form-group form-check">
                            <input type="checkbox" name="manter" id="manter" class="form-check-input" value="1" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1" style="color: white;">Manter conectado</label>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Logar</button>
                        </div>
                        <?=$_SESSION['msg']?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="recuperarSenha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Recuperar senha</h2>
                </div>
                <div class="modal-body">
                    <p> 
                        Caso tenha esquecido sua senha e deseje recuperá-la, digite aqui seu email. Caso o e-mail informado esteja cadastrado em nosso sistema, você receberá
                        uma senha no e-mail que poderá ser modificada dentro do seu próprio usuário.
                    </p>
                    <form action="./plugins/recuperarEmail" id="formFP" name="formFP" method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Digite aqui seu e-mail">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <a href='javascript:formFP.submit()' class="btn btn-primary">Enviar</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/jquery.mask.js"></script>	
        <script src="../js/jquery.validate.js"></script>
        <script src="../js/devrep.js"></script>
        <script src="../js/previewImage.js"></script>
        <script src="../js/callModal.js"></script>
        <script src="../js/takeModalConta.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="../js/datatable.js"></script>
        <script src="../js/funcoes.js"></script>

    </body>

</html>