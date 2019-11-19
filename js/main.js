$( document ).ready(function() {
    console.log( "Ready!" );
    // Handling user form.
    $("#user-form").submit(function(e){
        var firstName = $('#fName').val();
        var lastName = $('#lName').val();
        var nick = $('#nickname').val();
        if ($.trim(firstName) != '' && $.trim(lastName) != '' && $.trim(nick) != ''){
            $.ajax({
               type: "POST",
               url: "user-process.php",
               data: $("#user-form").serialize(),
               
               success: function(data){
                   $('#user-form')[0].reset();

                   if (data == "Exist") {
                      alert("Nickname exist");
                   }
                   console.log(data); // show response from the php script.
               }
             });
         }
         else {
            alert("Please fill the fields.")
         }
        e.preventDefault();
    });

    // handling login form.
    $("#login-form").submit(function(e){
        if($('#user').val() != "" && $('#psw').val() != "" && $('#npsw').val() != "") {
            $.ajax({
               type: "POST",
               url: "login-process.php",
               data: $("#login-form").serialize(),
               success: function(response){
                   $('#login-form')[0].reset();
                   
                   if (response == "True") {
                       window.location.href = "info.php";
                   }
                   else {
                    $(`#error`).show('fast');
                   }
               }
             });
         }
         else {
             alert("Please fill the fields.")
         }
         
        e.preventDefault();
    });

    // handles the close button in the popup.
    function handleClick(selector){
        $(selector).click(function(){$('#error').hide();});
    }

    handleClick('#error button');

    var page = 1;
    // pagination-link handler.
    $('.pag-link').click(function(){
      page = $(this).attr("id");
      console.log(page);
   });

   setInterval(function(){ $(`#table`).load('info.php?page='+ page +' #table'); }, 1000);
});
