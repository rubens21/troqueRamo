var changeDevel = function(obj){
    if(obj.val() != '')
        $.ajax({
            type: "POST",
            url: "/control/index.ctrl.php",
            data: {"action": "returnOption", "devel": obj.val()},
            dataType: "jSON",
            success: function (result) {
                $('#ramo').html(result)
                $('#res').html('')
            },
            error: function(){
                $('#ramo').html('')
                $('#res').html('')
            }
        });
    else
        $('#ramo').html('')
}
var changeBranch = function(){
    var ramo = $('#ramo').val()
    if($('#devel').val() != '' && $('#ramo').val() != '')
        $.ajax({
            type: "POST",
            data: { "action": "switchBranch", "devel": $('#devel').val(), "param": ramo },
            url: "/control/index.ctrl.php",
            dataType: "html",
            success: function(result){
                $('#res').html(result)
            },
        });
}