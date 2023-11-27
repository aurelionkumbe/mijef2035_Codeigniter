<script src="<?= base_url('js/bootstrap.min.js')?>"></script>
<script src="<?= base_url('js/fastclick.min.js')?>"></script>
<script src="<?= base_url('js/app.min.js')?>"></script>
<script src="<?= base_url('js/jquery.slimscroll.min.js')?>"></script>
<script src="<?= base_url('js/datatables.min.js')?>"></script>
<script src="<?= base_url('js/tablesort.min.js')?>"></script>
<script src="<?= base_url('js/select2.min.js')?>"></script>
<script src="<?= base_url('js/notify.js')?>"></script>
<script src="<?= base_url('js/jConfirm-v2.min.js')?>"></script>

<script type="application/javascript">
    $(function () {

        $('#Type').change(function (event ) {
            $form = $('#immobilier-form');
            $group = $form.find('.form-group')
            $group2 = $form.find('.form-group.whenterrain')
            self = $(this)
            //optionselected = self.find('option[selected=""]')
            if ($('#Type').val() == 2){
                $group.hide()
                $group2.show()
            }else {
                $group.show()
            }
        })

        $('body').on('click', '.delete', function(e) {

            e.preventDefault();

            $(this).jConfirm({
                message: 'Etes vous sure ?',
                confirm: 'Oui',
                cancel: 'Non !',
                openNow: this,
                callback: deleteContent
            });
        });


        $("[data-toggle=select2]").select2()
        //$("[data-toggle=table2]").dataTable()
        $("table").dataTable()

    })
    function deleteContent(elem) {

        let tr = elem.parents('tr')
        let route = elem.attr('href')
        location.href = route
        /*
        axios.delete(route)
            .then(function(response) {

                // on retirer l'element de tableau
                tr.slideUp().remove()
            });
            */
    }
</script>

<script src="<?= base_url('js/dashboard2.js')?>"></script>


<!--script src="<?= base_url('js/main.js')?>"></script-->