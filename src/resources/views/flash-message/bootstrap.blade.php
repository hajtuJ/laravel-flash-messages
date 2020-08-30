@if(FlashMessage::hasMessage())

    <div class="alert {{ FlashMessage::getMessage()['class'] }} alert-dismissible fade show" role="alert">
        {{  FlashMessage::getMessage()['text'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif
