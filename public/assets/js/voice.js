$(function() {
    "use strict";

    $(document).find("#add-mp3").on("click", addMp3);
    $('body').on("click", "button.remove-mp3", removeMp3);
});

function removeVoice(e) {
    e.preventDefault();

    let self   = $(e.target),
        formId = self.data('form-id');

    if (self.hasClass('bx-trash')) {
        formId = self.parent('a').data('form-id');
    }

    if (confirm('Are you sure ?') && formId) {
        $(document).find("#" + formId).submit();
    }

    return false;
}

function addMp3() {
    let buttonPlus = $(this),
        rowMp3     = $(document).find("#row-mp3"),
        fixedMp3   = $(document).find("#fixed-mp3"),
        clonedMp3  = fixedMp3.clone();

    clonedMp3.find("input:text").val("").end();
    clonedMp3.removeAttr('id').end();
    clonedMp3.addClass("fixed-mp3").end();
    clonedMp3.find('button#add-mp3').empty().end();
    clonedMp3.find('button#add-mp3').html("&minus;").end();
    clonedMp3.find('button#add-mp3').addClass("remove-mp3").end();
    clonedMp3.find('button#add-mp3').removeAttr("id").end();

    rowMp3.append(clonedMp3);
}

function removeMp3() {
    let buttonMinus = $(this);

    buttonMinus.parents(".fixed-mp3").remove();
}
