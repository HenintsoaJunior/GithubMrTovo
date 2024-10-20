<!DOCTYPE html>
<html>
    <head>


        <!--<meta charset="UTF-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
        <title>ERP-Prospection</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- jQuery 2.1.4 -->
        <script src="<?= base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
        <link href="<?= base_url('assets/plugins/select2/select2.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- Bootstrap 3.3.4 -->
        <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/css/form.css')?>" rel="stylesheet" type="text/css" />

        <!-- FontAwesome 4.3.0 -->
        <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />-->
        <link href="<?= base_url('assets/dist/js/font-awesome-4.4.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="<?= base_url('assets/plugins/ionicons-2.0.1/css/ionicons.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url('assets/dist/css/AdminLTE.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link href="<?= base_url('assets/dist/css/skins/_all-skins.min.css')?>" rel="stylesheet" type="text/css" id="newskin"/>
        <!-- tabs -->
        <link href="<?= base_url('assets/dist/css/tabs.css')?>" rel="stylesheet" type="text/css" id="tabscss"/>
        <!-- iCheck -->
        <link href="<?= base_url('assets/plugins/iCheck/flat/blue.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <!--<link href="<?= base_url('assets/plugins/morris/morris.css')?>" rel="stylesheet" type="text/css" />-->
        <!-- jvectormap -->
        <!--<link href="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')?>" rel="stylesheet" type="text/css" />-->
        <!-- Date Picker -->
        <link href="<?= base_url('assets/plugins/datepicker/datepicker3.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?= base_url('assets/plugins/daterangepicker/daterangepicker-bs3.css')?>" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?= base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js')?> IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js')?> doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')?>"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')?>"></script>
        <![endif]-->
        <!-- fichier style a customiser !-->
        <link href="<?= base_url('assets/dist/css/stylecustom.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/dist/css/messagestyle.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/dist/css/jquery-ui.css')?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dist/css/skins/skin-yellow-light.css')?>" >
        <script src="<?= base_url('assets/plugins/select2/select2.full.min.js')?>"></script>
        <!-- -->
    </head>
    <body class="skin-yellow-light sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper" style="max-width:none !important;">

            <header class="main-header" style="position: fixed; left: 0; right: 0;">
                <!-- Logo -->
                <a style="background-color:#ffffff; height:50px;" href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini" style="color: #000;font-weight: 600;">Gallois</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <img style="width: 45px; height: 45px;" src="<?= base_url('assets/img/logo_sisal-rmbg.png')?>" />
                    </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav style="background:#ffffff; height: 10px;" class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" style="color:#000;" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs" style="color:#000;">Nom d'utilisateur</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="deconnexion.js')?>p" class="btn btn-default btn-flat">Déconnexion</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
<%-- 
            
            <aside class="main-sidebar">
                <section class="sidebar" style="height: auto;">
                    <ul class="sidebar-menu" id="menuslider">
                        <li class="header">Menu</li>

                        <div class="dropdown">
                            <li>
                                <a style="display: block; padding: 8px;" href="#" class="" onclick="window.location.href='#'">
                                <i style="margin-right: 3.6px;" class="fa fa-shopping-cart"></i> <!-- Updated icon to represent Vente -->
                                <span>Vente</span>

                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('venteform')?>" class=""><i class="fa fa-plus"></i>Faire une Vente</a></li>
                                    <li><a href="<?= base_url('liste_vente') ?>" class=""><i class="fa fa-table"></i>Liste Vente</a></li> <!-- Changed icon to fa-info-circle for Details -->
                                </ul>
                            </li>
                        </div>

                        <div class="dropdown">
                            <li>
                                <a style="display: block; padding: 8px; color:red" href="<?= base_url('logout') ?>">
                                    <i class="fa fa-sign-out" style="margin-right: 3.6px; color:red"></i>
                                    <span>Logout</span>
                                </a>


                            </li>
                        </div>
                    </ul>
                </section>
            </aside>



            <div class="modal fade" id="modalSendMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="message-chat-title"></h4>
                        </div>
                        <div class="modal-body clearfix">
                            <div class="message-chat-content clearfix" id="message-chat-content"></div>
                            <br/>
                            <form>
                                <textarea id="messagefrom" class="form-control" rows="3" placeholder="Votre message ici"></textarea>
                                <br/><br/>
                                <input type="button" class="btn btn-primary pull-right" style="margin-left: 5px;" value="Envoyer"/>
                                <input type="reset" class="btn btn-danger pull-right" value="Annuler"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalSendMessageTo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="min-height: 200px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <ul>
                               
                                <br/>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->renderSection('content2') ?>
            <footer class="main-footer">
    <strong>Copyright &copy; 2023 BICI</a>.</strong> Tous droits r&eacute;serv&eacute;s.
