<aside class="main-sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" id="menu-ver">
            <li class="header">NAVIGATION PRINCIPALE</li>
            <li class="active treeview">
                <a href="<?=base_url('console')?>" data-page="#enregistrements-wrapper">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a data-page="#enregistrements-wrapper" href="<?=base_url('console/constructions')?>"><i class="fa fa-circle-o"></i> Construction</a></li>
                </ul>
            </li>

            <li>
                <a href="<?=base_url('console/parametrages')?>" data-page="#parametres-wrapper">
                    <i class="fa fa-th"></i> <span>Parametres</span>
                </a>
            </li>

            <!--li>
                <a href="pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li-->

        </ul>
    <!-- /.sidebar -->
</aside>

<script >


    $(function () {

        page = localStorage.getItem('page')

        if (page != ""){

            $(page).show().siblings('.content-wrapper').hide()
            $('#menu-ver').find('li').removeClass('active')

            link = $('#menu-ver a[data-page='+page+']')
            link.parent().addClass('active')
        }

/*
        $('#menu-ver a').click(function (event) {

            event.preventDefault()
            self = $(this)
            $('#menu-ver').find('li').removeClass('active')
            self.parent().addClass('active')
            content = self.attr('data-page')
            $(content).show().siblings('.content-wrapper').hide()

            if (Storage == undefined){
                alert("Utiliser une navigateur plus recent pour avoir toutes les fonctions de l'application")
            }else {
                localStorage.setItem('page', content)
            }
        })

*/

    })
</script>