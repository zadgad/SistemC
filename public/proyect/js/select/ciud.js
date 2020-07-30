$(function(){
    $('#depal').on('change', onSelectProjectChange);
});
function onSelectProjectChange(){
    var project_id = $(this).val();
    $.get('/api/vias/'+project_id+'/ciudad', function(data){
        var html_select='<option value=""> Seleccionar Ciudad </option>';
        for(var i=0; i<data.length; ++i)
        html_select +='<option value="'+data[i].nombc+'" >'+data[i].nombc+'</option>';
        $('#select-ciu').html(html_select);
    });
}
