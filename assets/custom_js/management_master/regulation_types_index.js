$(document).ready(function(){
    var baseurl = base_url() + 'manajemen_master/regulation_types/show';
    var column = [
        { "data": "id" ,"width" : "10%"},
        { "data": "name","width" : "30%" },
        { "data": "status","width" : "20%" ,render : function (data, type, row){ 
            var span = data == 'active' ? "<span class=\"badge badge-success\">" : "<span class=\"badge badge-warning\">";
            return span+data+"</span>";
        } },
        { "data": "action" },
    ];

    ajax_crud_table(baseurl,column);
    sweetAlertConfirm();
    addData();
    modalClose();
    process();
    editData();
});