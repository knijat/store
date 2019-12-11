$(document).ready(function(){

    $('#clearbasket').click(function (e) {
        var clear_url=$(this).attr('href');
        e.preventDefault();
        $.ajax({
            type:'GET',
            url:clear_url,
            beforeSend:function(){

            },
            success:function(result){
                $('#allbasket').empty();
                $('.countbasket').html(0);
                Swal.fire(
                    'Good job!',
                    'Process is completed successuflly!',
                    'success'
                );
            },
            error:function () {
                Swal.fire(
                    'Good job!',
                    'Process is completed successuflly!',
                    'error'
                )
            }
        })
    });

    $('.addbasket').click(function(e){
        var product_url=$(this).attr('href');
        e.preventDefault();

        $.ajax({
            type:'GET',
            url:product_url,
            beforeSend:function(){
                let timerInterval
                Swal.fire({
                    title: 'Auto close alert!',
                    html: 'Process is ongoing,please wait little bit.. <b></b>.',
                    timerProgressBar: true,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                        })
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                });
            },
            success:function(result){

                var baskettotal=0;
                var total=0;
                $('#allbasket').empty();
                $.each(result,function (index,value) {
                    baskettotal+=1;
                    total+=value[0].price*value[0].quantity;
                    $('#allbasket').append('<li> <a class="aa-cartbox-img" href="#"><img src="/images/'+value[0].image+'" alt="img"></a> <div class="aa-cartbox-info"> <h4><a href="#">'+value[0].name+'</a></h4> <p class="quantityprice">'+value[0].quantity+'x'+value[0].price+'$</p> </div> <a class="aa-remove-product deleteproduct" href="basket/delete/'+value[0].id+'"><span class="fa fa-times"></span></a> </li>');

                });

                $('.countbasket').html(baskettotal);
                $('#allbasket').append('<li> <span class="aa-cartbox-total-title"> Total </span> <span class="aa-cartbox-total-price totprice">'+total+'$</span> </li>');
                Swal.fire(
                    'Good job!',
                    'Process is completed successuflly!',
                    'success'
                )
            },
            error:function () {

            }
        })

    })
})