let fields = document.querySelectorAll('form div span+input'),
	sub = document.querySelector('input[type="submit"]');

for(let field of fields){

	sub.addEventListener('click',function(event){
	if(!field.value){
		if(!field.classList.contains('inputError')){
			field.classList.add('inputError');
		}
		event.preventDefault();
		}
	});
	field.addEventListener('focus',function(){
		if(this.classList.contains('inputError')){
			this.classList.remove('inputError');
		}
		this.addEventListener('blur',function(){
			if(!this.value ){
				this.classList.add('inputError');
			}	
		})
	})
}

$( document ).ready(function() {
    $("#button").click(
		function(){
			sendAjaxForm('result_form', 'form', 'formHandler.php');
			return false; 
		}
	);
});

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url,
        type:     "POST",
        dataType: "html",
        data: $("#"+ajax_form).serialize(),
        success: function(response) {
        	result = $.parseJSON(response);
        	$('.resultTable ').append('<tr><td>'+result.fullname+'</td><td>'+result.address+'</td><td>'+result.phone+'</td><td>'+result.mail+'</td></tr>');

    	},
    	error: function(response) {
            $('#result_form').html('Ошибка. Данные не отправлены.');
    	}
 	});
}


