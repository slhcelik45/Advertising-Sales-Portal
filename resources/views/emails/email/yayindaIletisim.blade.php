@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{$gidenMail['sirketIsmi']}}<br/>
            Telefon:{{$gidenMail['sirketTel']}}
        @endcomponent
    @endslot

    {{-- Body --}}
    **Gönderen:** {{$gidenMail['sirketIsmi']}}<br/>
    **E-Mail:** {{$gidenMail['sirketEmail']}}<br/>
    **Reklam Adı:** {{$gidenMail['reklamAdi']}}<br/>
    **Yayınlanma Yeri:** {{$gidenMail['yayinYeri']}}<br/>
    **Baslangıç Tarihi:** {{$gidenMail['baslangic']}}<br/>
    **Bitiş Tarihi:** {{$gidenMail['bitis']}}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{$gidenMail['sirketIsmi']}}
        @endcomponent
    @endslot
@endcomponent
