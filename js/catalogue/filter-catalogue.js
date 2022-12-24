window.addEventListener('change',function (e) {
    if(e.target.dataset.action=='filter-catalogue'){
const filterSelect=e.target;
const getSelectOption=filterSelect.options[filterSelect.selectedIndex].value;
        let changed =location.href.toString()
            .replace(/\b(?:&sort=shuffle|&sort=min-max|&sort=max-min)\b/gi,'');
        switch (getSelectOption){
            case "shuffle":
                changed+='&sort=shuffle';
                break;
            case "min-max":
                changed+='&sort=min-max';
                break;
            case "max-min":
                changed+='&sort=max-min';
                break;

        }
        location.href=changed;
    }
});