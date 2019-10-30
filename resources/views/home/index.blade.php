@extends('layout.base')


@section('content')
    <div id="parts">
        <div class="leftPart">
            <div>
                <select class="form-control" id="idSelectCategorie">
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->nom->id }}">{{ $categorie->nom->libelle  }}</option>
                    @endforeach
                </select>
            </div>
            <!--
                <dv>
                    <button class="btn btn-primary">Template</button>
                </dv>
            -->
        </div>
        <div class="centerPart">
            <div class="elementCenter rounded-lg">

            </div>
        </div>
        <div class="rightPart">
            <div class="elementRight rounded-lg">
                <div class="workingPlace rounded-lg">
                    <div id="displayWorking">






                        <!--

                                                <div class="phrase rounded-lg">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat id volminus ipsum commodi eveniet quia asperiores nostrum vel molestias, aut fugit doloremque ipsa fugiat quidem sed reiciendis corporis perferendis! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto molestias ducimus, tempora consequatur quasi facere vel nostrum dicta quam magnam earum, suscipit, porro temporibus possimus perspiciatis harum deserunt mollitia! Adipisci! Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque animi a pariatur deleniti ducimus dignissimos, magnam tempore fugiat nobis fugit ad eius quod obcaecati corporis. Vitae sed magnam vel laboriosam.</p>
                            <div class="groupeBtn">
                                <button class="btn btn-primary btnEditPhrase">
                                    <span class="icon"><i class="fa fa-edit"></i></span>
                                </button>
                                <button class="btn btn-danger btnRemovePhrase">
                                    <span class="icon"><i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>

                        -->


                    </div>
                    <div id="navWorking">
                        <button class="btn btn-primary" id="btnShowAll" data-toggle="modal" data-target=".modalShowAll">
                            <span class="icon"><i class="fa fa-search"></i></span>
                        </button>
                        <button class="btn btn-success" id="btnBack">
                            <span class="icon"><i class="fa fa-undo"></i></span>
                        </button>
                        <button class="btn btn-danger" id="btnClearAll">
                            <span class="icon"><i class="fa fa-times"></i></span>
                        </button>

                        <button class="btn btn-info" id="btnConfig" data-toggle="modal" data-target=".modalConfig">
                            <span class="icon"><i class="fa fa-cogs"></i></span>
                        </button>
                    </div>
                </div>
                <div class="btnPlace">
                    <button class="btn btn-primary btnCopie">Copier</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modalConfig" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Configurations</h2>
                </div>
                <div class="modal-body">
                    <div id="contentConfig">
                        <div id="configCategorie">
                            <h3>Catégorie</h3>
                            <div id="showCategorie">

                            </div>


                            <div id="addCategorie" class="my-3">
                                <form class="form-inline">
                                    <input type="text" class="form-control mr-2" placeholder="Ajouter une catégorie">
                                    <button class="btn btn-success mr-2">
                                        <span class="icon"><i class="fa fa-plus"></i></span>
                                    </button>
                                </form>
                            </div>

                        </div>
                        <div id="configPhrase">
                            <h3>Phrase</h3>
                            <form class="form-inline">
                                <input type="text" class="form-control mr-2">
                                <input type="text" class="form-control mr-2">
                                <button class="btn btn-primary mr-2">
                                    <span class="icon"><i class="fa fa-edit"></i></span>
                                </button>
                                <button class="btn btn-danger mr-2">
                                    <span class="icon"><i class="fa fa-times"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('ajax')
        <script>

            let loader = '<div class="loader"><div class="spinner-border"></div></div>'

            let ajaxPhrase = function(){
                $('.elementCenter').empty()
                $('.elementCenter').append(loader);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                let url = '{{ url('/phrase/:id')}}';
                url = url.replace(':id', $('#idSelectCategorie').val());

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.elementCenter').empty();
                        $('.elementCenter').append(data);
                    },
                    error: function (data) {
                        console.log("fail");
                    }
                });
            };

            ajaxPhrase()

            let categories = function(){

                $('#showCategorie').empty()
                $('#showCategorie').append(loader);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                let url = '{{ url('api/categories')}}';
                let res = '';

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $(data.data).each(function(index, element){
                            res += '<form class="form-inline"><input type="text" class="form-control mr-2" value="'+ element.nom.libelle +'">'
                            res += '<button class="btn btn-primary mr-2"><span class="icon"><i class="fa fa-edit"></i></span></button>'
                            res += '<button class="btn btn-danger mr-2"><span class="icon"><i class="fa fa-times"></i></span></button></form>'
                        })

                        $('#showCategorie').empty()
                        $('#showCategorie').append(res)

                    },
                    error: function (data) {
                        console.log("fail");
                    }
                });
            };


            $(document).ready(function(){
                $('#idSelectCategorie').change(function(e){
                    e.preventDefault();
                    ajaxPhrase();
                });


                $('#navWorking').on('click', '#btnConfig', function(e){
                    e.preventDefault();
                    categories()
                })

            });




        </script>
@endsection

