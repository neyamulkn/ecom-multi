
    // Cart add functions
     function addToCart(product_id){
       	var url = window.location.origin;
       
        $.ajax({
            method:'get',
            url:url +'/cart/add',
            data:{
                product_id:product_id,
            },
            success:function(data){
              
                if(data.status == 'success'){

                    addProductNotice(data.msg, '<img src="'+url+'/upload/images/product/thumb/'+data.image+'" alt="">', '<h3>'+data.title+'</h3>', 'success');
    	 
                    $('#cartCount').html(Number($('#cartCount').html())+1);
                   
                }else{
                    toastr.error(data.msg);
                }
            }
        });
    }   


    // delete cart item
    function deleteCartItem(route) {
        //separate id from route
        var id = route.split("/").pop();
       
        $.ajax({
            url:route,
            method:"get",
            success:function(data){
                if(data){
                    $('#cart_summary').html(data);
                    $('#grandTotal').html(data.grandTtotal);
                    
                    toastr.success('Cart item deleted.');
                }else{
                    toastr.error(data.msg);
                }
            }

        });
    }


	var wishlist = {
		'add': function(product_id) {
			addProductNotice('Product added to Wishlist', '<img src="image/catalog/demo/product/travel/1.jpg" alt="">', '<h3>You must <a href="#">login</a>  to save <a href="#">Apple Cinema 30"</a> to your <a href="#">wish list</a>!</h3>', 'success');
		}
	}
	var compare = {
		'add': function(product_id) {
			addProductNotice('Product added to compare', '<img src="image/catalog/demo/product/travel/1.jpg" alt="">', '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
		}
	}

	/* ---------------------------------------------------
		jGrowl – jQuery alerts and message box
	-------------------------------------------------- */
	function addProductNotice(title, thumb, text, type) {
		$.jGrowl.defaults.closer = false;
		//Stop jGrowl
		//$.jGrowl.defaults.sticky = true;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {		
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
	}

