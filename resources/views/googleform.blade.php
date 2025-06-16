<!-- filepath: c:\google form\form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DISC Workstyle Profile Questionnaire</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="form.css">
</head>
<body>
    
    <div class="logo-container">
        <img src="{{ asset('/img/Magellan logo PNG A.png') }}" alt="Magellan Solutions Logo" class="logo">
    </div>

  <div class="container-form">
  
    <div class="header">
      
      <h1>DISC Workstyle Profile Questionnaire</h1>
      <p class="description">
        After completing this questionnaire, you will be able to determine your DISC Workstyle Profile.<br>Where:</br> 
        <br> <b>D- means Domineering 
        <br>I- Influencing
        <br>S- Steady
        <br>C- Conscientious
        </br> </b>
      </p>
    
    <div class="instructions">
      <h2>INSTRUCTIONS:</h2>
      <ol>
        <li>Click the word that best represents or describes you when you are at work.</li>
        <li>Select from columns A-D totaling to 24 items.</li>
        <li>Should you need to change your answer, just click your final chosen word.</li>
      </ol>
      <p>Thank you.</p>
    </div>
</div>

    <form method="post" action="{{ route('googleform.store') }}">

      @csrf
      @method ('post')

      {!! questionBlocks() !!}


      <input type="submit" value="Submit" class="submit-button"/>
    </form>
  </div>
    <script src="form.js"></script>

    <div class="form-buttons">
        <button class="clear-button" type="reset">Clear Form</button>
      </div>
      
    
</body>
</html>