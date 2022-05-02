$(function() {
    "use strict";
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
