@foreach($phrases as $phrase)
    <div class="phrase rounded-lg">
        <p>{{ $phrase->texte }}</p>
        <div class="groupeBtn">
            <button class="btn btn-success addPhrase">
                <span class="icon"><i class="fa fa-arrow-right"></i></span>
            </button>
        </div>
    </div>
@endforeach



