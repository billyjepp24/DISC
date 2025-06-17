<!-- filepath: c:\google form\form.php -->
@extends('layout')
@section('content')
<div class="logo-container">
      
        <img src="{{ asset('/img/Magellan logo PNG A.png') }}" alt="Magellan Solutions Logo" class="logo">
    </div>

  <div class="container-form">
  
    <div style="color: #EFFEFF;" class="header">
      <div class="text-center">
      <h1>DISC Workstyle Profile Questionnaire</h1>
      <p style="color: #EFFEFF;" class="text-start">
        After completing this questionnaire, you will be able to determine your DISC Workstyle Profile.<br>Where:</br> 
        <ul style="list-style: none; padding-left: 0; margin: 0;" class="text-start">
        <li>D - Domineering</li>
        <li>I - Influencing</li>
        <li>S - Steady</li>
        <li>C - Conscientious</li>
        </ul>
      </p>
    </div>
    <div style="color: #EFFEFF;" class="instructions">
      <h2 style="color: #EFFEFF;">INSTRUCTIONS:</h2>
      <ol>
        <li style="color: #EFFEFF;">Click the word that best represents or describes you when you are at work.</li>
        <li style="color: #EFFEFF;">Select from columns A-D totaling to 24 items.</li>
        <li style="color: #EFFEFF;">Should you need to change your answer, just click your final chosen word.</li>
      </ol>
      <p>Thank you.</p>
    </div>
</div>

    <form id="google_form">
      {!! questionBlocks() !!}
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection

@section('footer-scripts')
<script type="module">
GoogleForm.onLoadPage();
</script>
@endsection