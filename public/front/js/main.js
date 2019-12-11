$(document).ready(function () {

    $('#allbasket').on("click",".deleteproduct",function (e) {

        e.preventDefault();
        var deleteproduct=$(this).attr('href');
        var rvep=$(this).closest("li");
        var productprice=$(this).siblings('div').find('.quantityprice').html();
        var countbasket=$('.countbasket').html()-1;
        var productpricereplace=productprice.replace('$','');
        var productpricesplit=productpricereplace.split('x');
        var productpricetotal=productpricesplit[0]*productpricesplit[1];
        var totalprice=$('.totprice').html();
        var totalpricereplace=totalprice.replace('$','');
        var totalpricefinish=totalpricereplace-productpricetotal;
        $.ajax({
            type:'GET',
            url:deleteproduct,
            beforeSend:function(){},
            success:function(result){

                rvep.remove();
                $('.countbasket').html(countbasket);

                $('.totprice').html(totalpricefinish+'$');

            },
            error:function () {
                alert('could not delete the product');
            }
        })
    })

})