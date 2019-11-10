<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <script src="../../../resources/js/jquery.slimscroll.min.js"></script>
   
    <script type="text/javascript" src="../../../resources/js/move-top.js"></script>
    <script type="text/javascript" src="../../../resources/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {


            $().UItoTop({easingType: 'easeOutQuart'});

        });
    </script>
    <script src="../../../resources/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../../../resources/js/scripts.js" type="text/javascript" ></script>
    <script src="../../../resources/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="../../../resources/dist/additional-methods.js" type="text/javascript"></script>
    <script src="../../../resources/js/bootstrap.min.js" type="text/javascript"></script>


    <script>
            $().ready(function () {

                $("#formulario").validate({
                    rules: {
                        tipo: {
                            required: true,

                        },

                        nombreusu: {
                            required: true,
                            lettersonly: false,
                            minlength: 3,
                            maxlength: 12,

                        },
                        apellidousu: {
                            required: true,
                            lettersonly: false,
                            minlength: 3,
                            maxlength: 12,

                        },

                        numerodoc: {
                            required: true,
                            lettersonly: false,
                            maxlength: 13,
                            minlength: 8,
                        },

                        nacim: {
                            required: true,
                            lettersonly: false,
                            maxlength: 7,
                        },

                        lugnac: {
                            required: true,
                            lettersonly: true,
                            maxlength: 12
                        },

                        correo: {

                            required: true,
                            email: true,
                            lettersonly: true,

                        },
                        tel: {
                            required: true,
                            number: true,
                            maxlength: 7

                        },
                        cel: {

                            required: true,
                            number: true,
                            maxlength: 10,
                        },

                        rol: {
                            required: true,

                        },

                    },
                    messages: {

                        nombreusu: {
                            lettersonly: "dato no valido",
                            required: "Ingrese Nombre",
                            number: "dato no valido",
                            minlength: "Demaciado Corto",
                            maxlength: "Demaciado Largo"

                        },

                        apellidousu: {
                            required: "Ingrese Apellido",
                            lettersonly: "Dato no valido",
                            minlength: "Demaciado Corto",
                            maxlength: "demaciado largo",
                        },

                        numerodoc: {
                            required: "Ingrese Numero Documento",
                            lettersonly: "Dato no valido",
                            maxlength: "Demaciado Largo",
                            minlength: "Demaciado Corto",
                        },

                        nacim: {
                            required: "Ingrese Fecha",
                            lettersonly: "Dato no valido",
                            maxlength: "Demaciado Largo",
                        },

                        lugnac: {
                            required: "Ingrese Lugar",
                            lettersonly: "dato no valido",
                            maxlength: "Demaciado Largo",
                        },

                        correo: {
                            required: "Ingrese E-mail",
                            email: "Formato invalido",

                        },

                        tel: {
                            required: "Ingrese Fijo",
                            number: "solo numeros",
                            maxlength: "Maximo 7 digitos",
                            lettersonly: "Dato no valido",

                        },
                        cel: {
                            required: "Ingrese celular",
                            number: "solo numeros",
                            maxlength: "maximo 10 digitos"

                        },
                        correo: {
                            required: "es necesario que ingrese el correo electronico",
                            email: "debe ingresar su correo correctamente",

                        },

                    }
                });
            });

    </script>
</html>
