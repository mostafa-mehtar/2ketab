$(function() {
	$('*[rel=tooltip]').each(function() {
		$(this).tooltip({
			placement: $(this).attr('tooltip-place')
		})
	})
})

function alert(message) {
	$.fallr({
		content: message,
        buttons: {
			button1: {
				text: "قبول",
				danger: false,
				onclick: function() {
					$.fallr("hide")
				}
			}
		}
	})
}
/*
function confirm(message) {
	var flag = true;
	var a = $.fallr("show", {
		buttons: {
			button1: {
				text: "Yes",
				danger: true,
				onclick: function(){
				    return true
                    $.fallr("hide")
                    
				}
			},
			button2: {
				text: "Cancel",
				onclick: function() {
					$.fallr("hide")
				}
			}
		},
		content: "<p>"+message+"</p>",
		icon: "error"
	})
    console.log(flag)
    return a;
}
*/