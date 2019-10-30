


$(document).ready(function(){
    let ajaxCategorie = function(newConfig) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        let url = "{{ url('/addCategorie/:categorie')}}";
        url = url.replace(':categorie', newConfig);

        $.ajax({
            url: url,
            method: 'GET',
            success: function (data) {
                console.log(data)
            },
            error: function (data) {
                console.log("fail");
            }
        });
    }



    $('#formAddCategorie').submit(function(e){

        e.preventDefault();
        if($("#newCategorie").val().trim() === "") return false;
        ajaxCategorie($("#newCategorie").val().trim())
        //categories()
    })
});
