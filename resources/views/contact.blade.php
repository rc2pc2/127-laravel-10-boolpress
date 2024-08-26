@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center mb-3">
            <h1>
                Contact us!
            </h1>
        </div>
        <div class="col-md-6">
            <div class="">
                <div class="card-body">
                    <form action="{{ route('leads.store') }}" method="POST">
                        @csrf
                        @method("POST")

                        <div class="mb-3">
                            <label for="contact-name" class="form-label">Your name:</label>
                            <input type="text" class="form-control" id="contact-name" placeholder="Geena Geenetti" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="contact-email" class="form-label">Your email address</label>
                            <input type="email" class="form-control" id="contact-email" placeholder="youremail@example.com" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="contact-message" class="form-label">Your custom message</label>
                            <textarea class="form-control" id="contact-message" rows="5" name="message"></textarea>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Send contact form" class="btn btn-primary btn-xl">
                            <input type="reset" value="Reset form fields" class="btn btn-warning btn-xl">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
