'use strict'

let currBtn = document.querySelectorAll('.js-currency-select');

if (currBtn) {
    currBtn.forEach(select => {
        select.addEventListener("change", function(e){
            let url = mgBaseDir + `/ajaxrequest?userCustomCurrency=${e.target.value}`;
            fetch(url).then(response => {
                window.location.reload();
            }).catch(error => {
                throw new Error(error.name);
            })
        });
    });
}

