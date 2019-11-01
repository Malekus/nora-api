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
                        <div id="configCategorie" class="rounded-lg">
                            <h3>Catégorie</h3>
                            <div id="showCategorie"></div>
                            <div id="addCategorie" class="my-3">
                                <div class="form-inline" id="formAddCategorie">
                                    <input type="text" class="form-control mr-2" id="newCategorie"
                                           placeholder="Ajouter une catégorie">
                                    <button class="btn btn-success mr-2">
                                        <span class="icon"><i class="fa fa-plus"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="configPhrase" class="rounded-lg">
                            <h3>Phrase</h3>
                            <div id="showPhrase">
                                <div class="form-inline">
                                    <select class="form-control">
                                        @foreach($categories as $categorie)
                                            @if($categorie->nom->libelle == "Conclusion")
                                                <option value="{{ $categorie->nom->id }}"
                                                        selected>{{ $categorie->nom->libelle  }}</option>
                                            @else
                                                <option
                                                    value="{{ $categorie->nom->id }}">{{ $categorie->nom->libelle  }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <input type="text" class="form-control" value="on est la cest un test">
                                    <button class="btn btn-primary">
                                        <span class="icon"><i class="fa fa-edit"></i></span>
                                    </button>
                                    <button class="btn btn-danger">
                                        <span class="icon"><i class="fa fa-times"></i></span>
                                    </button>
                                </div>
                            </div>

                            <div id="addPhrase" class="my-3">
                                <div class="form-inline" id="formAddPhrase">
                                    <select class="form-control" id="newCategoriePhrase">
                                        @foreach($categories as $categorie)
                                            <option
                                                value="{{ $categorie->nom->id }}">{{ $categorie->nom->libelle  }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" class="form-control mr-2" id="newPhrase" placeholder="Ajouter une phrase">
                                    <button class="btn btn-success mr-2">
                                        <span class="icon"><i class="fa fa-plus"></i></span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('ajax')
    <script>

        let loader = '<div class="loader"><div class="spinner-border"></div></div>'
        let categorieConfig;
        let ajaxPhrase = function () {
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
                    categorieConfig = data
                },
                error: function (data) {
                    console.log("fail");
                }
            });
        };

        ajaxPhrase()

        let categories = function () {

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
                    $(data.data).each(function (index, element) {
                        res += '<div class="form-inline"><input type="text" data-id="' + element.nom.id + '" class="form-control" value="' + element.nom.libelle + '">'
                        res += '<button class="btn btn-primary btnEditCategorie"><span class="icon"><i class="fa fa-edit"></i></span></button>'
                        res += '<button class="btn btn-danger btnDeleteCategorie"><span class="icon"><i class="fa fa-times"></i></span></button></div>'
                    })

                    $('#showCategorie').empty()
                    $('#showCategorie').append(res)
                    categorieConfig = res
                },
                error: function (data) {
                    console.log("fail");
                }
            });
        };

        let phrases = function () {

            $('#showPhrase').empty()
            $('#showPhrase').append(loader);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            let url = '{{ url('api/phrases')}}';
            let res = '';

            $.ajax({
                url: url,
                method: 'GET',
                success: function (data) {
                    let htmlCategorie = '<select class="form-control">'
                    $(data[0]).each(function (index, element) {
                        htmlCategorie += '<option value="' + element.id + '">' + element.nom.libelle + '</option>'
                    })
                    htmlCategorie += "</select>"

                    $(data[1]).each(function (index, element) {
                        console.log(element)
                        let templateAdd = '<div class="form-inline">' + htmlCategorie + '<input type="text" class="form-control" data-id="' + element.id + '" value=":XXX"><button class="btn btn-primary btnEditPhrase"><span class="icon"><i class="fa fa-edit"></i></span></button><button class="btn btn-danger btnDeletePhrase"><span class="icon"><i class="fa fa-times"></i></span></button></div>'
                        templateAdd = templateAdd.replace('value="' + element.categorie.nom.id + '"', 'value="' + element.categorie.nom.id + '" selected')
                        res += templateAdd.replace(':XXX', element.texte);
                    })

                    $('#showPhrase').empty()
                    $('#showPhrase').append(res)



                },
                error: function (data) {
                    console.log("fail");
                }
            });
        };

        let ajaxConfiguration = function (newConfig) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            let url = '{{ url('api/configuration')}}';

            $.ajax({
                url: url,
                method: 'post',
                data: {
                    categorie: "Catégorie",
                    champ: "Nom",
                    libelle: newConfig
                },
                datatype: 'json',
                success: function (data) {
                    console.log(data)
                },
                error: function (data) {
                    console.log("fail");
                }
            });
        }


        $(document).ready(function () {
            $('#idSelectCategorie').change(function (e) {
                e.preventDefault();
                ajaxPhrase();
            });


            $('#navWorking').on('click', '#btnConfig', function (e) {
                e.preventDefault();
                categories();
                phrases();
            })


        });


        let ajaxCategorie = function (newConfig) {
            console.log("Je suis dans ajax")
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
                    $('#showCategorie').append('<div class="form-inline"><input type="text" data-id="' + data.data.nom.id + '" class="form-control" value="' + data.data.nom.libelle + '"><button class="btn btn-primary btnEditCategorie"><span class="icon"><i class="fa fa-edit"></i></span></button><button class="btn btn-danger btnDeleteCategorie"><span class="icon"><i class="fa fa-times"></i></span></button></div>')
                },
                error: function (data) {
                    console.log("fail");
                }
            });
        }

        let ajaxAddPhrase = function (categorie, phrase) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            let url = "{{ url('api/phrase')}}";

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    categorie: categorie,
                    texte: phrase
                },
                datatype: 'json',
                success: function (data) {
                    console.log(data)
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }




        $('#formAddCategorie').on('click', '.btn.btn-success', function (e) {
            console.log("J'ai cliqué")

            e.preventDefault();
            if ($("#newCategorie").val().trim() === "") return false;
            ajaxCategorie($("#newCategorie").val().trim())
            $("#newCategorie").val("")

        })

        $('#formAddPhrase').on('click', '.btn.btn-success', function (e) {
            console.log("J'ai cliqué")
            e.preventDefault();
            if ($("#newPhrase").val().trim() === "") return false;
            ajaxAddPhrase($("#newCategoriePhrase").val(), $("#newPhrase").val().trim())
            /*
            ajaxAddPhrase($("#newCategorie").val().trim())
            $("#newCategorie").val("")
            */
        })

        let ajaxDeleteCategorie = function (newConfig) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            let url = "{{ url('/deleteCategorie/:categorie')}}";
            url = url.replace(':categorie', newConfig);

            $.ajax({
                url: url,
                method: 'GET',
                success: function (data) {
                    console.log("success")
                    console.log(data)
                },
                error: function (data) {
                    console.log("fail");
                }
            });
        }

        let ajaxDeletePhrase = function (idPhrase) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            let url = "{{ url('/api/phrase/:idPhrase')}}";
            url = url.replace(':idPhrase', idPhrase);

            $.ajax({
                url: url,
                method: 'DELETE',
                success: function (data) {
                    console.log(data)
                },
                error: function (data) {
                    console.log("fail");
                }
            });

        }


        let ajaxEditCategorie = function (idConfig, newConfig) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            let url = "{{ url('/editCategorie/:id/:categorie')}}";
            url = url.replace(':id', idConfig);
            url = url.replace(':categorie', newConfig);

            $.ajax({
                url: url,
                method: 'GET',
                success: function (data) {
                    console.log("success")
                    console.log(data)
                },
                error: function (data) {
                    console.log("fail");
                }
            });
        }


        $('#showCategorie').on('click', '.btnDeleteCategorie', function (e) {
            e.preventDefault();
            ajaxDeleteCategorie($(this).siblings('input').val())
            $(this).parent().remove()
        })

        $('#showCategorie').on('click', '.btnEditCategorie', function (e) {
            e.preventDefault();
            ajaxEditCategorie($(this).siblings('input').attr('data-id'), $(this).siblings('input').val())

        })


        $('#showPhrase').on('click', '.btnDeletePhrase', function (e) {
            e.preventDefault();
            console.log()
            ajaxDeletePhrase($(this).siblings('input').attr('data-id'))
            $(this).parent().remove()
        })


    </script>
@endsection

