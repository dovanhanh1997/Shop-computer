@extends("layouts.home")
@section('home')
    <div class="row justify-content-center">
        <div class="form-group">
            <p> We will send bill for you. Please enter your mail
            </p><br>
            <form method="post" action="{{ route('mail.send') }}">
                @csrf
                <label for="To">To:
                    <input type="text" name="user">
                </label>
                <br><br>
                <button type="submit">Send</button>
            </form>
        </div>

    </div>
@endsection
