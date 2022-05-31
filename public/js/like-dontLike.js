const lienJsLike = document.querySelectorAll('a.js-like-link');

function onClickBtnLike(event){
    event.preventDefault();

    const url = this.href;
    const spanCount = this.querySelector('span.js-likes');
    const icon = this.querySelector('i');

    axios.get(url).then(function(response) {
        spanCount.textContent = response.data.likes;
        if(icon.classList.contains('bi-hand-thumbs-up-fill')){
            icon.classList.replace('bi-hand-thumbs-up-fill', 'bi-hand-thumbs-up');
        } else {
            icon.classList.replace('bi-hand-thumbs-up', 'bi-hand-thumbs-up-fill');
        }
    }).catch(function(error){
        if(error.response.status === 403){
            window.alert("Vous ne pouvez pas liker un article si vous n'êtes pas connecté.");
        } else {
            window.alert("Une alerte s'est produite, réessayez plus tard")
        }
    });
}

lienJsLike.forEach(function(link) {
    link.addEventListener('click', onClickBtnLike);
});



// function callPHP(){
//     $.ajax({
//         type:'GET',
//         url:'/show/like/45',
//         success: function (){
//             msg = 'Sa a bien marché';
//             console.log(msg);
//         },
//         error: function(){
//             msg = "Sa n'a pas marché";
//             console.log(msg);
//         }
//     })
//     console.log('ok bien vu mec');
// }


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


