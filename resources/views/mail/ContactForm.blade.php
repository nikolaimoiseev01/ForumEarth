@component('mail::message')
    <b> Новый вопрос с сайта Форум Земляне!</b><br>
    <b>Имя:</b> {{ $name }}<br>
    <b>Email:</b> {{ $email }}<br>
    <b>Комментарий:</b> {{ $message }}
@endcomponent
