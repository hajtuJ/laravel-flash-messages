@if(\FlashMessages\FlashMessage\Facades\FlashMessage::hasMessage())

    <div class="alert {{ \FlashMessages\FlashMessage\Facades\FlashMessage::getMessage()['class'] }} alert-dismissible fade show" role="alert">
        {{  \FlashMessages\FlashMessage\Facades\FlashMessage::getMessage()['text'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif
