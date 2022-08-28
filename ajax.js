$(document).ready(function(){
    //Insert
    $('#insert_form').on("submit", function(event){  
        event.preventDefault(); 
        // Validation 
        if($('#name').val() == "")  
        {  
        alert("Name is required");  
        }  
        else if($('#email').val() == '')  
        {  
        alert("email is required");  
        }  
        else
        {
            $.ajax({
                url:"insert.php",
                method:"POST",
                data:$("#insert_form").serialize(),
                // Change button value and Button disable
                beforeSend:function(){
                    $("#insert").val("Submitting...");
                    $("#insert").addClass("disabled","true")
                },
                //   Response Success:: Form reset, Data print, Button Value change, Remove "Disabled" class
                success:function(data){
                    $('#insert_form')[0].reset();
                    $('#employee_table').html(data);
                    $("#insert").val("Submit")
                    $("#insert").removeClass("disabled","true")
                }
            });
        }
    });
});