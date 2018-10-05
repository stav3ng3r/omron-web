{{--@foreach (session('flash_notification', collect())->toArray() as $message)--}}
{{--@if ($message['overlay'])--}}
{{--@include('flash::modal', [--}}
{{--'modalClass' => 'flash-modal',--}}
{{--'title'      => $message['title'],--}}
{{--'body'       => $message['message']--}}
{{--])--}}
{{--@else--}}
{{--<div class="alert--}}
{{--alert-{{ $message['level'] }}--}}
{{--{{ $message['important'] ? 'alert-important' : '' }}"--}}
{{--role="alert"--}}
{{-->--}}
{{--@if ($message['important'])--}}
{{--<button type="button"--}}
{{--class="close"--}}
{{--data-dismiss="alert"--}}
{{--aria-hidden="true"--}}
{{-->&times;--}}
{{--</button>--}}
{{--@endif--}}

{{--{!! $message['message'] !!}--}}
{{--</div>--}}
{{--@endif--}}
{{--@endforeach--}}

@if( $errors and $errors->any())
    @foreach($errors->all() as $error)
        @if(!is_null($error) or !empty($error))
            <script>
                $('document').ready(function () {
                    let n = new Noty(
                        {
                            layout: 'topRight',
                            text: '{{ $error }}',
                            type: 'error',
                            theme: 'metroui',
                            animation: {
                                open: 'animated bounceInRight', // Animate.css class names
                                close: 'animated bounceOutRight', // Animate.css class names
                                easing: 'swing', // easing
                                speed: 500 // opening & closing animation speed
                            }
                        }
                    );

                    n.show();
                });

            </script>
        @endif
    @endforeach
@endif

@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])

        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])

    @elseif($message['important'])
        <script>
            $('document').ready(function () {
                swal({
                    title: "{{ $message['title'] }}",
                    text: "{{ $message['message'] }}",
                    icon: "{{ $message['level'] }}",
                    button: "Aceptar",
                });
            });
        </script>
    @else
        <script>
            $('document').ready(function () {
                let n = new Noty(
                    {
                        layout: 'topRight',
                        text: '{{ $message['message'] }}',
                        type: '{{ $message['level'] }}',
                        theme: 'metroui',
                        animation: {
                            open: 'animated bounceInRight', // Animate.css class names
                            close: 'animated bounceOutRight', // Animate.css class names
                            easing: 'swing', // easing
                            speed: 500 // opening & closing animation speed
                        }
                    }
                );

                n.show();
            });
        </script>
    @endif
@endforeach

@php
    session()->forget('flash_notification')
@endphp
