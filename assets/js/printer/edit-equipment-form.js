// if we are in the edit equipment form
if (
        $('body').attr('class') == 'printerForm' &&
        $('#postType').val() == 'edit'
    ) 
{
    var equipment = $('#equipment').text();
    equipment = JSON.parse(equipment);
    $('[name=username]').val(equipment.identification_number);
    $('[name=type]').val($('#typeId').text());
    $('[name=brand]').val($('#brandId').text());
    $('[name=model]').val(equipment.model_id);
    $('[name=situation]').val(equipment.situation);
    $('[name=place]').val(equipment.place_id);
    $('[name=floor]').val(equipment.floor_id);
    $('[name=department]').val(equipment.department_id);
}

// if we are in the equipment form
if (
    $('body').attr('class') == 'printerForm'
) {
    // the save equipment button must be hiddent untill we have an matriule username and a situation
    if ($('input[name="username"]').val() != '' && $('input[name="situation"]').val() != '') {
        $('button[name="register"]').show();
    }else{
        $('button[name="register"]').hide();
    }
    $('input[name="username"]').on('change', function(e){
        if (e.target.value != '' && $('input[name="situation"]').val() != '') {
            $('button[name="register"]').show();
        }else{
            $('button[name="register"]').hide();
        }
    });
    $('input[name="situation"]').on('change', function(e){
        if (e.target.value != '' && $('input[name="username"]').val() != '') {
            $('button[name="register"]').show();
        }else{
            $('button[name="register"]').hide();
        }
    });
    // AUTOCOMPLETION
    $( function() {
        var tagsFromBdd = $('#tagsFromBdd').text();
        var tagsFromBdd = JSON.parse(tagsFromBdd);
        var availableTags = [];
        var delimiter = ' ';
        tagsFromBdd.forEach(element => {
            availableTags.push(element.Ref_ID + delimiter + element.Type + delimiter + element.Marque + delimiter + element.Reference);
        });
        $( "#tags" ).autocomplete({
          source: availableTags
        });
        var val;
        $('#tags').on('change', function (e) {
            val = this.value;
            val = val.split(delimiter);
            if (val.length == 1){ // if we don't select any line from the autocomplet list we keep the select list value
                var selectVal = $('[name=model]').val();
                var optionVal = $('[name=model] [value=' + selectVal + ']').text().trim();
                this.value = optionVal;
                return;  
            } 
            this.value = val[3];
            $('[name=model]').val(val[0]);
        });
        $('#tags').val();
    });
}