<script>
    @if(Session::has('notify'))
        $(document).ready(function() {
            bootbox.alert({
                title: 'Registro completado',
                message: '<h4>¡Gracias por comunicarte con nosotros!</h4>' +
                    'La información solicitada a sido enviada a su correo.\n' +
                'En caso de no encontrar el email revisar su bandeja de correo no deseado o spam y no olvides agregarnos a tu lista de contactos.'
            });
        });
    @php
        Session::forget('notify');
    @endphp
    @endif
</script>
