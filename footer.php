

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
crossorigin="anonymous"></script>
<script src="<?= TEMPLATE_URI ?>/js/bootstrap.min.js" type="text/javascript"></script>

<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js'></script>
<script src='http://dbrekalo.github.io/simpleLightbox/dist/simpleLightbox.min.js'></script>

<script type="text/javascript">


        //$( '.gallery a' ).attr('href', 'http://127.0.0.1/wp-content/uploads/2018/03/sao-jose-logo_black-150x113.png');
        $( '.gallery' ).addClass('imageGallery1');
        $('.imageGallery1 a').simpleLightbox();

</script>

<script src="<?= TEMPLATE_URI ?>/js/multiple-select.js"></script>
<script src="<?= TEMPLATE_URI ?>/js/script.js"></script>

<script type="text/javascript">
var app = angular.module('ramais', []);
app.controller('ramaisCtrl', function ($scope, $http) {
    $scope.editar = function ($username, $telefone){
        angular.element('.'+$username+'_tr i').addClass('fa fa-spinner fa-spin');
        $http.get('/?action=ramais&username='+$username+'&telephonenumber='+$telefone).then(function(response){
            angular.element('.'+response.data.username+'_tr').addClass('alert alert-success animated flash');
            setTimeout(function() {
                angular.element('.'+response.data.username+'_tr').removeClass('alert alert-success animated flash');
                angular.element('.'+response.data.username+'_tr i').removeClass('fa fa-spinner fa-spin');
                angular.element('.'+$username+'_tr i').addClass('fa fa-edit');
            }, 1000);
            
        });
    }

    $scope.inputChange = function($span_id, $value){
            console.log($value);
            
            angular.element('#'+$span_id+'_span').text($value);

    }
});
</script>


<?php wp_footer() ?>
</body>
</html>