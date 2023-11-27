                <div class="col-xs-12 menus w3-bottombar w3-border-green">
                    <div id="navbar-header" class="navbar-collapse  div-center collapse w3-padding-hor-4" >
                        <ul class="nav nav-tabs navbar-right" >
                            <li class="active"><a ui-sref="Accueil"><span>Accueil</span></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><span>Compétition</span> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li ng-repeat="comp in menus.competitions"><a href="#/competitions/{{comp}}"><span ng-bind="comp"></span></a></li>
                                    <!--
                                    <li><a href="#/competitions/nationale"><span>Nationales</span></a></li>
                                    <li><a href="#/competitions/internationale"><span>Internationales</span></a></li>
                                    -->
                                </ul>
                            </li>
                            <li class="dropdown" >
                                <a class="dropdown-toggle" ui-sref="Clubs" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"  ui-sref="Documents"><span>Clubs</span><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li ng-repeat="div in menus.divisions"><a href="#/clubs/division/{{div.id}}"><span ng-bind="div.libelle_type"></span></a></li>
                                    <!--
                                    <li><a href="">Elite 1 ou Senior</a></li>
                                    <li><a href="">Elite 2 ou Espoir </a></li>
                                    <li><a href="">Ecoles De Rugby</a></li>
                                    <li><a href="">Centres de Formation</a></li>
                                    <li><a href="">Universitaire</a></li>
                                    -->
                                </ul>
                            </li>
                            <li class="dropdown" >
                                <a class="dropdown-toggle" ui-sref="Dirigeants" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"  ui-sref="Dirigeants"><span>Dirigéants</span><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown " >
                                        <li ng-repeat="dep in menus.departements"><a href="#/dirigeants/{{dep.nom_dep | lowercase}}">Departement <span ng-bind="dep.nom_dep"></span></a></li>
                                        <!--
                                        <li>
                                            <a  ui-sref="Documents">STAFF ADMINISTRATIF</a>
                                        </li>
                                        <li><a href="">STAFF  TECHNIQUE</a></li>
                                        -->
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown" >
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"  ui-sref="Documents"><span>Documentations</span><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">LE BULLETIN D'INFORMATION</a></li>
                                    <li><a href="">DOCUMENTS ADMINISTRATIFS</a></li>
                                    <li><a href="">DOCUMENTS TECHNIQUES</a></li>
                                </ul>
                            </li>
                            <li >
                                <a href="" ui-sref="Publications"><span>Publications</span></a>
                            </li>
                            <li >
                                <a href="" ui-sref="Boutique"><span>Boutique</span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 banderouge"></div><div class="col-md-6" style="background: #029018; height: 5px"></div>
                    <div class="col-md-8 bandejaune"></div>
                </div>