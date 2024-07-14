<!-- resources/views/contact.blade.php -->
@extends('layouts.main')

@section('content')
<div id="contact" class="tm-page-content">
    
    <div class="tm-black-bg tm-contact-text-container">
        <h2 class="tm-text-primary">Contact Wave</h2>
        <p>Wave Cafe Template has a video background. You can use this layout for your websites. Please contact Tooplate's Facebook page. Tell your friends about our website.</p>
    </div>

    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif   
    
    <div class="tm-black-bg tm-contact-form-container tm-align-right">
        <form action="{{ route('contact.submit') }}" method="POST" id="contact-form">
            @csrf
             <!-- Display the success message -->
      
            <div class="tm-form-group">
                <input type="text" name="name" class="tm-form-control" placeholder="Name" required />
            </div>
            <div class="tm-form-group">
                <input type="email" name="email" class="tm-form-control" placeholder="Email" required />
            </div>        
            <div class="tm-form-group tm-mb-30">
                <textarea rows="6" name="message" class="tm-form-control" placeholder="Message" required></textarea>
            </div> 
  
            <div>
                <button type="submit" class="tm-btn-primary tm-align-right">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Embedded CSS for the alert message -->
<style>
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    position: relative;
    animation: fadeIn 1s;
}

.alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
</style>

<!-- Embedded JavaScript to hide the message after a period of time -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });
</script>
@endsection
