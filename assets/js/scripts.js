$(document).ready(function() {

    // Insert-form logic
    $('.insert-form-group select').on('change', (e) => {
        let currentTarget = e.currentTarget;

        $(currentTarget).parent().find('.insert-form input').val('');
        $(currentTarget).parent().find('.insert-block').addClass('hidden');
    });

    $('.insert-form-group .insert-button').on('click', (e) => {
        let currentTarget = e.currentTarget;

        $(currentTarget).parent().find('select').val(0);
        $(currentTarget).next().toggleClass("hidden");
        $(currentTarget).next().next().toggleClass("hidden");
    });

    $('.insert-form-group input').on('change blur', (e) => {
        let currentTarget = e.currentTarget;

        if($(currentTarget).val() != ''){
            $(currentTarget).parent().removeClass('has-error').addClass('has-success');
        }else{
            $(currentTarget).parent().removeClass('has-success').addClass('has-error');
        }
    });




    




















});