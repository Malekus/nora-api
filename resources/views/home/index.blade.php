@extends('layout.base')


@section('content')
    <div id="parts">
        <div class="leftPart">
            <div>
                <select class="form-control" id="idSelect">
                    @foreach($categories as $categorie)
                        <option>{{ $categorie->nom->libelle  }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button class="btn btn-primary">Template</button>
            </div>
        </div>
        <div class="centerPart">
            <div class="elementCenter rounded-lg">
                <div class="phrase rounded-lg">
                    <p>Lorem ipsum dolor sit amet <span class="font-weight-bolder">ICIIIIII</span> commodi eveniet quia asperiores nostrum vel molestias, aut fugit doloremque ipsa fugiat quidem sed reiciendis corporis perferendis! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto molestias ducimus, tempora consequatur quasi facere vel nostrum dicta quam magnam earum, suscipit, porro temporibus possimus perspiciatis harum deserunt mollitia! Adipisci! Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque animi a pariatur deleniti ducimus dignissimos, magnam tempore fugiat nobis fugit ad eius quod obcaecati corporis. Vitae sed magnam vel laboriosam.</p>
                    <div class="groupeBtn">
                        <button class="btn btn-success" id="addPhrase">
                            <span class="icon"><i class="fa fa-arrow-right"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="rightPart">
            <div class="elementRight rounded-lg">
                <div class="workingPlace rounded-lg">
                    <div id="displayWorking">

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
                    </div>
                </div>
                <div class="btnPlace">
                    <button class="btn btn-primary">Copier</button>
                </div>
            </div>
        </div>
    </div>
@endsection

