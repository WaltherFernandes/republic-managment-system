<?php
    $page_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $path = parse_url($page_url, PHP_URL_PATH); 
?>

        <footer class="footer text-center" >
            <div class="container">
            <ul class="list-inline mb-5">
                <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/walther.fernandes.5/ ">
                    <i class="icon-social-facebook"></i>
                </a>
                </li>
                <li class="list-inline-item">
                <a class="social-link rounded-circle text-white" href="https://github.com/WaltherFernandes">
                    <i class="icon-social-github"></i>
                </a>
                </li>
            </ul>
            <p class="text-muted small mb-0">Copyright &copy; Devxyz Republicas 2020</p>
            </div>
        </footer>
        

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="col-md-12 fixed-bottom expira-em">
            <p style="color: white;
                    font-weight: bold;
                    font-size:1rem;
                    -webkit-text-stroke-width: 0.8px;
                    -webkit-text-stroke-color: #000;
                    float: left;">
                Expira em:
            </p>
            <p style="color: white;
                    font-weight: bold;
                    font-size:1rem;
                    -webkit-text-stroke-width: 0.8px;
                    -webkit-text-stroke-color: #000;
                    float: left;
                    margin-left: 0.6rem;"
                id="contadorSessao">
                00:00
            </p>
            <p style="color: white;
                    font-weight: bold;
                    font-size:1rem;
                    -webkit-text-stroke-width: 0.8px;
                    -webkit-text-stroke-color: #000;
                    margin-left: 0.2rem;
                    float: left;">
                minutos
            </p>
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
        <script src="../js/validateChangePass.js"></script>
        <script src="../js/contadorPlugin.js"></script>
        <script src="../js/Chart-2.9.1.js"></script>
        <?php if(strpos($path, "moradorForm")){echo "<script src='../js/validateFormulario.js'></script>";}?>
        <?php if(strpos($path, "tipoContaForm")){echo "<script src='../js/validateTipo.js'></script>";}?>
        <?php if(strpos($path, "contaForm")){echo "<script src='../js/validateConta.js'></script>";}?>

    </body>

</html>