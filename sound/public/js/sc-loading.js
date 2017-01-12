function loading(){
    
}

loading.prototype.dismiss = function(){
    $("#loading-cover").removeClass('show');
};
loading.prototype.display = function(){
    $("#loading-cover").addClass('show');
};
