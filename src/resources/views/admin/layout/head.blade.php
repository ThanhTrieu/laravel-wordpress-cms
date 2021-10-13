<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>{{ $title }} | Module</title>

    <link href="{{ asset("console/vendor/app.css") }}" rel="stylesheet">
    <script type="text/javascript">
        let configs = {
            'base_url': '{{ base_url() }}',
            'admin_url': '{{ base_url('admin') }}',
            'MAX_FILE_UPLOAD': '{{ @config('constant.MAX_FILE_UPLOAD') }}',
            'link_media_upload': '{{ admin_url('media/upload?_token='. csrf_token()) }}',
            'ckeditor': '{{ $config['editor_content'] ?? '' }}',
        };
    </script>
    <script src="{{ asset("console/vendor/app.js?v=1.0.1") }}" type="text/javascript"></script>

    @if(!empty($config['editor_content']) && $config['editor_content'] == 'summernote' )
        <link href="{{ asset('common/plugin/summernote-0.8.18/summernote.css') }}" rel="stylesheet"/>
        <script src="{{ asset("common/plugin/summernote-0.8.18/summernote.js") }}" type="text/javascript"></script>
    @endif

    @if(!empty($config['editor_content']) && $config['editor_content'] == 'ckeditor' )
        <script src="{{ asset("common/plugin/ckeditor4/ckeditor.js") }}" type="text/javascript"></script>
    @endif

    @if(!empty($config['editor_content']) && $config['editor_content'] == 'ckeditor5' )
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/decoupled-document/ckeditor.js"></script>
    @endif
    <script src="{{ asset("console/js/script.js?v=1.0.1") }}" type="text/javascript"></script>

</head>
