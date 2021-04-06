<?php include "src.php"; ?>
<form method="post" id="form">
<input type="text" name="user" id="user">
<input type="button" id="click_me" value="click_me" >
</form>
<div id="done"></div>
<script>
    $(document).ready(function(){
        $("#click_me").click(function(){
            var user = $("form#form").serialize();
        $.ajax({
            method    : "POST",
            url     : "test1.php",
            data    : user,
            success : function(data){
                    $('#done').html(data);
                    alert (data);
            }
             });
        }); 
    });
</script>
