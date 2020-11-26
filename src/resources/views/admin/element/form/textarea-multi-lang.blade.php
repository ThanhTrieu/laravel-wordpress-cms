<div id="myGroup-{{$name}}" style="position: relative">
    <label class="col-form-label" for="{{$name}}">
        {{$text}}
    </label>
    <div class="input-language-change">
        <ul class="nav nav-pills">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle show-item-change-language-textarea-{{$name}}" data-toggle="dropdown" href="#"
                   role="button"
                   aria-haspopup="true" aria-expanded="false" style="text-transform: uppercase">
                    {{ config('app.locale') }}
                </a>

                <div class="dropdown-menu" style="margin: 0">
                    @foreach(config('app.language_text') as $lang => $textLanguage)
                        <a data-toggle="collapse"
                           data-code="{{$lang}}"
                           data-parent="#myGroup-{{$name}}"
                           href="#input-lang-{{$name}}-{{$lang}}"
                           class="dropdown-item dropdown-item-change-language-textarea-{{$name}}">
                            {{ $textLanguage }}
                        </a>
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
    <div class="accordion-group">
        @foreach(config('app.language_text') as $lang => $textLanguage)
            <div id="input-lang-{{$name}}-{{$lang}}"
                 class="collapse collapse-item-change-language-textarea-{{$name}} @if($lang == config('app.locale')) show @endif">
                <div class="input-group">
                    <textarea name="{{$lang}}[{{$name}}]"
                              placeholder="[{{$text}}: {{ $textLanguage }}]"
                              id="{{$id ?? $name}}"
                              rows="{{ $rows ?? 5 }}"
                              class="form-control {{ $class ?? '' }}">{{ old($name, $value->translate($lang)->$name ?? '') }}</textarea>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>
    .input-language-change {
        position: absolute;
        right: 0;
        z-index: 100;
    }
</style>
<script type="text/javascript">
    jQuery('.dropdown-item-change-language-textarea-{{$name}}').click(function (e) {
        jQuery('.collapse-item-change-language-textarea-{{$name}}').collapse('hide');
        let code = $(this).attr('data-code');
        jQuery('.show-item-change-language-textarea-{{$name}}').text(code);
    });
</script>
