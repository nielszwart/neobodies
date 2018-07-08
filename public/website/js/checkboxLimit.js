function checkboxlimit(checkGroup, limit){
    for (var i = 0; i < checkGroup.length; i++){
        checkGroup[i].onclick = function() {
            var checkedCount = 0;
            for (var i = 0; i < checkGroup.length; i++) {
                checkedCount += (checkGroup[i].checked) ? 1 : 0;
            }
                
            if (checkedCount > limit) {
                this.checked = false;
            }
        }
    }
}

var form = document.forms.genblueprint;
var fields = form.getElementsByClassName('form-field');
for (var i = 0; i < fields.length; i++){
    var field = fields[i];
    var checkboxes = field.querySelectorAll('input[type="checkbox"]');
    var questionName = checkboxes[1].name;

    checkboxlimit(document.forms.genblueprint[questionName], 2);
}