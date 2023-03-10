<html lang="fr">
    <head>
        <title>PHP Test</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css" integrity="sha512-p4vIrJ1mDmOVghNMM4YsWxm0ELMJ/T0IkdEvrkNHIcgFsSzDi/fV7YxzTzb3mnMvFPawuIyIrHcpxClauEfpQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .card{
                border : none;
                box-shadow : 0 0.5rem 1rem rgb(0 0 0 / 15%);
            }
            .card-body{
                flex: 1 1 auto;
                padding: 2rem 2rem;
            }
            .titrePages{
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .row {
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 0;
                display: flex;
                flex-wrap: wrap;
                margin-top: calc(-1 * var(--bs-gutter-y));
                margin-right: calc(-.5 * var(--bs-gutter-x));
                margin-left: calc(-.5 * var(--bs-gutter-x));
            }
            #div_form_dates{
                display: grid;
                grid-template-columns: 25% 25% 25% 25%;
            }
            #div_bouton{
                grid-column: span 4;
                margin-top : 50px;
                text-align: center;
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script>

            function envoye_par_php(){

                $(function () {
                    //  ***  MISE EN FRAN9AIS DU DatePicker  *** ///
                    (function ($) {
                        $.fn.datepicker.dates['fr'] = {
                            days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
                            daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
                            daysMin: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
                            months: ["Janvier", "F??vrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Ao??t", "Septembre", "Octobre", "Novembre", "D??cembre"],
                            monthsShort: ["Janv.", "F??vr.", "Mars", "Avril", "Mai", "Juin", "Juil.", "Ao??t", "Sept.", "Oct.", "Nov.", "D??c."],
                            today: "Aujourd'hui",
                            monthsTitle: "Mois",
                            clear: "Effacer",
                            weekStart: 1,
                            format: "dd/mm/yyyy"
                        };
                    }(jQuery));

                    // *** DATE DEBUT *** //
                    $("#jeu_general_dateDebut").datepicker({
                        language: 'fr',
                        startDate: new Date(),
                        format: 'dd/mm/yyyy',
                        autoclose: true,
                        todayHighlight: true
                    }).on('changeDate', function (selected) {
                        let minDate = new Date(selected.date.valueOf());
                        let someDate = new Date(selected.date.valueOf());
                        let numberOfDaysToAdd = 30;
                        someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
                        let dd = someDate.getDate();
                        let mm = someDate.getMonth() + 1;
                        let y = someDate.getFullYear();
                        let someFormattedDate = +dd + '/' + mm + '/' + y;

                        let dateTo = $('#jeu_general_dateFin');

                        dateTo.datepicker('setStartDate', minDate);
                        dateTo.datepicker('setEndDate', someFormattedDate);
                    });

                    // *** DATE FIN *** //
                    $("#jeu_general_dateFin").datepicker({
                        language: 'fr',
                        startDate: new Date(Date.now() + (3600 * 1000 * 24)),
                        format: 'dd/mm/yyyy',
                        autoclose: true,
                        todayHighlight: true
                    }).on('changeDate', function (selected) {
                        let  maxDate = new Date(selected.date.valueOf());
                        let someDate = new Date(selected.date.valueOf());
                        let numberOfDaysToAdd = 30;
                        someDate.setDate(someDate.getDate() - numberOfDaysToAdd);
                        let dd = someDate.getDate();
                        let mm = someDate.getMonth() + 1;
                        let y = someDate.getFullYear();
                        let someFormattedDate = dd + '/' + mm + '/' + y;

                        let dateFrom = $('#jeu_general_dateDebut');
                        dateFrom.datepicker('setStartDate', someFormattedDate);
                        dateFrom.datepicker('setEndDate', maxDate);
                    });
                });
            }
        </script>
    </head>

    <body>

        <div class="card mb-4 w-100">
            <div class="titrePages">
                <h4 class="card-heading text-center">R??servation de cr??neaux</h4>
            </div>

            <form id="form" name="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <div class="input-group mb-3  datepicker-range">

                                <div id="div_form_dates" class="input-group mb-3 datepicker-range">

                                    <!-- ---------------------   DATE DEBUT   ---------------------  -->
                                    <label class="form-label required" for="jeu_general_dateDebut">Dates du calendrier : </label>
                                    <input type="text" id="jeu_general_dateDebut" name="jeu_general_dateDebut" required="required" format="dd-MM-yyyy" class="form-control datepicker-input w-100" value="12/01/2023">

                                    <!-- ---------------------   DATE FIN    ---------------------  -->
                                    <label class="form-label text-center required" for="jeu_general_dateFin"> ?? </label>
                                    <input type="text" id="jeu_general_dateFin" name="jeu_general_dateFin" required="required" format="dd-MM-yyyy" class="form-control datepicker-input w-100" value="25/01/2023">

                                    <div id="div_bouton">
                                        <button id="bouton_submit" name="bouton_submit" type="submit" >Valider</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php

        if(isset($_POST["bouton_submit"])) {
            $dateDebut = $_POST["jeu_general_dateDebut"]  ;
            $dateFin = $_POST["jeu_general_dateFin"]  ;

            echo '<div class="card-body">'.
                     '<div class="row">';

                        if(isset($formHasErrors)){
                          echo   '<div id="idFormHasErrors" class="col-12"><h1 type="alert">{{ formHasErrors }}</h1></div>';
                        }
                    /*     {% if  formHasErrors %}*/
                      /*   {% endif %}*/

                          /***************************************   DIV Informations ***********************************/

                         echo '<div id="divIndicationCreationDates" class="col-12 {% if memeMois %}col-md-5{% endif %} ">'.
                             '<div id="divIndicationCreationDatesdiv1" class="col-12 ">'.
                                 '<h4>Indications :</h4>'.
                                 '<ul>'.
                                     '<li>Pour s??lectionner un unique jour : Double-clique sur une date</li>'.
                                     '<li>Pour s??lectionner plusieurs dates : S??lectionner la date de d??but puis la date de fin</li>'.
                                 '</ul>'.
                             '</div>'.
                             '<div id="divIndicationCreationDatesdiv2" class="col-12 ">'.
                                 '<ul>'.
                                     '<li>'.
                                         '<div id="span1IndicationCouleur"></div>'.
                                        '1 Cr??neau sur la journ??e'.
                                    '</li>'.
                                     '<li>'.
                                         '<div id="span2IndicationCouleur"></div>'.
                                        '2 Cr??neaux sur la journ??e'.
                                    '</li>'.
                                    ' <li>'.
                                         '<div id="span3IndicationCouleur"></div>'.
                                        '3 Cr??neaux ou plus'.
                                    '</li>'.
                                 '</ul>'.
                             '</div>'.
                         '</div>'.

                              /* **************************************   RAJOUT CALENDRIER ************************************/

                        ' <div id="divCalendrierCreationDates" class="col-12 {% if memeMois %}col-md-7{% endif %} row">'.   // TODO RETIRER TWIG
                            /* SCRIPT CALENDAR (JS) */
                         '</div>'.

                             /* **************************************    RAJOUT TIMES     *********************************** */
                       /*  {{ form_start(formCreationDa, {'attr': {'id': 'idFormCreationDates'}}) }}*/


                         '<form name="date_jeu" method="post" id="idFormCreationDates" enctype="multipart/form-data">'.

                             '<div id="timesPickers1-2CreationDates" style="display: grid; grid-template-columns: 25% 25% 25% 25%;" class="card row w-100 p-4 mt-2 mb-2">'.
                                 '<div id="idDivDepart" class="">'.
                                     '<h4>Heure de d??part :</h4><span id="spanJourPourHeureDepart"></span>'.
                                 '</div>'.
                                 '<div id="timePicker1CreationDates"  class="">'.
                                     '<div class="time-picker">'.
                                        ' <label for="idInputTimePickerDateDebut"></label><input type="time" name="idInputTimePickerDateDebut" id="idInputTimePickerDateDebut" min="" max="" required>'.
                                         '<span id="idSpanTimePickerDateDebut" class="spanMinMaxTime classHide"></span>'.
                                     '</div>'.
                                 '</div>'.
                                 '<div id="idDivFin"  class="">'.
                                     '<h4>Heure de fin :</h4><span id="spanJourPourHeureFin"></span>'.
                                 '</div>'.
                                 '<div id="timePicker2CreationDates"  class="">'.
                                     '<div class="time-picker2">'.
                                         '<label for="idInputTimePickerDateFin"></label><input type="time" name="idInputTimePickerDateFin" id="idInputTimePickerDateFin" min="" max="" required>'.
                                         '<span id="idSpanTimePickerDateFin" class="spanMinMaxTime classHide"></span>'.
                                     '</div>'.
                                 '</div>'.
                             '</div>'.

                                /* **************************************        FORMULAIRE      *********************************** */

                            /* {{ form_errors(formCreationDa) }} */

                             '<div style=" display: none;  position:relative;">'.       // TODO RAJOUTER FORMULAIRE

                                 '<label for="date_jeu_dateDebut" class="required">Cr??neau de diffusion du : </label>'.
                                 '<input type="text" id="idInputDateDebut" name="date_jeu[dateDebut]" required="required" class="form-control col-3" pattern="^[0-9-: |A-Z-: ]*$" invalid_message="Veuillez ajouter une date valide.">'.

                                 '<label id="" for="date_jeu_dateFin" class="required">au : </label>'.
                                 '<input type="text" id="idInputDateFin" name="date_jeu[dateFin]" required="required" class="form-control" pattern="^[0-9-: |A-Z-: ]*$">'.


                               /* <div style="  position:relative;"> */
                                /* {{ form_label(formCreationDa.dateDebut) }}*/
                                /* {{ form_widget(formCreationDa.dateDebut, {'id' : 'idInputDateDebut', 'attr' : { 'required' : true} } ) }}*/

                               /*  {{ form_label(formCreationDa.dateFin) }}*/
                                /* {{ form_widget(formCreationDa.dateFin, {'id' : 'idInputDateFin', 'attr' : { 'required' : true } }) }}*/
                             '</div>'.


                                 /* **************************************        BOUTONS      *********************************** */

                             '<div id="divBoutonsCreationDates" class="w-100 text-center mt-4">'.
                                 '<button form="idFormCreationDates" type="submit" id="submit" class="suivant classButtonStandard" name="submit">Valider</button>'.
                                 '<button form="idFormCreationDates"  type="reset" id="reset" class="classButtonStandard" name="reset" onClick="window.history.back();">Retour</button>'.
                             '</div>'.



                         '</form>'.
                    '</div>'.


                      /***************************************   POP-UP selection CR??NEAU  ************************************/

                    '<div id="modalOne" class="modal" >'.
                        '<div class="modal-content">'.
                            '<div class="contact-form">'.
                                '<a class="close">&times;</a>'.
                                '<h5>S??lectionner le cr??neau :</h5>'.
                                '<div>'.
                                    '<div id="divSelectionCreneauDotation" class="classDivSelectionCreneauDotation">'.
                                        '<ul>'.
                                            '<div  id="idLi23Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi23" data-modal="23">23</li>'.
                                                '<hr id="idLi23Hr" style="">'.
                                            '</div>'.
                                            '<div  id="idLi22Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi22" data-modal="22">22</li>'.
                                                '<hr id="idLi22Hr" style="">'.
                                            '</div>'.
                                            '<div  id="idLi21Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi21" data-modal="21">21</li>'.
                                                '<hr id="idLi21Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi20Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi20" data-modal="20">20</li>'.
                                                '<hr id="idLi20Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi19Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi19" data-modal="19">19</li>'.
                                                '<hr id="idLi19Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi18Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi18" data-modal="18">18</li>'.
                                                '<hr id="idLi18Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi17Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi17" data-modal="17">17</li>'.
                                                '<hr id="idLi17Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi16Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi16" data-modal="16">16</li>'.
                                                '<hr id="idLi16Hr" style="">'.
                                            '</div>'.
                                            '<div  id="idLi15Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi15" data-modal="15">15</li>'.
                                                '<hr id="idLi15Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi14Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi14" data-modal="14">14</li>'.
                                                '<hr id="idLi14Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi13Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi13" data-modal="13">13</li>'.
                                                '<hr id="idLi13Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi12Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi12" data-modal="12">12</li>'.
                                                '<hr id="idLi12Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi11Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi11" data-modal="11">11</li>'.
                                                '<hr id="idLi11Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi10Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi10" data-modal="10">10</li>'.
                                                '<hr id="idLi10Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi9Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi9" data-modal="9">9</li>'.
                                                '<hr id="idLi9Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi8Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi8" data-modal="8">8</li>'.
                                                '<hr id="idLi8Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi7Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi7" data-modal="7">7</li>'.
                                                '<hr id="idLi7Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi6Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi6" data-modal="6">6</li>'.
                                                '<hr id="idLi6Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi5Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi5" data-modal="5">5</li>'.
                                                '<hr id="idLi5Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi4Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi4" data-modal="4">4</li>'.
                                                '<hr id="idLi4Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi3Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi3" data-modal="3">3</li>'.
                                                '<hr id="idLi3Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi2Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi2" data-modal="2">2</li>'.
                                                '<hr id="idLi2Hr" style="">'.
                                            '</div>'.
                                            '<div id="idLi1Div" class="classLiTime" onclick="" data-info="">'.
                                                '<li id="idLi1" data-modal="1">1</li>'.
                                                '<hr id="idLi1Hr" style="">'.
                                            '</div>'.
                                        '</ul>'.
                                    '</div>'.
                                '</div>'.
                            '</div>'.
                        '</div>'.
                    '</div>'.
                        /***************************************   POP-UP selection CR??NEAU  ************************************/
                '</div>'.


               '<script>'.
                             'envoye_par_php()'.
               '</script>';

            /*            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }*/
        }
        ?>
    </body>

    <footer>


    </footer>
</html>

