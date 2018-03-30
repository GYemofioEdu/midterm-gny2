@extends('layouts.app')

@section('content')

    <div class="card mt-3">
        <div class="card-title pl-3">
            <h1>CONTACT</h1>
            <p class="lead">Contact page with a contact form that has an email address field, subject, and message text field</p>
            <p class="lead">Users may use this form to contact the site owner</p>
        </div>

        <div class="card-body">
            <form action="/contact" method="post">
                @csrf

                <div class="form-group">
                    <label for="email">Your email address</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="body">Message</label>
                    <textarea name="body" class="form-control" id="body" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>

    </div>

@endsection