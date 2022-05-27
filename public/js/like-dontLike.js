function callPHP(){
    $.ajax({
        type:'GET',
        url:'/show/like/45',
        success: function (){
            msg = 'Sa a bien marché';
            console.log(msg);
        },
        error: function(){
            msg = "Sa n'a pas marché";
            console.log(msg);
        }
    })
    console.log('ok bien vu mec');
}


// $("#likeDontLike").submit(function(event){
//     var like, dontLike;
//     like = parseInt($("input[name=like]").val(), 10);
//     dontLike = parseInt($("input[name=dontLike]").val(), 10);
//     $.ajax({
//         type:'GET',
//         url:'film/like/45',
//         data:{like: like, dontLike: dontLike},
//         success: function (){
//             msg = 'Sa a bien marché';
//             console.log(msg);
//         },
//         error: function(){
//             msg = "Sa n'a pas marché";
//             console.log(msg);
//         }
//     });
//     console.log('ok bien vu mec');
// })