</footer>

<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<!-- jQuery 2.1.4 -->

<!--<script src="<?= base_url('assets//js/socket.io/socket.io.js')?>"></script>-->
<script src="<?= base_url('assets/js/moment.min.js')?>"></script>


<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/dist/js/jquery-ui.min.js')?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/bootstrap/js/jquery.dataTables.min.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/bootstrap/js/jquery.tablesorter.min.js')?>" type="text/javascript"></script>
<!-- Morris.js')?> charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')?>"></script>
<script src="<?= base_url('assets/plugins/morris/morris.min.js')?>" type="text/javascript"></script>-->
<!-- Sparkline -->
<!--<script src="<?= base_url('assets/plugins/sparkline/jquery.sparkline.min.js')?>" type="text/javascript"></script>-->
<!-- jvectormap -->
<!--<script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>" type="text/javascript"></script>-->
<!-- jQuery Knob Chart -->
<!--<script src="<?= base_url('assets/plugins/knob/jquery.knob.js')?>" type="text/javascript"></script>-->
<!-- daterangepicker -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js')?>/2.10.2/moment.min.js')?>" type="text/javascript"></script>-->
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js')?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/plugins/datepicker/bootstrap-datepicker.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js')?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<!--<script src="<?= base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>-->
<!-- Slimscroll -->
<script src="<?= base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/plugins/fastclick/fastclick.min.js')?>" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?= base_url('assets//js/Chart.min.js')?>" type="text/javascript"></script>
<%--<script src="<?= base_url('assets/plugins/chartjs/Chart.min.js')?>" type="text/javascript"></script>--%>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/app.min.js')?>" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?= base_url('assets/dist/js/pages/dashboard.js')?>" type="text/javascript"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?= base_url('assets/dist/js/pages/dashboard2.js')?>" type="text/javascript"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="<?= base_url('assets/dist/js/demo.js')?>" type="text/javascript"></script>-->
<!-- Parsley -->
<script src="<?= base_url('assets/plugins/parsley/src/i18n/fr.js')?>"></script>
<script src="<?= base_url('assets/plugins/parsley/dist/parsley.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/sparkline/jquery.sparkline.min.js')?>"></script>

