$(document).ready(function()  
{
    // Get the form.
    var form = $('#ajax-contact');

    // Get the messages div.
    var formMessages = $('#contact-form-notifications');

    // Set up an event listener for the contact form.
    $(form).submit(function(event) 
    {    
        $('#loading-over-fade-background').css('display','block').animate({'opacity':'1'},200); //Loading screen message
        $('#loading-gif-container').css('z-index','9999');
                
        $(formMessages).empty();//Remove any success message if the user is sending another message, while the previous success message hasn't faded out yet
        
        event.preventDefault(); //prevent the form from normally submitting
        
        //Serialize the form data to be sent as a post request
        var formData = $(form).serialize();

        //Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            dataType: 'json',
            encode: true
        }).done(function(data)
        {
            if( ! data.success) //If success is not true 
            {	
                $('#loading-over-fade-background').animate({'opacity':'0'},200,function(){
                    $('#loading-gif-container').css('z-index','-9999');
                    $('#loading-over-fade-background').css('display','none');
                }); 
                
                //Check firstname field for errors
                if(data.errors.firstname)
                {
                    invalid_sign('#firstname',data.errors.firstname);
                }
                else
                {
                    valid_sign('#firstname','* First Name...');
                }
                
                //Check lastname field for errors
                if(data.errors.lastname)
                {
                    invalid_sign('#lastname',data.errors.lastname);
                }
                else
                {
                    valid_sign('#lastname','* Last Name...');
                }
                
                //Check email field for errors
                if(data.errors.email)
                {
                    invalid_sign('#email',data.errors.email);
                }
                else
                {
                    valid_sign('#email','* Email Address...');
                }
                
                //Check telephonenumber field for errors
                if(data.errors.telephonenumber)
                {
                    invalid_sign('#telephonenumber',data.errors.telephonenumber);
                }  
                else
                {
                    valid_sign('#telephonenumber','Telephone or Mobile Number...');
                }
                
                //Check message field for errors
                if(data.errors.message)
                {
                    invalid_sign('#message',data.errors.message);
                }  
                else
                {
                    valid_sign('#message','* Write Your Message...');
                }
                
            } 
            else //Success is true
            {
                
                $('#loading-over-fade-background').animate({'opacity':'0'},200,function(){
                    $('#loading-gif-container').css('z-index','-9999');
                    $('#loading-over-fade-background').css('display','none');
                });
                
                //Make sure all fields are valid now, as the message was successfully sent
                valid_sign('#firstname','* First Name...');
                valid_sign('#lastname','* Last Name...');
                valid_sign('#email','* Email Address...');
                valid_sign('#telephonenumber','Telephone or Mobile Number...');
                valid_sign('#message','* Write Your Message...');
                
                //Clear out field inputs
                $('#firstname').val('');
                $('#lastname').val('');
                $('#email').val('');
                $('#telephonenumber').val('');
                $('#message').val('');
                
                //Set the success message
                $(formMessages).css('display','block').animate({'opacity':'1'},500).text(data.message).delay(5000).animate({'opacity':'0'},500, function(){
                    $(formMessages).empty();
                    $(formMessages).css('display','none');
                });
                
                //Scroll to the form message if it's not in view of the user, because their window has scrolled passed it
                var top_of_form_message_div = $(formMessages).offset().top;
                var window_top = $(window).scrollTop()+80;
                if(window_top > top_of_form_message_div)
                {
                    $('html, body').animate({scrollTop: $(formMessages).offset().top-100}, 500);
                } 
            }
        }).fail(function(data)//If the done function doesn't come back, then there is an error with the ajax request, as the done function was never executed 
        {
                        //Loading screen message
            $('#loading-over-fade-background').animate({'opacity':'0'},200,function(){
                $('#loading-gif-container').css('z-index','-9999');
                $('#loading-over-fade-background').css('display','none');
            }); 
            
            //Server side error
            $(formMessages).css('display','block').animate({'opacity':'1'},500).text('Sorry, there has been a server side error.').delay(5000).animate({'opacity':'0'},500, function(){
                $(formMessages).empty();
                $(formMessages).css('display','none');
            });
        });
    });
        
    //Error styling
    function invalid_sign(element,error_message)
    {	
        $(element).attr("placeholder", error_message);
        $(element).css({border: 'solid 1px #ff5151'});
        $(element).addClass('invalid_error');
        $(element).addClass('red_error_shadow');
        $(element).val('');
    }
    
    //Success styling
    function valid_sign(element,placeholder_message)    
    {
        $(element).attr("placeholder", placeholder_message);
        $(element).css({border: 'solid 1px white'});
        $(element).removeClass('invalid_error');
        $(element).removeClass('red_error_shadow');
    }
			
});

