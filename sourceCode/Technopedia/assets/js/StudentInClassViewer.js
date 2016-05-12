/**
 * Created by hamdy on 3/24/16.
 *
 *
 * This file is responsible for the visualised functionality
 * about entering several students to several classes.
 *
 *
 */
var flag=0;
function formViewer(formName){

    if(document.getElementById(formName).style.display!='block')
        document.getElementById(formName).style.display='block';
    else{
        document.getElementById(formName).style.display='none';
        return;
    }
    if (formName=="StudInClass" && flag==0) {
        flag=1;
        jQuery(function ($) {
            var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
            var container1 = demo1.bootstrapDualListbox('getContainer');
            container1.find('.btn').addClass('btn-white btn-info btn-bold');

            $('.rating').raty({
                'cancel': true,
                'half': true,
                'starType': 'i'
            })

            $('.select2').css('width', '200px').select2({allowClear: true})
            $('#select2-multiple-style .btn').on('click', function (e) {
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if (which == 2) $('.select2').addClass('tag-input-style');
                else $('.select2').removeClass('tag-input-style');
            });

            $('.multiselect').multiselect({
                enableFiltering: true,
                buttonClass: 'btn btn-white btn-primary',
                templates: {
                    button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"></button>',
                    ul: '<ul class="multiselect-container dropdown-menu"></ul>',
                    filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
                    filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
                    li: '<li><a href="javascript:void(0);"><label></label></a></li>',
                    divider: '<li class="multiselect-item divider"></li>',
                    liGroup: '<li class="multiselect-item group"><label class="multiselect-group"></label></li>'
                }
            });

            var substringMatcher = function (strs) {
                return function findMatches(q, cb) {
                    var matches, substringRegex;

                    // an array that will be populated with substring matches
                    matches = [];

                    // regex used to determine if a string contains the substring `q`
                    substrRegex = new RegExp(q, 'i');

                    // iterate through the pool of strings and for any string that
                    // contains the substring `q`, add it to the `matches` array
                    $.each(strs, function (i, str) {
                        if (substrRegex.test(str)) {
                            // the typeahead jQuery plugin expects suggestions to a
                            // JavaScript object, refer to typeahead docs for more info
                            matches.push({value: str});
                        }
                    });

                    cb(matches);
                }
            }

            $('input.typeahead').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'states',
                displayKey: 'value',
                source: substringMatcher(ace.vars['US_STATES'])
            });

        });
    }
}

function formViewerSubmitButton(){

    var x = document.getElementsByClassName("multiselect dropdown-toggle btn btn-white btn-primary");

    var selectedStudents = document.getElementById("bootstrap-duallistbox-selected-list_duallistbox_demo1[]");
    var str="";
    // Classes are separated by ','
    for (j=0;j< x.length;j++){
        str+=x[j].title+",";
    }
    // before + are the classes and after it are the selected students
    str+="!";
    // Selected Students are separated by ','
    for (i=0;i<selectedStudents.options.length;i++){
        str=str+selectedStudents.options[i].text+",";
    }

    document.forms["StudInClass"].action = 'readMultipleRecords.php?class='+str;
    document.forms["StudInClass"].submit();

}
