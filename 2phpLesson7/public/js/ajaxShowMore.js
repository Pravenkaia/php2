		
		$( ".ajaxShowMore" ).click(function(e){
				console.log('клик был');
				e.preventDefault(); // изменяет действие элемента: т.е. не преходить по ссылке
				let goods = $('.product').last().attr('data-id'); // берем значение (data-id) последнего элемента с классом product 
				console.log(goods);
				$.ajax({
					type: 'POST',
					url: '/model/ajaxPages.php',
					data: {'goods': goods},
					success: function(htmlStr){
						//console.log(htmlStr);
						htmlStr.replace(/"/g,'"');
						$('.productsAdmin').append(htmlStr); //
					}
				});
			});

