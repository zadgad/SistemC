$(function(){
    $('#depa').on('change'.onSelectProjectChange);
});
function onSelectProjectChange(){
    var project_id = $(this).val();
    alert(project_id);
}
