let fields = document.querySelectorAll('form div span+input'),
	mail = document.querySelector('input[type="email"]'),
	mes = document.querySelector('.messageError')
	sub = document.querySelector('input[type="submit"]');

function runAjaxForm(){
	for(let field of fields){
		if(!checkCompField(field.value)){
			$('.messageForm>div').fadeIn(100);
			return;
		}
	}

	$( document ).ready(function() {

			sendAjaxForm('result_form', 'form', 'formHandler.php');
			return false; 

	});
}

function checkCompField(inpvalue){
	if(inpvalue.match(/[А-Яа-яЁё]{2,15}\s[А-Яа-яЁё]{2,15}\s[А-Яа-яЁё]{2,30}/g)){
		return true;
	}
	if(inpvalue.match(/[а-яА-ЯёЁ]{2,}\s[а-яА-ЯёЁ]{2,}\s[0-9]{1,}/g)){
		return true;
	}
	if(inpvalue.match(/[8]\([0-9]{3}\)\s[0-9]{3}\-[0-9]{4}/g)){
		return true;
	}
	if(inpvalue.match(/[a-zA-z0-9]{1,}\@[a-zA-z]{3,8}\.[a-zA-z0-9]{2,9}/g)){
		return true;
	}
}

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, 
        type:     "POST", 
        dataType: "html", 
        data: $("#"+ajax_form).serialize(),  
        success: function(response) { 
        	result = $.parseJSON(response);
            if(result){ 
        	$('tbody').append('<tr><td>'+result.fullname+'</td><td>'+result.address+'</td><td>'+result.phone+'</td><td>'+result.mail+'</td></tr>');
        		}
    	},
    	error: function(response) {
            $('.formError').html('Ошибка. Данные не отправлены.');
    	}
 	});
}

for(let field of fields){
	sub.addEventListener('click',function(event){
	if(!checkCompField(field.value)){
		if(!field.classList.contains('inputError') ){
			field.classList.add('inputError');
			field.parentElement.querySelector('.messageError').classList.remove('none');		
		}
		event.preventDefault();
		}
	});
	field.addEventListener('focus',function(){
		if(this.classList.contains('inputError')){
			this.classList.remove('inputError');
			field.parentElement.querySelector('.messageError').classList.add('none');	
		}
		this.addEventListener('blur',function(){
			if(!checkCompField(this.value)){
				this.classList.add('inputError');
				field.parentElement.querySelector('.messageError').classList.remove('none');				
			}	
		})
	})
}

sub.addEventListener('click',runAjaxForm);
$(function(){
  //2. Получить элемент, к которому необходимо добавить маску
  $("input[type='tel']").mask("8(999) 999-9999");
});
$('.clearmessage').click(function(){$('.messageForm>div').fadeOut(100)});
