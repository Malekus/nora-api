$(document).ready(function(){

    $('#btnConfig').click(function(e){
        console.log("Configuration")
        e.preventDefault();
        var balise = '<div class="modal fade modalConfig" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-xl"><div class="modal-content"><div class="modal-header"><h2 class="modal-title">Configurations</h2></div><div class="modal-body"><p class="text-justify">'

        balise += '</p></div></div></div></div>'
        $(".no-height").empty()
        $(".no-height").append(balise)
    })


    $('#addPhrase').click(function(){
        var phrase = '<div class="phrase rounded-lg"><p>'+$(this).parent().parent().find('p').text()+'</p><div class="groupeBtn"><button class="btn btn-primary btnEditPhrase"><span class="icon"><i class="fa fa-edit"></i></span></button><button class="btn btn-danger btnRemovePhrase"><span class="icon"><i class="fa fa-times"></i></span></button></div></div></div>'
        $("#displayWorking").append(phrase)
    })

    /*Nav Working*/
    $('#btnShowAll').click(function(){
        var balise = '<div class="modal fade modalShowAll" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h2 class="modal-title">Résultat du copier</h2></div><div class="modal-body"><p class="text-justify">'
        balise += $("#displayWorking .phrase").find('p').text()
        balise += '</p></div></div></div></div>'
        $(".no-height").empty()
        $(".no-height").append(balise)
    })

    $('#btnBack').click(function(){
        console.log($("#displayWorking .phrase").last().remove())
    })

    $('#btnClearAll').click(function(){
        console.log("btnClearAll")
        $("#displayWorking").empty()
    })

    /*end Nav Working*/


    /*Nav Working Phrase*/
    $('#displayWorking').on('click', '.btnEditPhrase', function(e){
        console.log("btnEditPhrase")
        var balise = '<div class="modal fade modalEdit" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h2 class="modal-title">Résultat du copier</h2></div><div class="modal-body"><p class="text-justify">'

        console.log($(this).closest(".phrase").children('p').text())

        /*
         balise += $("#displayWorking .phrase").find('p').text()
         balise += '</p></div></div></div></div>'
         $(".no-height").empty()
         $(".no-height").append(balise)
         */
    })

    $('#displayWorking').on('click', '.btnRemovePhrase', function(e){
        $(this).closest(".phrase").remove()
    })

    /*end Nav Working Phrase*/
});