<script type="text/javascript">
    window.ParsleyValidator.setLocale('fr');
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
//    $(".timepicker").timepicker({
//        showInputs: false
//    });

    $(window).bind("load", function () {
//        getMessageDeploiement();
//        window.setInterval(getMessageDeploiement, 30000);
    });

    function getMessageDeploiement() {
        var text = 'ok';
        $.ajax({
            type: 'GET',
            url: 'assets/MessageDeploiement',
            contentType: 'application/json',
            data: {'mes': text},
            success: function (ma) {
                if (ma != null) {
                    var data = JSON.parse(ma);
                    if (data.message != null) {
                        alert(data.message);
                    }
                    if (data.erreur != null) {
                        alert(data.erreur);
                    }
                }

            },
            error: function (e) {
                //alert("Erreur Ajax");
            }

        });
    }

    function pagePopUp(page, width, height) {
        w = 750;
        h = 600;
        t = "D&eacute;tails";

        if (width != null || width == "")
        {
            w = width;
        }
        if (height != null || height == "") {
            h = height;
        }
        window.open(page, t, "titulaireresizable=no,scrollbars=yes,location=no,width=" + w + ",height=" + h + ",top=0,left=0");
    }
    function searchKeyPress(e)
    {
        // look for window.event in case event isn't passed in
        e = e || window.event;
        if (e.keyCode == 13)
        {
            document.getElementById('btnListe').click();
            return false;
        }
        return true;
    }
    function back() {
        history.back();
    }
    function dependante(valeurFiltre,champDependant,nomTable,nomClasse,nomColoneFiltre,nomColvaleur,nomColAffiche)
    {
        console.out.println("NIDITRA TATO");
        document.getElementById(champDependant).length=0;
        var param = {'valeurFiltre':valeurFiltre,'nomTable':nomTable,'nomClasse':nomClasse,'nomColoneFiltre':nomColoneFiltre,'nomColvaleur':nomColvaleur,'nomColAffiche':nomColAffiche};
        var lesValeur=[new Option("-","",false,false)];  
        $.ajax({
            type:'GET',
            url:'/prospection/deroulante',
            contentType: 'application/json',
            data:param,
            success:function(ma){
                var data = JSON.parse(ma);   
                
                for(i in data.valeure)
                {
                    lesValeur.push(new Option(data.valeure[i].valeur, data.valeure[i].id, false, false));
                }
                addOptions(champDependant,lesValeur);
            },
            error:function(ma){
                console.log(ma);
            }
        });


    }
    function getChoix() {
        setTimeout("document.frmchx.submit()", 800);
    }
    $('#sigi').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": false
    });
    $(function () {
        $(".select2").select2();
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
    function CocheToutCheckbox(ref, name) {
        var form = ref;

        while (form.parentNode && form.nodeName.toLowerCase() != 'form') {
            form = form.parentNode;
        }

        var elements = form.getElementsByTagName('input');

        for (var i = 0; i < elements.length; i++) {
            if (elements[i].type == 'checkbox' && elements[i].name == name) {
                elements[i].checked = ref.checked;
            }
        }
    }
    function showNotification(message, classe, url) {
        $.notify({
            message: message,
            url: url
        }, {
            type: classe
        });
    }
    function add_line() {
        var indexMultiple = document.getElementById('indexMultiple').value;
        var nbrLigne = document.getElementById('nbrLigne').value;
        var html = genererLigneFromIndex(indexMultiple);
        $('#ajout_multiple_ligne').append(html);
        document.getElementById('indexMultiple').value = parseInt(indexMultiple) + 1;
        document.getElementById('nbrLigne').value = parseInt(nbrLigne) + 1;
    }
    function removeLineByIndex(iLigne) {
        var nomId = "ligne-multiple-" + iLigne;

        var ligne = document.getElementById(nomId);
        ligne.parentNode.removeChild(ligne);
        var nbrLigne = document.getElementById('nbrLigne').value;
        //document.getElementById('nbrLigne').value = nbrLigne - 1;
    }

    function getHtmlTabeauLigne() {
        var htmlComplet = $('#tableauLigne').html();
        document.getElementById('htmlComplet').value = htmlComplet;
        $('#declarationFormulaire').submit();


    }

    function changeInput(input) {
//        alert(input.id);
//        document.getElementById(input.id).value = ;
        $('#' + input.id).attr('value', input.value);
    }
    function dependante(valeurFiltre, champDependant, nomTable, nomClasse, nomColoneFiltre, nomColvaleur, nomColAffiche)
    {
        document.getElementById(champDependant).length = 0;
        var param = {'valeurFiltre': valeurFiltre, 'nomTable': nomTable, 'nomClasse': nomClasse, 'nomColoneFiltre': nomColoneFiltre, 'nomColvaleur': nomColvaleur, 'nomColAffiche': nomColAffiche};
        var lesValeur=[new Option("-","",false,false)];  
        $.ajax({
            type: 'GET',
            url: '/prospection/deroulante',
            contentType: 'application/json',
            data: param,
            success: function (ma) {
                var data = JSON.parse(ma);

                for (i in data.valeure)
                {
                    lesValeur.push(new Option(data.valeure[i].valeur, data.valeure[i].id, false, false));
                }
                addOptions(champDependant, lesValeur);
            }
        });


    }
    function addOptions(nomListe, lesopt)
    {
        var List = document.getElementById(nomListe);
        var elOption = lesopt;

        var i, n;
        n = elOption.length;

        for (i = 0; i < n; i++)
        {
            List.options.add(elOption[i]);
        }
    }
    function dependanteChamp(valeurFiltre, champDependant, nomTable, nomClasse, nomColoneFiltre, nomColvaleur, nomColAffiche, nomOrderby, sensOrderBy)
    {
        $('#' + champDependant + " option").remove();
        var param = {'valeurFiltre': valeurFiltre, 'nomTable': nomTable, 'nomClasse': nomClasse, 'nomColoneFiltre': nomColoneFiltre, 'nomColvaleur': nomColvaleur, 'nomColAffiche': nomColAffiche, 'nomOrderby': nomOrderby, 'sensOrderBy': sensOrderBy};
        var valeur = "";
        $.ajax({
            type: 'GET',
            url: '/spat/deroulante',
            contentType: 'application/json',
            data: param,
            success: function (ma) {
                var data = JSON.parse(ma);

                for (i in data.valeure)
                {
                    valeur += data.valeure[i].valeur;
                }
                console.log(valeur);
                addChamp(champDependant, valeur);
            }
        });


    }
    function addChamp(nomListe, valeur)
    {
        document.getElementById(nomListe).value = valeur;

    }
    function dependanteChampUneValeur(valeurFiltre, champDependant, nomTable, nomClasse, nomColoneFiltre, nomColvaleur, nomColAffiche, nomOrderby, sensOrderBy)
    {
        $('#' + champDependant + " option").remove();
        var param = {'valeurFiltre': valeurFiltre, 'nomTable': nomTable, 'nomClasse': nomClasse, 'nomColoneFiltre': nomColoneFiltre, 'nomColvaleur': nomColvaleur, 'nomColAffiche': nomColAffiche, 'nomOrderby': nomOrderby, 'sensOrderBy': sensOrderBy};
        var valeur = "";
        $.ajax({
            type: 'GET',
            url: '/spat/deroulante?estListe=false',
            contentType: 'application/json',
            data: param,
            success: function (ma) {
                var data = JSON.parse(ma);

                for (i in data.valeure)
                {
                    valeur += data.valeure[i].valeur;
                }
                addChamp(champDependant, valeur);
            }
        });


    }
</script>
<script src="<?= base_url('assets/js/script.js')?>" type="text/javascript"></script>

<script src="<?= base_url('assets/js/controleTj.js')?>" type="text/javascript"></script>

<script src="<?= base_url('assets/js/soundmanager2-jsmin.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/messagews.js')?>" type="text/javascript"></script>

<script type="text/javascript">
    if (typeof (Storage) !== "undefined") {
        // Code for localStorage/sessionStorage.
        var collapse = localStorage.getItem("menuCollapse");

    } else {
        // Sorry! No Web Storage support..
    }
    $(document).ready(function () {

        if (localStorage.getItem("menuCollapse") == "true") {
            $("body").addClass("sidebar-collapse");
        }

        $(".sidebar-toggle").click(function () {
            if (localStorage.getItem("menuCollapse") == "false" || localStorage.getItem("menuCollapse") == "") {
                localStorage.setItem("menuCollapse", "true");
            } else {
                localStorage.setItem("menuCollapse", "false");
            }
        });

        //TAB INDEX
        var tab = $("[tabindex]");
        for (var i = 0; i < tab.length; i++) {
            $(tab[i]).removeAttr("tabindex");
        }
        var nombre_form = $($("form")[1]).length;

        for (var f = 0; f < nombre_form; f++) {
            var id_index = 1;

            var new_elm = $($("form")[1])[f];

            for (var i = 0; i < new_elm.length; i++) {
                if ($(new_elm[i]).context.type === "hidden" || $(new_elm[i]).context.readOnly) {

                } else {
                    $(new_elm[i]).attr("tabindex", id_index);
                    id_index++;
                }

            }
        }

    });
		
		
		
		
		function fetchAutocomplete(request, response, affiche, valeur, colFiltre, nomTable, classe,useMocle,champRetour) {
		if (request.term.length >= 1) {
				$.ajax({
						url: "/station/autocomplete",
						method: "GET",
						contentType: "application/x-www-form-urlencoded",
						dataType: "json",
						data: {
								libelle: request.term,
								affiche: affiche,
								valeur: valeur,
								colFiltre: colFiltre,
								nomTable: nomTable,
								classe: classe,
								useMotcle:useMocle,
                                champRetour: champRetour
						},
						success: function(data) {
								response($.map(data.valeure, function(item) {
										return {
												label: item.valeur,
												value: item.id,
                                                retour: item.retour
										};
								}));
						}
				});
		}
		}


</script>
<script language="javascript">
    (function ($) {
        var title = ($('h1:first').text());
        if (title === '' || title == null)
            title = ($('h2:first').text());
        if (title === '' || title == null)
            title = 'ERP';
        document.title = title;
    }(jQuery));
</script>