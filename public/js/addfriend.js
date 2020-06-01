$(".add_friend").click(function(){
    id = $(this).attr("data-id");

    $.ajax({
        type: 'post',
        url: 'request',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'id' : id},
        dataType: 'json',                   
        success: function(response){ 
           console.log(response.msg);
           if(response.msg === "true"){
            //    console.log($('#'+response.msg.data));
               $('#'+response.data).text("Request Sent");
           }
        },
        error: function(jqXHR, textStatus, errorThrown) { 
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
      });
    
  });